<?php

use App\Livewire\Cliente\ClienteCreate;
use App\Livewire\Cliente\ClienteEdit;
use App\Livewire\Cliente\ClienteIndex;
use App\Livewire\Movimentacao\MovimentacaoCreate;
use App\Livewire\Movimentacao\MovimentacaoIndex;
use App\Livewire\Produto\ProdutoCreate;
use App\Livewire\Produto\ProdutoEdit;
use App\Livewire\Produto\ProdutoIndex;
use Illuminate\Support\Facades\Route;

Route::get('/clientes', ClienteIndex::class)->name('clientes.index');
Route::get('/clientes/create', ClienteCreate::class)->name('clientes.create');
Route::get('/clientes/{id}/edit', ClienteEdit::class)->name('clientes.edit');

Route::get('/clientes', App\Livewire\Cliente\ClienteIndex::class)->name('clientes.index');
Route::get('/clientes/create', App\Livewire\Cliente\ClienteCreate::class)->name('clientes.create');

Route::get('movimentacao/create', MovimentacaoCreate::class)->name('movimentacao.create');
Route::get('movimentacao', MovimentacaoIndex::class)->name('movimentacao.index');

Route::get('produto/create', ProdutoCreate::class)->name('produto.create');
Route::get('produto/edit/{id}', ProdutoEdit::class)->name('produto.edit');
Route::get('produto', ProdutoIndex::class)->name('produto.index');
