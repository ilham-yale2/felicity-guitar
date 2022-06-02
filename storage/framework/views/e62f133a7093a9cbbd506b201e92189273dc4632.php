

<?php $__env->startSection('title', 'Admin Brand'); ?>

<?php $__env->startSection('page', 'Brand > Add Brand'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-lg-12 col-12 layout-spacing">
    <h3 calss="mb-2">Add Brand</h3>
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <form action="<?php echo e(route('brand.store' )); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row list-sub">
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="brand_name">Brand Name</label>
                            <input type="text" class="form-control" name="brand_name" id="brand_name">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="image">Brand Image</label>
                            <input type="file" name="image" class="form-control-file" id="image" >
                        </div>
                    </div>
                    <div class="col-md-4 text-center">
                        <img src="" id="preview-image" alt="">
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <a class="btn btn-danger mt-3" href="<?php echo e(route('brand.index')); ?>"><i
                                class="flaticon-cancel-12"></i> Back</a>
                        <button type="submit" class="btn btn-primary mt-3">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php
    $menu = 'brand'
?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('admin/assets/js/category/index.js')); ?>"></script>
<script>
    $('#image').change(function(){
        console.log('okey');
        readURL(this, $('#preview-image'))
    })
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/brand/create.blade.php ENDPATH**/ ?>