<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Saida;
use Illuminate\Http\Request;

class SaidaController extends Controller
{
     public function store(Request $request){

        $cliente = Cliente::find($request->id_cliente);
        if ($cliente == null) {
            return response()->json(['erro' => 'Cliente não encontrado']);
        }

        $produto = Produto::find($request->id_produto);
        if ($produto == null) {
            return response()->json(['erro' => 'Produto não encontrado']);
        }
        if($cliente->idade < $produto ->faixa_etaria_minima){
            return response()->json(['erro' => 'Cliente não atende a faixa etária mínima para este produto']);
        }
        if($produto->quantidade_estoque < $request->quantidade) {
            return response()->json(['erro' => 'Estoque insuficiente para este produto']);
        }

        $saida = Saida::create([
            'id_cliente' => $request->id_cliente,
            'id_produto' => $request->id_produto,
            'quantidade' => $request->quantidade
        ]);
        return response()->json($saida);
    }
    public function index(){
        $saidas = Saida::all();

        return response()->json($saidas);
    }
    public function delete($id){
        {
            $saida = Saida::find($id);
            if ($saida == null) {
                return response()->json(['erro' => 'Tarefa deletada com sucesso']);
            }
            $produto = Produto::find($saida->id_produto);
            if ($produto == null) {
                return response()->json(['erro' => 'Produto não encontrado']);
            }
            $produto->quantidade_estoque = $produto->quantidade_estoque + $saida->quantidade;
            $produto->update();

            $saida  ->delete();
            return response()->json(['mensagem' => 'Tarefa deletada com sucesso']);
    }
    }
}