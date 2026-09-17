<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $cliente = cliente::all();

        return response()->json($cliente);
    }


    public function store(Request $request)
    {
        $cliente = Cliente::create([
            'id' => $request->id,
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'idade' => $request->idade
        ]);
        return response()->json($cliente);
    }
    public function update(Request $request)
    {
        $cliente = Cliente::find($request->id);
        if ($cliente == null) {
            return response()->json(['erro' => 'Tarefa não encontrada']);
        }
        if (isset($request->marca)) {
            $cliente->nome = $request->nome;
        }
        if (isset($request->descricao)) {
            $cliente->cpf = $request->cpf;
        }
        if (isset($request->valor_unitario)) {
            $cliente->idade = $request->idade;
        }

        $cliente->update();

        return response()->json(['mensagem' => 'atualizado']);
    }
    public function delete($id)
    {
        $cliente = Cliente::find($id);
        if ($cliente == null) {
            return response()->json(['erro' => 'Tarefa não encontrada']);
        }
        $cliente->delete();
        return response()->json(['mensagem' => 'Tarefa deletada com sucesso']);
    }
}