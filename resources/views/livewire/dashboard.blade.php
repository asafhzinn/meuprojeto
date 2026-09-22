<div class="container mt-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h2 class="mb-0 fw-bold text-dark">Painel de Controle</h2>
            <p class="text-muted small mb-0">Visão geral do inventário, indicadores de alerta e histórico recente.</p>
        </div>
        <div class="d-flex gap-2">
            <a href="{{ route('produto.create') }}" class="btn btn-primary fw-semibold d-inline-flex align-items-center">
                <span class="me-1">+</span> Novo Produto
            </a>
            <a href="{{ route('movimentacao.create') }}" class="btn btn-success fw-semibold d-inline-flex align-items-center">
                <span class="me-1">📥</span> Movimentar
            </a>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 border-start border-info border-4 bg-white h-100">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-uppercase text-secondary small fw-bold mb-1">Itens Cadastrados</h6>
                        <h2 class="display-6 fw-bold text-dark mb-0">{{ $totalProdutos }}</h2>
                    </div>
                    <div class="fs-1 bg-light p-3 rounded-circle text-info bg-opacity-50">📦</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 border-start border-success border-4 bg-white h-100">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-uppercase text-secondary small fw-bold mb-1">Volume Total em Estoque</h6>
                        <h2 class="display-6 fw-bold text-dark mb-0">{{ $totalEstoque }} <span class="fs-5 fw-normal text-muted">un</span></h2>
                    </div>
                    <div class="fs-1 bg-light p-3 rounded-circle text-success bg-opacity-50">📊</div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card shadow-sm border-0 border-start border-danger border-4 bg-white h-100">
                <div class="card-body p-4 d-flex align-items-center justify-content-between">
                    <div>
                        <h6 class="text-uppercase text-secondary small fw-bold mb-1">Estoque Crítico (&lt; 5)</h6>
                        <h2 class="display-6 fw-bold text-danger mb-0">{{ $produtosCriticos }}</h2>
                    </div>
                    <div class="fs-1 bg-light p-3 rounded-circle text-danger bg-opacity-50">⚠️</div>
                </div>
            </div>
        </div>
    </div>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-white border-bottom py-3">
            <h5 class="mb-0 fw-bold text-dark">Últimas Atividades Registradas</h5>
            <p class="text-muted small mb-0 mt-1">Acompanhe as últimas cinco movimentações de mercadoria realizadas no estoque.</p>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light text-secondary small text-uppercase">
                        <tr>
                            <th class="ps-4">Produto</th>
                            <th>Quantidade</th>
                            <th>Operação</th>
                            <th class="pe-4">Data do Registro</th>
                        </tr>
                    </thead>
                    <tbody class="border-top-0">
                        @forelse($ultimasMovimentacoes as $mov)
                            <tr>
                                <td class="ps-4">
                                    <span class="fw-bold text-dark">{{ $mov->produto?->nome ?? 'Produto Removido' }}</span>
                                    <div class="text-muted small">ID: #{{ $mov->produto_id }}</div>
                                </td>
                                <td class="fw-semibold text-dark">{{ $mov->quantidade }} unidades</td>
                                <td>
                                    @if($mov->tipo == 'entrada')
                                        <span class="badge bg-primary bg-opacity-10 text-primary px-2.5 py-1.5 fw-semibold">📥 Entrada</span>
                                    @else
                                        <span class="badge bg-danger bg-opacity-10 text-danger px-2.5 py-1.5 fw-semibold">📤 Saída</span>
                                    @endif
                                </td>
                                <td class="text-muted pe-4">{{ \Carbon\Carbon::parse($mov->data_movimentacao)->format('d/m/Y') }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center text-muted py-5">
                                    <div class="fs-2 mb-2">📑</div>
                                    Nenhum histórico ou movimentação registrada recentemente.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
