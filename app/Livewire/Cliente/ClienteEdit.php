<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;

class ClienteEdit extends Component
{
     public $clienteId, $nome, $cpf, $idade;

    public function mount($id)
    {
        $cliente = Cliente::findOrFail($id);
        $this->clienteId = $cliente->id;
        $this->nome = $cliente->nome;
        $this->cpf = $cliente->cpf;
        $this->idade = $cliente->idade;
        
    }

    public function update()
    {
        $cliente = Cliente::find($this->clienteId);
        $cliente->update([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'idade' => $this->idade,
        ]);

        return redirect()->route('clientes.index');
    }

    public function render()
    {
        return view('livewire.cliente.cliente-edit');
    }
}