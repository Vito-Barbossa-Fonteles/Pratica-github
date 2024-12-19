
<?php $__env->startSection('content'); ?>
    <h2>Cadastrar Novo Veículo</h2>
    <form class="form" method="POST" action="<?php echo e(route('vehicles.store')); ?>">
        <?php echo csrf_field(); ?>
        <label for="Nome">Nome:</label>
        <input type="text" name="name" id="name" required>
        <label for="Nome">Ano:</label>
        <input type="number" name="year" id="year" required>
        <label for="Nome">Cor:</label>
        <input type="text" name="color" id="color" required>
        <input type="submit" value="Salvar">
        <input type="reset" value="Limpar">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('base', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\vitor\Desktop\laravel-crud\laravel-crud\resources\views/vehicles/create.blade.php ENDPATH**/ ?>