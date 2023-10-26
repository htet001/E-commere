<?php $__env->startSection("title","Developer"); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h3 style="text-align: center;background: #222222;padding:10px 0 10px 0;color:white;">Player</h3>
    <div class="row">
        <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <div class="card mt-3" style="min-height: 150px;">
                <div class="card-header text-center" style="background-color: #222222;color:white;">
                    <?php echo e($product->name); ?>

                </div>
                <div class="card-block">
                    <img src="<?php echo e($product->image); ?>" class="img-fluid" style="height: 300px;" alt="">
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="/product/<?php echo e($product->id); ?>/detail" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <p style="text-align: center;"><b>$<?php echo e($product->price); ?></b></p>
                        <button class="btn btn-info" onclick="addToCart('<?php echo e($product->id); ?>')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="container mt-4">
    <h3 style="text-align: center;background: #222222;padding:10px 0 10px 0;color:white;">Myanmar</h3>
    <div class="row">
        <?php $__currentLoopData = $myan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <div class="card mt-3" style="min-height: 150px;">
                <div class="card-header">
                    <?php echo e($product->name); ?>

                </div>
                <div class="card-block">
                    <img src="<?php echo e($product->image); ?>" class="img-fluid" style="height: 300px;" alt="">
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="/product/<?php echo e($product->id); ?>/detail" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <p style="text-align: center;"><b>$<?php echo e($product->price); ?></b></p>
                        <button class="btn btn-info" onclick="addToCart('<?php echo e($product->id); ?>')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="container mt-4">
    <h3 style="text-align: center;background: #222222;padding:10px 0 10px 0;color:white;">Shirt</h3>
    <div class="row">
        <?php $__currentLoopData = $cloth; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <div class="card mt-3" style="min-height: 150px;">
                <div class="card-header">
                    <?php echo e($product->name); ?>

                </div>
                <div class="card-block">
                    <img src="<?php echo e($product->image); ?>" class="img-fluid" style="height: 300px;" alt="">
                </div>
                <div class="card-footer">
                    <div class="d-flex justify-content-between">
                        <a href="/product/<?php echo e($product->id); ?>/detail" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <p style="text-align: center;"><b>$<?php echo e($product->price); ?></b></p>
                        <button class="btn btn-info" onclick="addToCart('<?php echo e($product->id); ?>')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<!-- <div class="container mt-4">
    <h3 style="text-align: center;background: #222222;padding:10px 0 10px 0;color:white;">All</h3>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-3">
            <div class="card mt-3" style="min-height: 150px;">
                <div class="card-header">
                    <?php echo e($product->name); ?>

                </div>
                <div class="card-block">
                    <img src="<?php echo e($product->image); ?>" class="img-fluid" style="height: 300px;" alt="">
                </div>
                <div class="card-footer">
                    <p style="text-align: center;"><b>$<?php echo e($product->price); ?></b></p>
                    <div class="d-flex justify-content-between">
                        <a href="/product/<?php echo e($product->id); ?>/detail" class="btn btn-info"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        <button class="btn btn-info" onclick="addToCart('<?php echo e($product->id); ?>')"><i class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div>
            <?php echo $pages; ?>

        </div>
    </div>
</div> -->
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>