<?php $__env->startSection('title','Category Create'); ?>

<?php $__env->startSection('content'); ?>

    <div class="container">
        <h1 class="text-warning text-center">Create Category</h1>
        <div class="row">
        <div class="col-md-4 my-5">
            <?php echo $__env->make("layout/admin_sidebar", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <div class="col-md-8">
            <!-- Form Start -->
            <form action=<?php use App\classes\CSRFToken;
                echo URL_ROOT."admin/category/create";?> method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" class="form-control" name="name">
                </div>
                <input type="hidden" name="token" value="<?php CSRFToken::_token()?>">
                <div class="row-no-gutters" id="createButton">
                    <button type="submit" class="btn btn-warning text-white">Create</button>
                </div>
            </form>
            <!-- Form End -->
            <div>
            <ul class="list-group">
                <li class="list-group-item rounded-0"><a href="/admin/category/all">All Category</a></li>
                <li class="list-group-item rounded-0"><a href="/admin/category/create">Category Create</a></li>
            </ul>
            </div>
        </div>
        </div>
    </div>

    <script src="<?php echo URL_ROOT . 'assets/js/app.js' ?>"></script>
</body>
</html>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>