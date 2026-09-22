<?php

namespace App\Livewire;

use App\Models\Movimentacao;
use App\Models\Produto;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        // Calcula as métricas em tempo real com base no seu banco de dados
        $totalProdutos = Produto::count();
        $totalEstoque = Produto::sum('quantidade_estoque') ?? 0;
        $produtosCriticos = Produto::where('quantidade_estoque', '<', 5)->count();
        
        // Pega as últimas 5 movimentações realizadas para listar no painel
        $ultimasMovimentacoes = Movimentacao::with('produto')
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('livewire.dashboard', [
            'totalProdutos' => $totalProdutos,
            'totalEstoque' => $totalEstoque,
            'produtosCriticos' => $produtosCriticos,
            'ultimasMovimentacoes' => $ultimasMovimentacoes
        ]);
    }
}
