<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;

    public function mount()
    {
        if (User::count() === 0) {
            User::create([
                'name' => 'Administrador',
                'email' => 'admin@admin.com',
                'password' => Hash::make('12345678'),
            ]);
        }
    }

    public function login()
    {
        $this->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            session()->regenerate();
            
            return redirect()->route('produto.create');
        }

        $this->addError('email', 'As credenciais fornecidas estão incorretas.');
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
