<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-success fw-bold">👥 Gestão de Colaboradores</h2>
        <a href="/clientes/create" class="btn btn-success px-4">+ Novo Funcionário</a>
    </div>

    <!-- Barra de Pesquisa de Clientes -->
    <div class="card mb-4 border-0 shadow-sm">
        <div class="card-body">
            <div class="input-group">
                <input type="text" 
                       wire:model.live="search" 
                       class="form-control shadow-none" 
                       placeholder="Pesquisar por nome ou CPF...">
                <span class="input-group-text bg-white"><i class="bi bi-search"></i>🔍</span>
            </div>
        </div>
    </div>

    @if(session()->has('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <!-- Tabela -->
    <div class="card shadow-sm border-0">
        <table class="table table-hover mb-0">
            <thead class="table-success">
                <tr>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Idade</th>
                    <th class="text-center">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->nome }}</td>
                    <td>{{ $cliente->cpf }}</td>
                    <td>{{ $cliente->idade }}</td>
                    <td class="text-center">
                        <a href="/clientes/{{ $cliente->id }}/edit" class="btn btn-sm btn-outline-primary">Editar</a>
                        <button wire:click="delete({{ $cliente->id }})" wire:confirm="Excluir este cadastro?" class="btn btn-sm btn-outline-danger">Excluir</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
