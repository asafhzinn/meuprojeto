<div class="row justify-content-center">
    <div class="col-lg-10">
        <div class="card shadow-sm border-0 mt-4">
            <div class="card-header bg-white border-bottom py-3">
                <div class="d-flex align-items-center">
                    <span class="fs-4 me-2">✏️</span>
                    <h5 class="card-title mb-0 fw-bold text-dark">Editar Produto</h5>
                </div>
                <p class="text-muted small mb-0 mt-1">Altere as especificações técnicas ou ajuste as quantidades do item selecionado.</p>
            </div>
            <div class="card-body p-4">
                <form class="row g-3" wire:submit.prevent='update'>
                    <!-- Nome -->
                    <div class="col-12">
                        <label for="nome" class="form-label fw-semibold text-secondary">Nome do Produto</label>
                        <input type="text" class="form-control form-control-lg bg-light @error('nome') is-invalid @enderror" id="nome" placeholder="Nome do produto" wire:model='nome'>
                        @error('nome') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="cor" class="form-label fw-semibold text-secondary">Cor</label>
                        <input type="text" class="form-control bg-light @error('cor') is-invalid @enderror" id="cor" placeholder="Ex: Cinza" wire:model='cor'>
                        @error('cor') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="textura" class="form-label fw-semibold text-secondary">Textura</label>
                        <input type="text" class="form-control bg-light @error('textura') is-invalid @enderror" id="textura" placeholder="Ex: Rugoso" wire:model='textura'>
                        @error('textura') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-md-6">
                        <label for="peso" class="form-label fw-semibold text-secondary">Peso (em gramas)</label>
                        <div class="input-group">
                            <input type="number" class="form-control bg-light @error('peso') is-invalid @enderror" id="peso" placeholder="Ex: 1200" wire:model='peso'>
                            <span class="input-group-text bg-light text-muted">g</span>
                            @error('peso') <span class="invalid-feedback">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="quantidade_estoque" class="form-label fw-semibold text-secondary">Quantidade em Estoque</label>
                        <input type="number" class="form-control bg-light @error('quantidade_estoque') is-invalid @enderror" id="quantidade_estoque" placeholder="0" wire:model='quantidade_estoque'>
                        @error('quantidade_estoque') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12">
                        <label for="faixa_etaria_minima" class="form-label fw-semibold text-secondary">Faixa Etária Mínima</label>
                        <input type="text" class="form-control bg-light @error('faixa_etaria_minima') is-invalid @enderror" id="faixa_etaria_minima" placeholder="Ex: Livre" wire:model='faixa_etaria_minima'>
                        @error('faixa_etaria_minima') <span class="invalid-feedback">{{ $message }}</span> @enderror
                    </div>

                    <div class="col-12 d-flex justify-content-end gap-2 mt-4 pt-3 border-top">
                        <a href="{{ route('produto.index') }}" class="btn btn-light px-4">Voltar para Listagem</a>
                        <button type="submit" class="btn btn-primary px-4 fw-semibold">Salvar Alterações</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
