

<?php $__env->startSection('title', 'Admin Product'); ?>

<?php $__env->startSection('page', 'Data Master > Produk > Create'); ?>

<?php $__env->startSection('content'); ?>
<style>
    .mt-input{
        margin-top: 31px;
    }
</style>
    <div class="col-lg-12 col-12 layout-spacing">
        <h3 calss="mb-2">Create Product</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="<?php echo e(route('vault.store')); ?>" method="POST" enctype="multipart/form-data" id="myForm">
                    <?php echo csrf_field(); ?>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Product Name (Single Item)</label>
                                <input type="text" class="form-control " id="name" name="name" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="name">Product Name (Multi Item)</label>
                                <input type="text" class="form-control " id="name" name="name_2" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="brand_id">Brand</label>
                                <select name="brand_id" id="brand_id" class="form-control  select2" >
                                    <option value="">Select Brand</option>
                                    <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $b): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($b->id); ?>"><?php echo e($b->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="category_id">Category</label>
                                <select name="category_id" id="category_id" class="form-control select2">
                                    <option value="">Select Category</option>
                                    <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ctg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <option value="<?php echo e($ctg->id); ?>"><?php echo e($ctg->name); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-4">
                                <label for="meta_text">Meta Text</label>
                                <input type="text" class="form-control" name="meta_text" required id="meta_text">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group mb-4">
                                <label for="alt_text">Alt Text</label>
                                <input type="text" class="form-control" name="alt_text" required id="alt_text">
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="price">Price (IDR)</label>
                                <input type="tel" class="form-control money text-right" id="price" name="price"
                                    placeholder=""  onkeyup="getSellPrice()" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="disc">Discount</label>
                                <input  type="text" size="4" maxlength="3" class="form-control discount text-right" id="disc" name="discount" placeholder="Diskon (%)"
                                    value="0" onkeyup="getSellPrice()">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-4">
                                <label for="price">Sell Price</label>
                                <input type="number" class="form-control money" id="sell_price" name="sell_price" value="0"
                                     readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-4">
                                <label for="thumbnail">Thumbnail (Single View)</label>
                                <input required type="file" name="thumbnail_2" class="form-control-file" id="thumbnail-2" >
                            </div>
                        </div>
                        
                        <div class="col-md-5">
                            <div class="form-group mb-4">
                                <label for="thumbnail">Thumbnail (Multi View)</label>
                                <input required type="file" name="thumbnail" class="form-control-file" id="thumbnail" >
                            </div>
                        </div>
                       
                        <div class="col-md-6 text-center">
                            <img class="w-100"src="" id="preview-photo2" alt="">
                        </div>
                        <div class="col-md-6 text-center preview">
                            <img class="w-100" src="" id="preview-photo" alt="">
                        </div>
                        <div class="col-md-12">
                            <div class="input-field">
                                <label class="active">Photos</label>
                                <p class="w-100 text-italic text-danger">*For better experience, maximum upload 10 files.</p>
                                <div class="input-images-1" style="padding-top: .5rem;"></div>
                            </div>
                        </div>
                        <div class="col-md-12 mt-3"> 
                            <div class="form-group mb-4">
                                <label for="exampleFormControlTextarea1">Text</label>
                                <textarea class="form-control summernote-color" rows="3" name="text"
                                 id="text"></textarea>
                            </div>
                        </div>
                        <h4 class="col-12 mt-5 mb-2 text-center">Description Product</h4>
                        <div class="col-md-12">
                            <div class="form-group mb-4">
                                <label for="description">Description</label>
                                <textarea class="form-control summernote" rows="3" name="description"
                                 id="description"></textarea>
                            </div>
                        </div>
                        

                        <h4 class="mt-5 text-center w-100">Filter Needs</h4>
                        <p class="col-12"><i class="text-danger w-100 ">*The column below is for filter needs only</i></p>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="type">Type</label>
                                <select name="type" id="type" class="form-control   select2" required>
                                    <option selected disabled>Select Type</option>
                                    <option value="1">Solid Body</option>
                                    <option value="2">Semi-hollowbody</option>
                                    <option value="3">Offset</option>
                                    <option value="4">Hollowbody</option>
                                    <option value="5">Acoustic</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="country">Country of Origin</label>
                                <select name="country" id="country" class="form-control   select2" required>
                                    <option selected disabled>Select Country</option>
                                    <option value="1">Custom</option>
                                    <option value="2">Memphis</option>
                                    <option value="3">Montana</option>
                                    <option value="4">U.S.A</option>
                                    <option value="5">Mexico</option>
                                    <option value="6">China</option>
                                    <option value="7">Custom Historic</option>
                                    <option value="8">Japan</option>
                                    <option value="9">Korea</option>
                                    <option value="10">Indonesia</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="condition">Condition</label>
                                <select name="condition" id="condition" class="form-control  select2" required>
                                    <option selected disabled>Select Condition</option>
                                    <option value="1">New</option>
                                    <option value="2">Used</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="year"> Year </label>
                                <input name="year" id="year" class=" year form-control" />   
                            </div>
                        </div>
                        
                        <h4 class="col-12 mt-5 mb-2 text-center">Specification Product</h4>
                        <div class="col-12 mt-4 d-flex align-items-end mb-4">
                            <h5 class="mb-0">General</h5>
                        </div>
                        
                        <div class="col-md-12">
                            <textarea name="general" class="form-control summernote"  id=""rows="10"></textarea>
                        </div>
                        <div class="col-12 mt-4 d-flex mb-4">
                            <h5 class="mb-0">Body</h5>
                        </div>
                        <div class="col-md-12">
                            <textarea name="body" class="form-control summernote"  id=""rows="10"></textarea>

                        </div>
                        <div class="col-12 mt-4 d-flex mb-4">
                            <h5 class="mb-0">Neck</h5>
                        </div>
                        <div class="col-md-12">
                            <textarea name="neck" class="form-control summernote"  id=""rows="10"></textarea>
                        </div>
                        <div class="col-12 mt-4 d-flex mb-4">
                            <h5 class="mb-0">Hardware</h5>
                        </div>
                        <div class="col-md-12">
                            <textarea name="hardware" class="form-control summernote"  id=""rows="10"></textarea>
                        </div>
                        <div class="col-12 mt-4 d-flex mb-4">
                            <h5 class="mb-0">Electronic</h5>
                        </div>
                        <div class="col-md-12">
                            <textarea name="electronic" class="form-control summernote"  id=""rows="10"></textarea>
                        </div>
                        <div class="col-12 mt-4 d-flex mb-4">
                            <h5 class="mb-0">Miscellaneous</h5>
                        </div>
                        <div class="col-md-12">
                            <textarea name="miscellaneous" class="form-control summernote"  id=""rows="10"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-10">
                            <a class="btn btn-danger mt-3" href="<?php echo e(route('product.index')); ?>"><i
                                    class="flaticon-cancel-12"></i> Back</a>
                            <button type="submit" class="btn btn-primary mt-3">Submit</button>
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>
    <?php if(\Session::has('images')): ?>
    <script>
        
        setTimeout(() => {
            Swal.fire({
                icon: 'error',
                title: 'Oops ...!',
                text: "<?php echo \Session::get('images'); ?>",
            })
        }, 1000);
    </script>    
    <?php endif; ?>
    <script src="<?php echo e(asset('js/product.js')); ?>"></script>
    <script type="text/javascript">
       
        $('.input-images-1').imageUploader();
        $("div#Image").dropzone({
            url: "null"
        });
        $(".yearpicker").datetimepicker({
            format: "YYYY",
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

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/private-vault/create.blade.php ENDPATH**/ ?>