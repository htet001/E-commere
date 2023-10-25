<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="Shortcut icon" href="<?php echo e(asset('images/om.png')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/app.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('css/custom.css')); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php echo $__env->make('layout.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="<?php echo URL_ROOT . 'assets/js/app.js' ?>"></script>
    <script src="<?php echo URL_ROOT . 'assets/js/query.js' ?>"></script>
    <script src="<?php echo URL_ROOT . 'assets/js/custom.js' ?>"></script>
    <script src="<?php echo URL_ROOT . 'assets/js/boot_bundle.js' ?>"></script>
    <script src="<?php echo URL_ROOT . 'assets/js/tether.min.js' ?>"></script>
    <?php echo $__env->yieldContent("script"); ?>
    
</body>
</html>