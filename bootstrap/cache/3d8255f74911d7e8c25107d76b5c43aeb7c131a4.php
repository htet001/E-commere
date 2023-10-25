<?php $__env->startSection("title","Developer"); ?>

<?php $__env->startSection('content'); ?>
<div class="container mt-4">
    <h2 style="text-align: center;">MLBB Popular Player</h2>
    <div class="row">
        <?php $__currentLoopData = $featured; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    <?php echo e($product->name); ?>

                </div>
                <div class="card-block" style="height: 150px;">
                    <img src="<?php echo e($product->image); ?>" class="img-fluid" style="min-height: 150px;" alt="">
                </div>
                <div class="card-footer">
                    <p style="text-align: center;"><b>$<?php echo e($product->price); ?></b></p>
                    <div class="d-flex justify-content-between">
                        <a href="/product/<?php echo e($product->id); ?>/detail" class="btn btn-info"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>
                        <button class="btn btn-info" onclick="addToCart('<?php echo e($product->id); ?>')"><i
                                class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="container mt-4">
    <h2 style="text-align: center;">Myanmar MLBB Legendary Player</h2>
    <div class="row">
        <?php $__currentLoopData = $myan; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    <?php echo e($product->name); ?>

                </div>
                <div class="card-block" style="height: 150px;">
                    <img src="<?php echo e($product->image); ?>" class="img-fluid" style="min-height: 150px;" alt="">
                </div>
                <div class="card-footer">
                    <p style="text-align: center;"><b>$<?php echo e($product->price); ?></b></p>
                    <div class="d-flex justify-content-between">
                        <a href="/product/<?php echo e($product->id); ?>/detail" class="btn btn-info"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>
                        <button class="btn btn-info" onclick="addToCart('<?php echo e($product->id); ?>')"><i
                                class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="container mt-4">
    <h2 style="text-align: center;">Jersey</h2>
    <div class="row">
        <?php $__currentLoopData = $jersey; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-2">
            <div class="card mt-3">
                <div class="card-header">
                    <?php echo e($product->name); ?>

                </div>
                <div class="card-block" style="height: 150px;">
                    <img src="<?php echo e($product->image); ?>" class="img-fluid" style="min-height: 150px;" alt="">
                </div>
                <div class="card-footer">
                    <p style="text-align: center;"><b>$<?php echo e($product->price); ?></b></p>
                    <div class="d-flex justify-content-between">
                        <a href="/product/<?php echo e($product->id); ?>/detail" class="btn btn-info"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>
                        <button class="btn btn-info" onclick="addToCart('<?php echo e($product->id); ?>')"><i
                                class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="container mt-4">
    <h2 style="text-align: center;">ALL</h2>
    <div class="row">
        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-md-2">
            <div class="card">
                <div class="card-header">
                    <?php echo e($product->name); ?>

                </div>
                <div class="card-block" style="height: 150px;">
                    <img src="<?php echo e($product->image); ?>" class="img-fluid" style="min-height: 150px;" alt="">
                </div>
                <div class="card-footer">
                    <p style="text-align: center;"><b>$<?php echo e($product->price); ?></b></p>
                    <div class="d-flex justify-content-between">
                        <a href="/product/<?php echo e($product->id); ?>/detail" class="btn btn-info"><i class="fa fa-eye"
                                aria-hidden="true"></i></a>
                        <button class="btn btn-info" onclick="addToCart('<?php echo e($product->id); ?>')"><i
                                class="fa fa-shopping-cart" aria-hidden="true"></i></button>
                    </div>
                </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <div>
            <?php echo $pages; ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>