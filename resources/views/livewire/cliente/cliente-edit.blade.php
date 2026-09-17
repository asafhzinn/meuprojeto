<div>
     <div class="container py-5">
        <h4 class="text-primary mb-4">✏️ Editar Colaborador</h4>
        <div class="card shadow p-4 border-0">
            <form wire:submit.prevent="update">
                <div class="row g-3">
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Nome</label>
                        <input type="text" wire:model="nome" class="form-control">
                    </div>
                     <div class="col-md-12 mb-2">
                        <label class="form-label">cpf</label>
                        <input type="text" wire:model="cpf" class="form-control">
                    </div>
                    <div class="col-md-12 mb-2">
                        <label class="form-label">Idade</label>
                        <input type="text" wire:model="idade" class="form-control">
                    </div>
                    <!-- Adicione os outros campos seguindo o mesmo padrão do Create -->
                    <div class="col-12 text-end">
                        <a href="/clientes" class="btn btn-outline-secondary">Cancelar</a>
                        <button type="submit" class="btn btn-primary px-4">Atualizar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
