

<?php $__env->startSection('content'); ?>


<section class="mt-5 container">
            <table class="col-md-12 table table-hover">

                <thead>
                    <tr>
                        <th scope="col">Nom</th>
                        <th scope="col">Prix unitaire</th>
                        <th scope="col">Quantité</th>
                    </tr>
                </thead>
                <h2>Commande n°<?php echo e($commande->numero); ?> pour un montant de <?php echo e($commande->prix); ?>€ TTC</h2>

                    <tbody>
                    <?php $__currentLoopData = $commande->produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e(($produit->nom)); ?></td>
                            <td><?php echo e(($produit->prix)); ?></td>
                            <td><?php echo e($produit->pivot->quantite); ?></td>
                            <td>
                            </td>

                        </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </tbody>
                    
                    
            </table>
        </section>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\ventilair\resources\views/commandes/show.blade.php ENDPATH**/ ?>