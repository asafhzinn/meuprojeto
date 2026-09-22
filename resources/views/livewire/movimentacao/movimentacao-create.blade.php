<div class="row g-4 mt-2">
    <div class="col-lg-5">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-bottom py-3">
                <h5 class="card-title mb-0 fw-bold text-dark">Registrar Movimentação</h5>
                <p class="text-muted small mb-0 mt-1">Lançamento de entrada ou saída para ajuste de inventário.</p>
            </div>
            <div class="card-body p-4">
                @if (session('message'))
                    <div class="alert alert-success border-0 shadow-sm mb-4">✅ {{ session('message') }}</div>
                @endif

                @if ($alertaEstoqueBaixo)
                    <div class="alert alert-warning border-0 shadow-sm mb-4">⚠️ {{ $alertaEstoqueBaixo }}</div>
                @endif

                <form wire:submit.prevent="store" class="row g-3">
                    <div class="col-12">
                        <label class="form-label fw-semibold text-secondary">Produto</label>
                        <select class="form-select bg-light @error('idProdutoSelecionado') is-invalid @enderror" wire:model="idProdutoSelecionado">
                            <option value="">Selecione um produto</option>
                            @foreach ($produtos as $produto)
                                <option value="{{$produto->id}}">{{$produto->nome}} (Atual: {{$produto->quantidade_estoque}} un)</option>
                            @endforeach
                        </select>
                        @error('idProdutoSelecionado') <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>

                    <div class="col-12">
                        <label class="form-label fw-semibold text-secondary">Tipo da Operação</label>
                        <div class="d-flex gap-2">
                            <input type="radio" class="btn-check" name="tipo_op" id="tipo_entrada" value="entrada" wire:model="tipo">
                            <label class="btn btn-outline-primary w-50 fw-semibold" for="tipo_entrada">📥 Entrada</label>

                            <input type="radio" class="btn-check" name="tipo_op" id="tipo_saida" value="saida" wire:model="tipo">
                            <label class="btn btn-outline-danger w-50 fw-semibold" for="tipo_saida">📤 Saída</label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Quantidade</label>
                        <input type="number" class="form-control bg-light @error('quantidade') is-invalid @enderror" wire:model='quantidade' placeholder="0">
                        @error('quantidade') <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-secondary">Data do Lançamento</label>
                        <input type="date" class="form-control bg-light @error('data_movimentacao') is-invalid @enderror" wire:model='data_movimentacao'>
                        @error('data_movimentacao') <span class="invalid-feedback">{{$message}}</span> @enderror
                    </div>

                    <div class="col-12 pt-2">
                        <button type="submit" class="btn btn-primary w-100 fw-semibold py-2.5">Confirmar Lançamento</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-7">
        <div class="card shadow-sm border-0 h-100">
            <div class="card-header bg-white border-bottom py-3">
                <h5 class="card-title mb-0 fw-bold text-dark">Produtos em Estoque</h5>
                <p class="text-muted small mb-0 mt-1">Situação de quantidades atuais em tempo real.</p>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light small text-uppercase">
                            <tr>
                                <th class="ps-4">Item</th>
                                <th>Especificações</th>
                                <th>Qtd Atual</th>
                                <th class="pe-4">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($produtos as $produto)
                                <tr>
                                    <td class="ps-4"><span class="fw-bold text-dark">{{ $produto->nome }}</span></td>
                                    <td><span class="text-muted small">{{ $produto->cor }} | {{ $produto->textura }}</span></td>
                                    <td class="fw-semibold">{{ $produto->quantidade_estoque }} un</td>
                                    <td class="pe-4">
                                        @if ($produto->quantidade_estoque < 5)
                                            <span class="badge bg-danger bg-opacity-10 text-danger px-2 py-1">Baixo</span>
                                        @else
                                            <span class="badge bg-success bg-opacity-10 text-success px-2 py-1">Normal</span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center py-5 text-muted">Nenhum produto cadastrado.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
