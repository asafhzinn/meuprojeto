<div class="card shadow-sm border-0 mt-4">
    <div class="card-header bg-white border-bottom py-3 d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
        <div>
            <h5 class="card-title mb-0 fw-bold text-dark">Listagem de Produtos</h5>
            <p class="text-muted small mb-0 mt-1">Gerencie, pesquise e acompanhe os detalhes dos itens cadastrados.</p>
        </div>
        <a href="{{ route('produto.create') }}" class="btn btn-primary fw-semibold d-inline-flex align-items-center">
            <span class="me-1">+</span> Novo Produto
        </a>
    </div>
    
    <div class="card-body p-0">
        @if (session()->has('success') || session()->has('error'))
            <div class="p-3 pb-0">
                @if (session()->has('success'))
                    <div class="alert alert-success border-0 shadow-sm mb-0 d-flex align-items-center">
                        <span class="me-2">✅</span> {{ session('success') }}
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger border-0 shadow-sm mb-0 d-flex align-items-center">
                        <span class="me-2">⚠️</span> {{ session('error') }}
                    </div>
                @endif
            </div>
        @endif

        <div class="p-3 border-bottom bg-light bg-opacity-50">
            <div class="input-group">
                <span class="input-group-text bg-white border-end-0 text-muted">🔍</span>
                <input type="text" wire:model.live='search' placeholder="Pesquisar por nome do produto..." class="form-control border-start-0 bg-white">
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light text-secondary small uppercase text-uppercase">
                    <tr>
                        <th class="ps-4" style="width: 80px;">ID</th>
                        <th>Nome</th>
                        <th>Cor</th>
                        <th>Textura</th>
                        <th>Peso</th>
                        <th>Estoque</th>
                        <th class="text-center" style="width: 180px;">Ações</th>
                    </tr>
                </thead>
                <tbody class="border-top-0">
                    @forelse ($produtos as $p)
                        <tr>
                            <td class="ps-4 fw-semibold text-secondary">#{{ $p->id }}</td>
                            <td><span class="fw-bold text-dark">{{ $p->nome }}</span></td>
                            <td><span class="badge bg-light text-dark border px-2.5 py-1.5">{{ $p->cor }}</span></td>
                            <td><span class="text-muted small">{{ $p->textura }}</span></td>
                            <td>{{ $p->peso }}g</td>
                            <td>
                                @if($p->quantidade_estoque < 5)
                                    <span class="badge bg-danger bg-opacity-10 text-danger px-2.5 py-1.5 fw-semibold">{{ $p->quantidade_estoque }} un (Crítico)</span>
                                @else
                                    <span class="badge bg-success bg-opacity-10 text-success px-2.5 py-1.5 fw-semibold">{{ $p->quantidade_estoque }} un</span>
                                @endif
                            </td>
                            <td class="text-center pe-4">
                                <div class="d-flex justify-content-center gap-1">
                                    <a href="{{ route('produto.edit', ['id' => $p->id]) }}" class="btn btn-sm btn-outline-info d-inline-flex align-items-center">✏️ Editar</a>
                                    <button wire:click='delete({{ $p->id }})' class="btn btn-sm btn-outline-danger d-inline-flex align-items-center" onclick="return confirm('Tem certeza que deseja excluir?')">🗑️ Excluir</button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-5 text-muted">
                                <div class="fs-1 mb-2">📦</div>
                                Nenhum produto encontrado correspondente à pesquisa.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
