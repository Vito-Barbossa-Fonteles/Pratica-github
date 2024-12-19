
<?php $__env->startSection('content'); ?>
    <?php if(isset($msg)): ?>
        <h3 style="color: red">Veículo não encontrado!</h3>
    <?php else: ?>
        <h2>Mostrando dados do veículo</h2>
        <p><strong>Nome:</strong> <?php echo e($vehicle->name); ?> </p>
        <p><strong>Ano:</strong> <?php echo e($vehicle->year); ?> </p>
        <p><strong>Cor:</strong> <?php echo e($vehicle->color); ?> </p>
        <a href="<?php echo e(route('vehicles.index')); ?>">Voltar</a>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\vitor\Desktop\laravel-crud\laravel-crud\resources\views/vehicles/show.blade.php ENDPATH**/ ?>