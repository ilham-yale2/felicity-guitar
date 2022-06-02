

<?php $__env->startSection('title', 'Admin Dashboard'); ?>

<?php $__env->startSection('page', 'User Trade > show'); ?>

<?php $__env->startSection('content'); ?>
    <div class="col-lg-12">
        <h3 calss="mb-2">Show User Trade</h3>
        <div class="statbox widget box box-shadow">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <form action="">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Name</label>
                                <input class="form-control" type="text" value="<?php echo e($trade->name); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input class="form-control" type="text" value="<?php echo e($trade->email); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" type="text" value="<?php echo e($trade->phone); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group ">
                                <label for="">Piece of Gear</label>
                                <div class="d-flex">
                                    <div class="form-check d-inline mr-5">
                                        <input class="form-check-input" type="radio" <?php if($trade->piece_of_gear == 0): ?> checked <?php endif; ?>>
                                        <label class="form-check-label py-1 px-3 coa rounded">
                                            No
                                        </label>
                                    </div>
                                    <div class="form-check d-inline ">
                                        <input class="form-check-input" type="radio" <?php if($trade->piece_of_gear == 1): ?> checked <?php endif; ?>>
                                        <label class="form-check-label py-1 px-3 coa rounded">
                                            Yes
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-0">
                                <label>Gear Type</label>
                                <select  class="form-control select2" disabled>
                                    <option value="1" <?php if($trade->gear_type == 1): ?> selected <?php endif; ?>> Gear type 1</option>
                                    <option value="2" <?php if($trade->gear_type == 2): ?> selected <?php endif; ?>> Gear type 2</option>
                                    <option value="3" <?php if($trade->gear_type == 3): ?> selected <?php endif; ?>> Gear type 3</option>
                                    <option value="4" <?php if($trade->gear_type == 4): ?> selected <?php endif; ?>> Gear type 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Make</label>
                                <input class="form-control" type="text" value="<?php echo e($trade->make); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Model</label>
                                <input class="form-control" type="text" value="<?php echo e($trade->model); ?>" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-0">
                                <label>Condition</label>
                                <select  class="form-control select2" disabled>
                                    <option value="1" <?php if($trade->condition == 1): ?> selected <?php endif; ?>>condition 1</option>
                                    <option value="2" <?php if($trade->condition == 2): ?> selected <?php endif; ?>>condition 2</option>
                                    <option value="3" <?php if($trade->condition == 3): ?> selected <?php endif; ?>>condition 3</option>
                                    <option value="4" <?php if($trade->condition == 4): ?> selected <?php endif; ?>>condition 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Serial Number</label>
                               <input type="text" value="<?php echo e($trade->serial_number); ?>" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-0">
                                <label>Case Include</label>
                                <select  class="form-control select2" disabled>
                                    <option value="1" <?php if($trade->case_include == 1): ?> selected <?php endif; ?>>case include 1</option>
                                    <option value="2" <?php if($trade->case_include == 2): ?> selected <?php endif; ?>>case include 2</option>
                                    <option value="3" <?php if($trade->case_include == 3): ?> selected <?php endif; ?>>case include 3</option>
                                    <option value="4" <?php if($trade->case_include == 4): ?> selected <?php endif; ?>>case include 4</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Applicable Boxes</label>
                                <input type="text" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text">Describe/list issues, problems and/or damage.</label>
                                <textarea class="form-control " disabled rows="3" name="text"
                                 id="text"><?php echo e($trade->description_problem); ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text">Describe/list modifications.</label>
                                <textarea class="form-control " disabled rows="3" name="text"
                                 id="text"><?php echo e($trade->description_modification); ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text">Additional information.</label>
                                <textarea class="form-control " disabled rows="3" name="text"
                                 id="text"><?php echo e($trade->information); ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="text">Listing Url.</label>
                                <input type="text" readonly value="<?php echo e($trade->url); ?>" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="">Images</label>
                            <div class="row" id="gallery">
                                <?php $__currentLoopData = $trade->images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                                    <div class="col-md-2">
                                        <a href="<?php echo e(asset('storage/' . $item )); ?>" target="_blank" data-group="1" class="image-link test">
                                            <img src="<?php echo e(asset('storage/' . $item )); ?>" class="w-100" alt="">
                                        </a>            
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </form>
               
            </div>
        </div>
    </div>
  
    <?php
        $menu = 'trade'
    ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script>
    $('#gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',

                opener: function(openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find(
                        'img');
                }
            },
        gallery: {
          enabled:true,
        }
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/trade/show.blade.php ENDPATH**/ ?>