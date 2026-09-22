<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Auth\Login;
use App\Livewire\Dashboard;
use App\Livewire\Cliente\ClienteIndex;
use App\Livewire\Cliente\ClienteCreate;
use App\Livewire\Cliente\ClienteEdit;
use App\Livewire\Movimentacao\MovimentacaoCreate;
use App\Livewire\Movimentacao\MovimentacaoIndex;
use App\Livewire\Produto\ProdutoCreate;
use App\Livewire\Produto\ProdutoEdit;
use App\Livewire\Produto\ProdutoIndex;

Route::get('/login', Login::class)->name('login');

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware(['auth'])->group(function () {
    
    Route::get('/dashboard', Dashboard::class)->name('dashboard');

    
    Route::get('/clientes', ClienteIndex::class)->name('clientes.index');
    Route::get('/clientes/create', ClienteCreate::class)->name('clientes.create');
    Route::get('/clientes/{id}/edit', ClienteEdit::class)->name('clientes.edit');

   
    Route::get('/movimentacao/create', MovimentacaoCreate::class)->name('movimentacao.create');
    Route::get('/movimentacao', MovimentacaoIndex::class)->name('movimentacao.index');


    Route::get('/produto/create', ProdutoCreate::class)->name('produto.create');
    Route::get('/produto/edit/{id}', ProdutoEdit::class)->name('produto.edit');
    Route::get('/produto', ProdutoIndex::class)->name('produto.index');

 
Route::post('/logout', function () {
    \Illuminate\Support\Facades\Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect()->route('login');
})->name('logout');

    
});
