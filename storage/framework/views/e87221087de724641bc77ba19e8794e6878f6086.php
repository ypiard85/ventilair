

<?php $__env->startSection('content'); ?>
<section class="mt-5 container">
    <h1>Vos commandes</h1>
    <table class="col-md-12 table table-hover">

        <thead>
            <tr>
                <th scope="col">Numéro</th>
                <th scope="col">Date</th>
                <th scope="col">Montant</th>
                <th scope="col">Détails</th>
            </tr>
        </thead>
        <?php $__currentLoopData = $commandes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $commande): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tbody>
            <tr>
                <td><?php echo e($commande->numero); ?></td>
                <td><?php echo e($commande->created_at); ?></td>
                <td><?php echo e($commande->prix); ?>€</td>
                <td>
<a href="<?php echo e(route('commande.show', $commande )); ?>" class="btn btn-warning">Détails</a>
                </td>
            </tr>
        </tbody>


        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </table>
</section>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\ventilair\resources\views/commandes/index.blade.php ENDPATH**/ ?>