<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;

class ClienteCreate extends Component
{
    // Adicionada a propriedade $idade que estava faltando aqui:
    public $nome, $identificador, $cpf, $telefone, $cargo, $data_nascimento, $idade;

    public function save()
    {
        // Corrigido de 'number' para 'numeric'
        $this->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'idade' => 'required|numeric',
        ]);

        Cliente::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'idade' => $this->idade,
        ]);

        return redirect()->route('clientes.index');
    }

    public function render()
    {
        return view('livewire.cliente.cliente-create');
    }
}
