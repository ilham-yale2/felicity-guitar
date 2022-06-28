
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
        background-image: url("<?php echo e(asset('images/landing-background.jpg')); ?>") ;
        background-position: top;
        background-size: cover;
    }
    footer{
        display: none;
    }
    .header_logo{
        display: none
    }

    @media(max-width:767px){
        .header_top{
        margin-top: 2.5rem;
        }
        .header_right{
            justify-content: center!important;
            padding-right: 0px!important 
        }
        body::before{
            background-image: url("<?php echo e(asset('images/body-top.jpg')); ?>") ;
            background-position: top;
            background-size: cover;
        }
        #wrap{
            padding-top: 0px;
        }
    }
</style>
<div class="d-flex align-items-center justify-center w-100 px-5 d-block d-md-none" style="min-height: 100vh">
    <img src="<?php echo e(asset('images/Felicitys-Logo-Primary.png')); ?>" class="w-100" alt="">
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', ['brand' => true], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/index.blade.php ENDPATH**/ ?>