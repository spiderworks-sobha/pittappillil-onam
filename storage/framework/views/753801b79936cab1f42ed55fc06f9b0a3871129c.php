<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">

    <title><?php echo e(config('app.name', 'Aster')); ?></title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">
    <!-- css -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="<?php echo e(asset('public/assets/admin')); ?>/vendor/fontawesome/css/fontawesome.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/admin')); ?>/vendor/fontawesome/css/solid.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/admin')); ?>/vendor/fontawesome/css/brands.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/admin')); ?>/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/admin')); ?>/css/master.css" rel="stylesheet">
    <link href="<?php echo e(asset('public/assets/admin')); ?>/vendor/flagiconcss/css/flag-icon.min.css" rel="stylesheet">
    <?php echo e($head??''); ?>

    <style>
        #sidebar {
            background: #fff !important;
        }

        .status-success {
            /* background-image: url('<?php echo e(asset("public/assets/img/success.png")); ?>'); */
            width: 20%;
        }

        .status-faild {
            /* background-image: url('<?php echo e(asset("public/assets/img/faild.png")); ?>'); */
            width: 20%;

        }
    </style>
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100">


        <!-- Page Heading -->
        <header class="bg-white shadow">
            <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                <?php echo e($header??''); ?>

            </div>
        </header>

        <!-- Page Content -->
        <main>
            <?php echo e($slot); ?>

        </main>
    </div>
    <!-- Scripts -->
    <script src="<?php echo e(asset('public/assets/admin')); ?>/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo e(asset('public/assets/admin')); ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo e(asset('public/assets/admin')); ?>/vendor/chartsjs/Chart.min.js"></script>
    <script src="<?php echo e(asset('public/assets/admin')); ?>/js/dashboard-charts.js"></script>
    <?php echo e($footer??''); ?>

    <script src="<?php echo e(asset('public/assets/admin')); ?>/js/script.js"></script>

</body>

</html><?php /**PATH C:\xampp\htdocs\pitta-onam\resources\views/layouts/app.blade.php ENDPATH**/ ?>