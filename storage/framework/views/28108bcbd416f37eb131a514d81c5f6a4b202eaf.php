
<?php $__env->startSection('meta'); ?> <?php echo $__env->make('layout.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Forgot Password'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="aboutus">
        <div class="container">
            <section class="aboutus_description py-5 ">
                <h2 class="text-center">Forgot Password</h2>
                <div class="text-description">
                    <form action="<?php echo e(route('forgot.password.email')); ?>" method="POST" class="col-md-5 col-12 mx-auto">
                       
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control form-control-lg" type="email" placeholder="example@gmail.com"
                                name="email" id="email" autocomplete="off">
                        </div>
                        <button class="btn bg-orange text-white rounded w-100 mt-5" type="submit">Submit</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/password/index.blade.php ENDPATH**/ ?>