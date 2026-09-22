<div class="d-flex justify-content-center align-items-center" style="position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 100%); z-index: 9999;">
    
    <div class="card border-0 shadow-lg m-3" style="width: 100%; max-width: 420px; border-radius: 16px; overflow: hidden;">
        <div class="card-header border-0 text-white text-center py-4" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);">
            <div class="fs-1 mb-2">🔐</div>
            <h4 class="mb-1 fw-bold">Acesso ao Sistema</h4>
            <p class="text-white-50 small mb-0">Gestão de Estoque & Inventário</p>
        </div>
        
        <div class="card-body p-4 bg-white">

            <form wire:submit.prevent="login">
                <div class="mb-3">
                    <label for="email" class="form-label small fw-semibold text-secondary">Endereço de E-mail</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 8px 0 0 8px;">✉️</span>
                        <input type="email" class="form-control bg-light border-start-0 @error('email') is-invalid @enderror" id="email" wire:model="email" placeholder="seu@email.com" style="border-radius: 0 8px 8px 0; py: 10px;">
                    </div>
                    @error('email') 
                        <span class="text-danger small d-block mt-1" style="font-size: 0.82em;">{{ $message }}</span> 
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="form-label small fw-semibold text-secondary">Sua Senha</label>
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0 text-muted" style="border-radius: 8px 0 0 8px;">🔑</span>
                        <input type="password" class="form-control bg-light border-start-0 @error('password') is-invalid @enderror" id="password" wire:model="password" placeholder="********" style="border-radius: 0 8px 8px 0; py: 10px;">
                    </div>
                    @error('password') 
                        <span class="text-danger small d-block mt-1" style="font-size: 0.82em;">{{ $message }}</span> 
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary w-100 fw-bold py-2.5 shadow-sm border-0 transition" style="background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%); border-radius: 8px; letter-spacing: 0.5px;">
                    Entrar no Painel
                </button>
            </form>
        </div>
        
        <div class="card-footer bg-light text-center py-3 border-0">
            <span class="text-muted small">&copy; 2026 EstoquePro. Todos os direitos reservados.</span>
        </div>
    </div>
</div>
