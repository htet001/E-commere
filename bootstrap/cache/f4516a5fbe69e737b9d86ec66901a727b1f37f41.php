<?php $__env->startSection("title","Product Create Page"); ?>

<?php $__env->startSection("content"); ?>

<div class="container my-5">
    <div class="row">
        <div class="col-md-4">
            <?php echo $__env->make("layout.admin_sidebar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-md-8">
            <?php echo $__env->make("layout.report_message", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- Form Start -->
            <form action="/admin/product/create" method="post" enctype="multipart/form-data"
                class="table-bordered pb-5 px-5"
                style="background-image: url(<?php echo URL_ROOT . "assets/images/back1.png" ?>);background-size: cover;">
                <h3 class="text-center pt-5 text-warning">Product Create Page</h3>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name" class="text-info">Name</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="price" class="text-info">Price</label>
                            <input type="number" step="any" class="form-control" id="price" name="price">
                        </div>
                    </div>
                </div>
                <div class="row my-3">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="cat_id" class="text-info">Category</label>
                            <select class="form-select" aria-label="Default select example" id="cat_id" name="cat_id">
                                <?php $__currentLoopData = $cats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="sub_cat_id" class="text-info">Sub Category</label>
                            <select class="form-select" aria-label="Default select example" id="sub_cat_id"
                                name="sub_cat_id">
                                <?php $__currentLoopData = $subcats; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <option value="<?php echo e($cat->id); ?>"><?php echo e($cat->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="type" class="text-info">Type</label>
                    <select class="form-select" aria-label="Default select example" id="type" name="type">
                        <option>Cloth</option>
                        <option>Food</option>
                        <option>Drink</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="formFile" class="form-label text-info">Input File</label>
                    <input class="form-control" type="file" id="file" name="file">
                </div>
                <div class="form">
                    <label for="description" class="text-info">Description</label>
                    <textarea class="form-control" id="description" name="description" style="height: 100px"></textarea>
                </div>
                <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
                <div class="d-flex flex-row-reverse my-4">
                    <button type="submit" class="btn btn-primary btn-sm" style="margin-left: 10px;">Submit</button>
                    <button type="reset" class="btn btn-secondary btn-sm">Cancel</button>
                </div>
            </form>
            <!-- Form End -->

        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>