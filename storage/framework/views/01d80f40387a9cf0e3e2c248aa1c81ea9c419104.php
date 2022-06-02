

<?php $__env->startSection('title', 'Admin User Mail'); ?>

<?php $__env->startSection('page', 'User Mail > Show '); ?>

<?php $__env->startSection('content'); ?>
<div class="col-lg-12 col-12 layout-spacing">
    <h3 calss="mb-2">Show Mail </h3>
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
                <div class="row list-sub">
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="">Name</label>
                            <input type="text" class="form-control" name="" value="<?php echo e($contact->name); ?>" id="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="">Email</label>
                            <input type="text" class="form-control" name="" value="<?php echo e($contact->email); ?>" id="">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="">Subject</label>
                            <input type="text" class="form-control" name="" value="<?php echo e($contact->subject); ?>" id="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Message</label>
                            <textarea name="" id="" class="form-control" rows="10"><?php echo e($contact->message); ?></textarea>
                        </div>
                    </div>
                    
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <a class="btn btn-danger mt-3" href="<?php echo e(route('user-contact.index')); ?>"><i
                                class="flaticon-cancel-12"></i> Back</a>
                    </div>
                </div>
            
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php
    $menu = 'contact'
?>
<?php $__env->startSection('js'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/contact/show.blade.php ENDPATH**/ ?>