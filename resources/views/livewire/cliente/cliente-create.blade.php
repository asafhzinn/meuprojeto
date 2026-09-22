
<div>
    <div class="container py-5">
        <div class="text-center mb-5">
            <p class="text-muted">Cliente Cadastro</p>
        </div>
        <div class="card shadow p-4 border-0">
            <form wire:submit.prevent="save">
                <div class="row g-3">
                    <div class="col-md-12">
                        <label class="form-label">Nome Completo</label>
                        <input type="text" wire:model="nome" class="form-control shadow-sm" placeholder="Digite o nome completo" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">CPF</label>
                        <input type="text" wire:model="cpf" class="form-control shadow-sm" placeholder="000.000.000-00" required>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">idade</label>
                        <input type="tel" wire:model="idade" class="form-control shadow-sm" placeholder="**" required>
                    </div>
                    <button wire:click class="btn btn-sm btn-outline-success">Cadastrar</button>
                </div>
            </form>
        </div>
    </div>
</div>
