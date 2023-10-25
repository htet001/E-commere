<style>
        body {
            background-image: url(<?php echo URL_ROOT . "assets/images/back01.jpg" ?>);
            background-size: cover;
        }
</style>


<?php $__env->startSection("title","User Register"); ?>

<?php $__env->startSection("content"); ?>
<div class="container col-md-8 mt-5 table-bordered" style="background-image: url(<?php echo URL_ROOT . "assets/images/back01.jpg" ?>);background-size: cover;padding:50px 0 90px 0;">
    <div class="col-md-6 offset-md-3">
        <h1 style="text-align: center;margin-bottom:30px;font-family:cambria;color:orange;">Register</h1>
        <?php if(\App\Classes\Session::has("error_message")): ?>
            <?php echo e((\App\Classes\Session::flash("error_message"))); ?>

        <?php endif; ?>    
        <form action="/user/register" method="post">
            <input type="hidden" name="token" value="<?php echo e(\App\Classes\CSRFToken::_token()); ?>">
            <div class="mb-3">
                <label for="name" class="form-label text-white">Name</label>
                <input type="name" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label text-white">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <div class="mb-3">
                <label for="confirm_password" class="form-label text-white">Confirm Password</label>
                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
            </div>
            <div class="row-fluid mt-2">  
            <a href="/user/login">If Already have register! Please Login Here</a>
            <span style="float: right;margin-top:50px;">
                <button type="submit" class="btn btn-outline-warning">Cancel</button>
                <button type="submit" class="btn btn-primary">Register</button>
            </span>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>