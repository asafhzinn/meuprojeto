<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;

class ClienteCreate extends Component
{
    public $nome, $identificador, $cpf, $telefone, $cargo, $data_nascimento;

    public function save()
    {
        
        // 2. Adicione uma validação para garantir que não fiquem vazios
        $this->validate([
            'nome' => 'required',
            'cpf' => 'required',
            'idade' => 'required|number',
        ]);

        Cliente::create([
            'nome' => $this->nome,
            'cpf' => $this->cpf,
            'idade' => $this->idade,
        ]);

        return redirect()->route('clientes.index');
    }
}