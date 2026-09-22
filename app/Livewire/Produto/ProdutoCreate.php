<?php

namespace App\Livewire\Produto;

use App\Models\Produto;
use Livewire\Component;

class ProdutoCreate extends Component
{
    public $nome;
    public $cor;
    public $textura;
    public $peso;
    public $quantidade_estoque;
    public $faixa_etaria_minima;

    public function store()
    {
        $dadosValidados = $this->validate([
            'nome' => 'required|max:110',
            'cor' => 'required|max:80',
            'textura' => 'required|max:120',
            'peso' => 'required|integer',
            'quantidade_estoque' => 'required|integer',
            'faixa_etaria_minima' => 'required|max:20',
        ]);

        Produto::create($dadosValidados);

        session()->flash('success', 'Cadastrado com sucesso!');
        return redirect()->route('produto.index');
    }

    public function render()
    {
        return view('livewire.produto.produto-create');
    }
}
