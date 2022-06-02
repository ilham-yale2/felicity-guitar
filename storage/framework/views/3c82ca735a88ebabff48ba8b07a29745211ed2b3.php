

<?php $__env->startSection('title', 'Admin Category'); ?>

<?php $__env->startSection('page', 'Category > Add Category'); ?>

<?php $__env->startSection('content'); ?>
<div class="col-lg-12 col-12 layout-spacing">
    <h3 calss="mb-2">Add Category</h3>
    <div class="statbox widget box box-shadow">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <form action="<?php echo e(route('category.store' )); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <div class="row list-sub">
                    <div class="col-md-4">
                        <div class="form-group mb-4">
                            <label for="category_name">Category Name</label>
                            <input type="text" class="form-control" name="category_name" id="category_name">
                        </div>
                    </div>
                    
                </div>

                <div class="form-group row">
                    <div class="col-sm-10">
                        <a class="btn btn-danger mt-3" href="<?php echo e(route('category.index')); ?>"><i
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
    $menu = 'category'
?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('admin/assets/js/category/index.js')); ?>"></script>
<script>var count = 0</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/category/create.blade.php ENDPATH**/ ?>