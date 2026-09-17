<?php

namespace App\Livewire\Cliente;

use App\Models\Cliente;
use Livewire\Component;

class ClienteIndex extends Component
{
    public $search = ''; // Guarda o termo da pesquisa

    public function delete($id)
    {
        Cliente::find($id)->delete();
        session()->flash('message', 'Cliente excluído!');
    }

    public function render()
    {
        
        $clientes = Cliente::where('nome', 'like', '%' . $this->search . '%')
            ->orWhere('cpf', 'like', '%' . $this->search . '%')
            ->get();

        return view('livewire.cliente.cliente-index', [
            'clientes' => $clientes
        ]);
    }
}