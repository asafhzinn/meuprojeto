<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use App\Models\Produto;
use Illuminate\Http\Request;

class EntradaController extends Controller
{
    public function store(Request $request){
        $produto = Produto::find($request->id_produto);
        if ($produto == null) {
            return response()->json(['erro' => 'Tarefa não encontrada']);
        }
        $entrada = Entrada::create([
            'id_produto' => $request->id_produto,
            'quantidade' => $request->quantidade
        ]);
        if(isset($request->quantidade)){
             $produto->quantidade_estoque = $request->quantidade + $produto->quantidade_estoque;
        }
        $produto->update();

        return response()->json($entrada);

    }
    public function index(){
        $entradas = Entrada::all();

        return response()->json($entradas);
    }
    public function delete($id){
        {
            $entrada = Entrada::find($id);
            if ($entrada == null) {
                return response()->json(['erro' => 'Entrada não encontrada']);
            }
            $produto = Produto::find($entrada->id_produto);
            if ($produto == null) {
                return response()->json(['erro' => 'Produto não encontrado']);
            }
            $produto->quantidade_estoque -= $entrada->quantidade;
            $produto->update();
            

            $entrada->delete();
            return response()->json();
    }
   

    }
    
}