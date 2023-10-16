<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('title'); ?></title>
    <link rel="stylesheet" href="<?php echo URL_ROOT . 'assets/css/app.css' ?>">
    <link rel="stylesheet" href="<?php echo URL_ROOT . 'assets/css/custom.css' ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<?php echo $__env->make('layout.nav', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->yieldContent('content'); ?>

    <script src="<?php echo URL_ROOT . 'assets/js/app.js' ?>"></script>
    <?php echo $__env->yieldContent("script"); ?>
    
    <script src="<?php echo URL_ROOT . 'assets/js/query.js' ?>"></script>
    <script src="<?php echo URL_ROOT . 'assets/js/boot_bundle.js' ?>"></script>

</body>
</html>