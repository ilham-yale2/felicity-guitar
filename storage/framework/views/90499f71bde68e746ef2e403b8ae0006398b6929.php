

<?php $__env->startSection('title', 'Admin Partner'); ?>

<?php $__env->startSection('page',  'Partner > Create'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .mt-input{
        margin-top: 31px;
    }
</style>
    <div class="col-lg-12 col-12 layout-spacing">
        <h3 calss="mb-2">Add Partner</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="<?php echo e(route('partner.store')); ?>" method="POST" enctype="multipart/form-data" id="myForm">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="name">Name</label>
                                <input type="text" required class="form-control" id="name" name="name" placeholder=""
                                    >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="name">Phone</label>
                                <input type="text" required class="form-control number" id="phone" name="phone" placeholder=""
                                    >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="email">Email</label>
                                <input type="email" required class="form-control " id="email" name="email" placeholder=""
                                    >
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="form-group mb-4">
                                <label for="image">Image</label>
                                <input type="file" name="image" required class="form-control-file" id="image" >
                            </div>
                        </div>
                        <div class="col-md-4 text-center ml-auto">
                            <img src="" class="w-100" id="preview-image" alt="">
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea name="description" id="description" class="form-control summernote" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <a class="btn btn-danger mt-3" href="<?php echo e(route('product.index')); ?>"><i
                                    class="flaticon-cancel-12"></i> Back</a>
                            <button type="submit" class="btn btn-primary mt-3">Simpan</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
        $menu = 'partner';
    ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('js/partner.js')); ?>"></script>
    <script type="text/javascript">
        
        $('.summernote').summernote({
            height: 300,
            tabDisable: true,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['font', ['strikethrough', 'superscript', 'subscript']],
                ['fontsize', ['fontsize']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['height', ['height']]
            ]
        });
        var loadFile = function(event, no) {
            var output = document.getElementById('preview');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) // free memory
            }
        };

    
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/partner/create.blade.php ENDPATH**/ ?>