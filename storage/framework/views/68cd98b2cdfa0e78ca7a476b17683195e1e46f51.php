<!doctype html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <link rel="shortcut icon" href="<?php echo e(get_favicon()); ?>">

    <title><?php echo e(get_option('site_title', config('app.name'))); ?></title>

    <!-- Scripts -->
    <script src="<?php echo e(asset('auth/js/app.js')); ?>" defer></script>

    <!-- Google font -->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="<?php echo e(asset('auth/css/bootstrap.min.css')); ?>" rel="stylesheet">
    <link href="<?php echo e(asset('auth/css/app.css')); ?>" rel="stylesheet">
</head>
<body>
    <div id="app">
        <main class="py-4">
            <?php echo $__env->yieldContent('content'); ?>
        </main>
    </div>

	<?php echo $__env->yieldContent('js-script'); ?>
</body>
</html>
<?php /**PATH /opt/lampp/htdocs/kdb_secure_bank/resources/views/layouts/auth.blade.php ENDPATH**/ ?>