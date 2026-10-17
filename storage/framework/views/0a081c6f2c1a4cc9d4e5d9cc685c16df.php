<div>
    <form wire:submit.prevent="consultar">
        <div>
            <label>Periodo (AAAAMM):</label>
            <input type="number" wire:model="periodo" placeholder="Ej: 202312" required>
        </div>
        <div>
            <label>Orden:</label>
            <input type="number" wire:model="orden" placeholder="Ej: 1" required>
        </div>
        <button type="submit">Consultar FECAEA</button>
    </form>

    <?php if($error): ?>
        <div style="color: red; margin-top: 1rem;">
            Error: <?php echo e($error); ?>

        </div>
    <?php endif; ?>

    <?php if($resultado): ?>
        <div style="margin-top: 1rem;">
            <h3>Resultado:</h3>
            <pre><?php echo e(print_r($resultado, true)); ?></pre>
        </div>
    <?php endif; ?>

<!-- <div>
    <form wire:submit.prevent="consultar">
        <div>
            <label>Token:</label>
            <input type="text" wire:model="token" required>
        </div>
        <div>
            <label>Sign:</label>
            <input type="text" wire:model="sign" required>
        </div>
        <div>
            <label>CUIT:</label>
            <input type="number" wire:model="cuit" required>
        </div>
        <div>
            <label>Periodo:</label>
            <input type="number" wire:model="periodo" required>
        </div>
        <div>
            <label>Orden:</label>
            <input type="number" wire:model="orden" required>
        </div>
        <button type="submit">Consultar</button>
    </form>

    <?php if($error): ?>
        <div style="color: red;">
            <?php echo e($error); ?>

        </div>
    <?php endif; ?>

    <?php if($resultado): ?>
        <div>
            <h3>Resultado:</h3>
            <pre><?php echo e(print_r($resultado, true)); ?></pre>
        </div>
    <?php endif; ?>
</div> -->

</div><?php /**PATH /home/casa-pc/Proyectos/erp3/resources/views/livewire/afip/consulta-afip.blade.php ENDPATH**/ ?>