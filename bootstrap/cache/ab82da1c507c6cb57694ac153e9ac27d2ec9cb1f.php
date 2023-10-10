<?php $__env->startSection('title','Category Create'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <h1 class="text-warning text-center">Create Category</h1>
        <div class="col-md-8 offset-md-2">
            <!-- Form Start -->
            <form action="/admin/category/create" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="file">Input File</label>
                    <input type="file" class="form-control" name="file">
                </div>
                <div class="row-no-gutters" id="createButton">
                    <button type="submit" class="btn btn-warning text-white">Create</button>
                </div>
            </form>
            <!-- Form End -->
        </div>
    </div>

    <script src="<?php echo URL_ROOT . 'assets/js/app.js' ?>"></script>
</body>
</html>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>