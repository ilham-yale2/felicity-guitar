
<?php $__env->startSection('meta'); ?> <?php echo $__env->make('layout.meta', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> <?php $__env->stopSection(); ?>

<?php $__env->startSection('title', 'Forgot Password'); ?>

<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="aboutus">
        <div class="container">
            <section class="aboutus_description py-5 ">
                <h2 class="text-center">Reset Password</h2>
                <div class="text-description">
                    <form action="<?php echo e(route('reset.password.submit')); ?>" method="POST" class="col-md-5 col-12 mx-auto">
                        <input type="hidden" value="<?php echo e($user->code); ?>" name="code">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php echo csrf_field(); ?>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input class="form-control form-control-lg" required type="email" placeholder="example@gmail.com"
                                name="email" id="email" autocomplete="off" value="<?php echo e($user->email); ?>">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input class="form-control form-control-lg" required type="password" 
                                name="password" id="password" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label for="confirm_password">Confirm Password</label>
                            <input class="form-control form-control-lg" required type="password" 
                                name="confirm_password" id="confirm_password" autocomplete="off">
                        </div>
                        <button class="btn bg-orange text-white rounded w-100 mt-5" type="submit">Submit</button>
                    </form>
                </div>
            </section>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/password/form.blade.php ENDPATH**/ ?>