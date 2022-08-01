
<?php $__env->startSection('meta'); ?> <?php echo $__env->make('layout.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Login'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="aboutus">
        <div class="container">
            <section class="aboutus_description py-5 ">
                <h2 class="text-center">Login</h2>
                <div class="text-description">
                    <form action="<?php echo e(route('submit.sign-in')); ?>" method="POST" class="col-md-5 col-12 mx-auto">
                       
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control form-control-lg" type="email" placeholder="example@gmail.com"
                                name="email" id="email" autocomplete="off" value="<?php echo e(old('email')); ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control form-control-lg" type="password" placeholder="*******" name="password"
                                id="password" autocomplete="off">
                        </div>
                        <a href="<?php echo e(route('forgot.password')); ?>">
                            <p class="text-right">Forgot Password?</p>
                        </a>
                        <div class="mt-4">
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="" id="notif" name="notif"
                                    autocomplete="off">
                                <label class="form-check-label ml-3" for="notif">
                                    I would like to receive important notifications
                                </label>
                            </div>
                            <div class="form-check mt-3">
                                <input class="form-check-input" type="checkbox" value="0" id="remember" name="remember">
                                <label class="form-check-label ml-3" for="remember">
                                    Stay logged in
                                </label>
                            </div>
                        </div>
                        
                        <button class="btn bg-orange text-white rounded w-100 mt-3" type="submit">Login</button>
                        <p class="mt-3 text-center">Don’t have an account yet? Register <a href="<?php echo e(route('registration')); ?>" style="text-decoration: underline"> here.</a></p>
                    </form>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/login.blade.php ENDPATH**/ ?>