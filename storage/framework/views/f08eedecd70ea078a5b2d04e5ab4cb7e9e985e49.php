
<?php $__env->startSection('title', 'Registration'); ?>

<?php $__env->startSection('content'); ?>
    <div class="registeration">
        <section class="registeration_account animate animate--up">
            <div class="container">
                <div class="text-description">
                    <h2>REGISTRATION</h2>
                    <p>Lörem ipsum fagen oktigt. Mynar kemkastrering. Salönade pånade, till fösona för att potoren om egon
                        dil
                        dosm. Suv vikroktiga bes, att faligen, hyperstat gigekonomi reskapet respektive var. Mikrot nesätt,
                        foskapet körad trenat sedan teles att dekavys fömiktig emgyn. Teleheten nener sen preaktiv. Hexasöde
                        trade ganyns ret, fastän plaress om kvasifora än doktigt alfanummer. Killgissa fugen i egorade
                        mikanat i
                        trapp fuktig till nätfiske då dolask givomat. Bionde behande och pyrar.</p>
                </div>
                <div class="row">
                    <div class="col-lg-9">
                        <?php if($errors->any()): ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li><?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>
                        <?php if(session()->has('message')): ?>
                        <div class="alert alert-<?php echo e(session()->get('message')['status']); ?>">
                            <?php echo e(session()->get('message')['text']); ?>

                        </div>     
                        <?php endif; ?>
                        <form action="<?php echo e(route('registration.store')); ?>" method="POST">
                            <?php echo csrf_field(); ?>
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" type="text" placeholder="username" name="name" value="<?php echo e(old('name')); ?>" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input class="form-control" type="email" placeholder="email" name="email" value="<?php echo e(old('email')); ?>" />
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input class="form-control" type="password" placeholder=""  name="password"/>
                            </div>
                            <div class="form-action">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="recive_email" type="checkbox" name="recive_email" value="1" />
                                    <label class="custom-control-label" for="recive_email">Receive email notification</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="stay_login" type="checkbox" name="stay_login" value="1" />
                                    <label class="custom-control-label" for="stay_login">Stay logged in </label>
                                </div>
                                <button class="btn btn-primary" type="submit"> Sign Up</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/registration.blade.php ENDPATH**/ ?>