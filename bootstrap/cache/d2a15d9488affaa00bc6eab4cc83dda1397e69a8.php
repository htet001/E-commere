<?php $__env->startSection("title","User Login"); ?>

<?php $__env->startSection("content"); ?>
<div class="container mt-5 table-bordered" style="background-image: url(<?php echo URL_ROOT . "assets/images/back01.jpg" ?>);background-size: cover;padding:50px 0 90px 0;">
    <div class="col-md-8 offset-md-2">
        <h1 style="text-align: center;margin-bottom:30px;font-family:cambria;color:orange;">Login</h1>
        <form>
            <div class="mb-3">
                <label for="email" class="form-label text-white">Email address</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" class="form-control" id="password" required>
            </div>
            <div class="row-fluid mt-5">  
            <a href="/user/register">Not Member Yet! Please Register Here</a>
            <span style="float: right;">
                <button type="submit" class="btn btn-outline-warning">Cancel</button>
                <button type="submit" class="btn btn-primary">Login</button>
            </span>
            </div>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make("layout.master", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>