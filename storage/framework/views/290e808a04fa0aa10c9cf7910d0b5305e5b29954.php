
<?php $__env->startSection('meta'); ?> <?php echo $__env->make('layout.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('title', 'Home'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<style>
    .header .menu-wrap > li{
        padding-left: 20px;
        padding-right: 20px;
    }
    .header_top{
        margin-bottom: .5rem;
    }
    .header{
        padding-top: 25px;
    }
    body::before{
        background-image: url("<?php echo e(asset('images/bg.png')); ?>") ;
        background-position: top;
        background-size: cover;
    }
    footer{
        display: none;
    }
    .header_logo{
        display: none
    }
</style>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', ['brand' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/index.blade.php ENDPATH**/ ?>