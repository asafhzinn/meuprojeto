<?php

namespace App\Livewire\Movimentacao;

use App\Models\Movimentacao;
use App\Models\Produto;
use Livewire\Component;

class MovimentacaoCreate extends Component
{
    public $idProdutoSelecionado;
    public $tipo = 'saida';
    public $quantidade;
    public $data_movimentacao;
    public $alertaEstoqueBaixo;

    public function mount()
    {
        $this->data_movimentacao = now()->format('Y-m-d');
    }

    public function store()
    {
        $this->validate([
            'idProdutoSelecionado' => 'required',
            'quantidade' => 'required|integer|min:1',
            'tipo' => 'required|in:entrada,saida',
            'data_movimentacao' => 'required|date'
        ]);

        $produto = Produto::find($this->idProdutoSelecionado);
        
        if($produto->quantidade_estoque < $this->quantidade && $this->tipo == 'saida'){
            $this->addError('quantidade', 'Quantidade em estoque insuficiente');
            return;
        }

        if ($this->tipo == "entrada") {
            $produto->quantidade_estoque += $this->quantidade;
        } else {
            $produto->quantidade_estoque -= $this->quantidade;
        }

        Movimentacao::create([
            'quantidade' => $this->quantidade,
            'data_movimentacao' => $this->data_movimentacao,
            'tipo' => $this->tipo,
            'produto_id' => $this->idProdutoSelecionado,
        ]);

        $produto->save();
        $produto->refresh();
        
        if ($produto->quantidade_estoque < 5) {
            $this->alertaEstoqueBaixo = "ALERTA: Estoque baixo para {$produto->nome}. Quantidade Atual: {$produto->quantidade_estoque}";
        } else {
            $this->alertaEstoqueBaixo = "";
        }

        session()->flash('message', 'Movimentação registrada com sucesso');

        $this->reset(['quantidade', 'tipo', 'idProdutoSelecionado']);
    }

    public function render()
    {
        return view('livewire.movimentacao.movimentacao-create', [
            'produtos' => Produto::orderBy('nome')->get()
        ]);
    }
}
