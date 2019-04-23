<!doctype html>

<html class="no-js" lang="">
<head>
    <link rel="shortcut icon" href="icon_customer/favicon.ico" type="image/x-icon">
    <meta charset="utf-8">
    <meta http-equiv="refresh" content="900">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="description" content="">
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $__env->yieldContent('Ẩm thực quanh ta'); ?></title>
    <base href="<?php echo e(asset('')); ?>">
    <link href="vendor_customer/assets/css/google_fonts.css" rel="stylesheet"> 
    <link rel="stylesheet" href="vendor_customer/assets/css/skills/progressbar.css">
    <link rel="stylesheet" href="vendor_customer/assets/css/skills/style.css">
    <link rel="stylesheet" href="vendor_customer/assets/css/fonticons.css">
    <link rel="stylesheet" href="vendor_customer/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendor_customer/assets/css/bootstrap.min.css">

    <!--For Plugins external css-->
    <link rel="stylesheet" href="vendor_customer/assets/css/teamslide.css"/>
    <link rel="stylesheet" href="vendor_customer/assets/css/plugins.css"/>
    <!--Theme custom css -->
    <link rel="stylesheet" href="vendor_customer/assets/css/style.css">
    <link rel="stylesheet" href="vendor_customer/assets/css/chitietmonan.css" >
    <link rel="stylesheet" type="text/css" href="vendor_customer/assets/css/modalHeader.css">
    <!--Theme Responsive css-->
    <link rel="stylesheet" href="vendor_customer/assets/css/responsive.css"/>
    <!-- <link rel="stylesheet" type="text/css" href="vendor_customer/vendor/css/mycss.css"> -->
    <script src="vendor_customer/assets/js/vendor/jquery-1.11.2.min.js"></script>
    <script src="vendor_customer/assets/js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
</head>
<body data-spy="scroll" data-target="#main_menu" data-offset="160">

<?php echo $__env->make("customer.layouts.header", \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<section id="content" class="content container-fluid">
 <?php if(session('thongbao')): ?>
    <script>
       <?php echo e(session('thongbao')); ?>

    </script>
    <?php endif; ?>

    <?php if(session('thongbaoloi')): ?>
    <script>
       <?php echo e(session('thongbaoloi')); ?>

    </script>
    <?php endif; ?>
    <?php if(count($errors) > 0): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $err): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <script>
            alert("<?php echo e($err); ?>");
        </script>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
     <?php endif; ?>
<?php echo $__env->yieldContent('content'); ?>
<?php echo $__env->make('customer.layouts.couter', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</section>

<hr class="alert-warning" style="border: 5px;">




<!-- START SCROLL TO TOP  -->
<div class="scrollup">
    <a href="#"><i class="fa fa-chevron-up"></i></a>
</div>

<script src="vendor_customer/assets/js/vendor/bootstrap.min.js"></script>
<script src="vendor_customer/assets/js/jquery.easypiechart.min.js"></script>
<script src="vendor_customer/assets/js/jquery.mixitup.min.js"></script>
<script src="vendor_customer/assets/js/jquery.easing.1.3.js"></script>
<script src="vendor_customer/assets/css/skills/inview.min.js"></script>
<script src="vendor_customer/assets/css/skills/progressbar.js"></script>
<script src="vendor_customer/assets/css/skills/main.js"></script>
<script src="vendor_customer/assets/js/modalHeader.js"></script>
<script src="vendor_customer/assets/js/plugins.js"></script>
<script src="vendor_customer/assets/js/main.js"></script>




<?php echo $__env->yieldContent('script'); ?>
</body>
</html>

<?php /* E:\Xampp.7.3\htdocs\bkcook.vn\resources\views/customer/layouts/master.blade.php */ ?>