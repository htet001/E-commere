<?php $__env->startSection("title","Developer"); ?>

<?php $__env->startSection('content'); ?>

<div class="container my-5">
    <div class="card p-5">
        <div class="d-flex">
            <div class="col-md-3">
                <img src="<?php echo e($product->image); ?>" alt="" class="img-fluid">
            </div>
            <div class="col-md-9" style="padding-left: 50px;">
                <h3 class="card-title"><?php echo e($product->name); ?></h3>
                <p><?php echo e($product->description); ?></p>
                <button class="btn btn-warning"><?php echo e($product->price); ?>Ks</button>
                <button class="btn btn-success">Add To Cart</button>
                <p class="mt-3">
                    <span>
                        Rate:
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star text-warning"></i>
                        <i class="fa fa-star-half text-warning"></i>
                    </span>
                </p>
            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>