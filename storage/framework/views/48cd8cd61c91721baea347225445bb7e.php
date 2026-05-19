<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <title><?php echo e(generalSetting()->site_name); ?> -  <?php echo e($page = $page_title ?? ''); ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="<?php echo e(asset('public/uploads/general/'.generalSetting()->favicon)); ?>">

    <!-- App css -->
    <link href="<?php echo e(asset('public/backend/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="<?php echo e(asset('public/backend/css/icons.min.css')); ?>" rel="stylesheet" type="text/css" />
    <link href="<?php echo e(asset('public/backend/css/app.min.css')); ?>" rel="stylesheet" type="text/css"  id="app-stylesheet" />
    <style>
        .textDark{
            color:#313a46 !important;
            font-weight: 600;
        }
    </style>
</head>

<body class="authentication-bg bg-dark authentication-bg-pattern d-flex align-items-center pb-0 vh-100">

    <div class="home-btn d-none d-sm-block">
        <a href="<?php echo e(url('/')); ?>"><i class="fas fa-home h2 text-white"></i></a>
    </div>

    <div class="account-pages w-100 mt-5 mb-5">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card mb-0">

                        <div class="card-body p-4">

                            <div class="account-box">
                                <div class="account-logo-box">
                                    <div class="text-center">
                                        <a href="<?php echo e(url('/')); ?>">
                                            <img src="<?php echo e(asset('public/uploads/general/'.generalSetting()->logo)); ?>" alt="" class="w-50">
                                        </a>
                                    </div>
                                    
                                </div>
                                    <?php echo $__env->yieldContent('content'); ?>

                            </div>
                        </div>

                    </div>
                    <!-- end card-body -->
                </div>
                <!-- end card -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
    </div>
    <!-- end page -->

    <!-- Vendor js -->
    <script src="<?php echo e(asset('public/backend/js/vendor.min.js')); ?>"></script>

    <!-- App js -->
    <script src="<?php echo e(asset('public/backend/js/app.min.js')); ?>"></script>

</body>
</html>        <?php /**PATH /home/r2expert/public_html/aasiya.org.in/resources/views/layouts/master_auth.blade.php ENDPATH**/ ?>