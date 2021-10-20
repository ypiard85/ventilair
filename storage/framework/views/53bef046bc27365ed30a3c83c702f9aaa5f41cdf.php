

<?php $__env->startSection('content'); ?>
<div class="container">
    <?php if($promos): ?>
    <div class="promos">

        <?php if(Auth::user()): ?>
        <form action="<?php echo e(route('deleteuser', Auth::user() )); ?>" method="post">
            <?php echo csrf_field(); ?>
            <input name="user_id" type="text" value="<?php echo e(Auth::user()->id); ?>">
            <button onclick="return confirm('etes vous sûr de vouloir supprimer votre profil')" >Supprimer l'utilisateur</button>
        </form>
        <?php endif; ?>


        <h1 class="text-center">Les promos du moments</h1>
        <h4 class="text-center">Du
            <?php echo e(\Carbon\Carbon::parse($promos->date_debut)->format('j F Y')); ?>

            au
            <?php echo e(\Carbon\Carbon::parse($promos->date_fin)->format('j F Y')); ?>

        </h4>
        <div class="alert alert-success text-center py-5">
            <p class="fs-1"><?php echo e($promos->nom); ?></p>
        </div>
        <div class="row">
        <?php if($promos != null): ?>
            <?php $__currentLoopData = $promos->produits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $produit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $produit->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <p class="p-2"><?php echo e($produit->categorie->nom); ?></p>
                            <img src="<?php echo e(asset("images/$image->name")); ?>" class="w-100 shadow" alt="">
                                <div class="card-body">
                                    <h5 class="card-title"><?php echo e($produit->nom); ?></h5>
                                    <p>
                                        <del><?php echo e($produit->prix); ?> €</del>

                                        <span class="fs-3" ><?php echo e($produit->prix -  $produit->prix * ($promos->reduction / 100)); ?> €</span>
                                    </p>

                                    <p class="card-text"><?php echo e($produit->description_courte); ?></p>
                                    <a href="<?php echo e(route('produits.show', ['produit' => $produit->id ] )); ?>" class="btn btn-info text-white" >Voir le produit</a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php endif; ?>
            </div>
    </div>
    <?php endif; ?>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\ventilair\resources\views/home.blade.php ENDPATH**/ ?>