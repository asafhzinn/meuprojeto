<div class="card shadow-sm border-0 mt-4">
    <div class="card-header bg-white border-bottom py-3 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
        <div>
            <h5 class="card-title mb-0 fw-bold text-dark">Listagem de Clientes</h5>
            <p class="text-muted small mb-0 mt-1">Gerencie a base de clientes, contatos corporativos e cargos dos responsáveis.</p>
        </div>
        <a href="{{ route('clientes.create') }}" class="btn btn-primary fw-semibold d-inline-flex align-items-center">
            <span class="me-1">+</span> Cadastrar Cliente
        </a>
    </div>
    
    <div class="card-body p-0">
        <div class="p-3 border-bottom bg-light bg-opacity-50">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0 text-muted">🔍</span>
                <input type="text" wire:model.live='search' placeholder="Pesquisar por nome ou CPF..." class="form-control border-start-0 bg-white">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary small text-uppercase">
                    <tr>
                        <th class="ps-4">Nome do Cliente</th>
                        <th>CPF / Identificador</th>
                        <th>Telefone de Contato</th>
                        <th>Cargo</th>
                        <th class="text-center" style="width: 180px;">Ações</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse ($clientes as $cliente)
                        <tr>
                            <td class="ps-4">
                                <span class="fw-bold text-dark">{{ $cliente->nome }}</span>
                                <div class="text-muted small">Nasc: {{ \Carbon\Carbon::parse($cliente->data_nascimento)->format('d/m/Y') }}</div>
                            </td>
                            <td>
                                <span class="text-dark fw-semibold">{{ $cliente->cpf }}</span>
                                <div class="text-muted small">ID: {{ $cliente->identificador }}</div>
                            </td>
                            <td><span class="text-muted">{{ $cliente->telefone ?? 'Não informado' }}</span></td>
                            <td><span class="badge bg-light text-secondary border px-2.5 py-1.5">{{ $cliente->cargo ?? 'Nenhum' }}</span></td>
                            <td class="text-center pe-4">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('clientes.edit', ['id' => $cliente->id]) }}" class="btn btn-sm btn-outline-info d-inline-flex align-items-center">✏️ Editar</a>
                                    <button wire:click='delete({{ $cliente->id }})' class="btn btn-sm btn-outline-danger d-inline-flex align-items-center" onclick="return confirm('Excluir este cliente permanentemente?')">🗑️ Excluir</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center py-5 text-muted">
                                <div class="fs-1 mb-2">👥</div>
                                Nenhum registro de cliente localizado no sistema.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
