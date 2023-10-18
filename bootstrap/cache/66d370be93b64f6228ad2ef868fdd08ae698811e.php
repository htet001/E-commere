<?php $__env->startSection("title","Product Home Page"); ?>

<?php $__env->startSection("content"); ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <?php echo $__env->make("layout.admin_sidebar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-md-8">
            <?php if(\App\classes\Session::has("product_insert_success")): ?>
                <?php echo e(\App\classes\Session::flash("product_insert_success")); ?>

            <?php endif; ?>    

        <!-- Table Start -->
        <table class="table table-bordered">
            <thead>
                <tr>
                <th>No</th>
                <th>Image</th>
                <th>Name</th>
                <th>Price</th>
                <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr class="text-muted">
                <th><?php echo e($product->id); ?></th>
                <td><img src="<?php echo e($product->image); ?>" alt="" style="max-width: 150px;max-height: 100px;"></td>
                <td><?php echo e($product->name); ?></td>
                <td><?php echo e($product->price); ?></td>
                <td>
                <a href="/admin/product/<?php echo e($product->id); ?>/edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                <i class="fa fa-trash" aria-hidden="true"></i>
                </td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
            </table>
        <!-- Table End -->
            <div>
                <?php echo $pages; ?>

            </div>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>