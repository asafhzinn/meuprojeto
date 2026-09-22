<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;

class ProdutoEdit extends Component
{
    public $produto_id;
    // Propriedades atualizadas conforme a Migration
    public $nome;
    public $cor;
    public $textura;
    public $peso;
    public $quantidade_estoque;
    public $faixa_etaria_minima;

    public function mount($id)
    {
        $produto = Produto::find($id);
        if ($produto == null) {
            session()->flash('error', 'Não encontrado');
            return redirect()->route('produto.index');
        }

        $this->produto_id = $produto->id;
        $this->nome = $produto->nome;
        $this->cor = $produto->cor;
        $this->textura = $produto->textura;
        $this->peso = $produto->peso;
        $this->quantidade_estoque = $produto->quantidade_estoque;
        $this->faixa_etaria_minima = $produto->faixa_etaria_minima;
    }

    public function update()
    {
        $produto = Produto::find($this->produto_id);

        if ($produto == null) {
            session()->flash('error', 'Não encontrado');
            return redirect()->route('produto.index');
        }

        $this->validate([
            'nome' => 'required|max:110',
            'cor' => 'required|max:80',
            'textura' => 'required|max:120',
            'peso' => 'required|integer',
            'quantidade_estoque' => 'required|integer',
            'faixa_etaria_minima' => 'required|max:20',
        ]);

        $produto->nome = $this->nome;
        $produto->cor = $this->cor;
        $produto->textura = $this->textura;
        $produto->peso = $this->peso;
        $produto->quantidade_estoque = $this->quantidade_estoque;
        $produto->faixa_etaria_minima = $this->faixa_etaria_minima;
        
        $produto->save();

        session()->flash('success', 'Atualizado com sucesso!');
        return redirect()->route('produto.index');
    }

    public function render()
    {
        return view('livewire.produto.produto-edit');
    }
}
