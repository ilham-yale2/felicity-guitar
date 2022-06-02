
<?php $__env->startSection('title', 'Browse by Brand'); ?>
<?php $__env->startSection('content'); ?>
    <div class="aboutus">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12 p-0">
                    <div class="row mx-0">
                        <?php if(count($products) > 0): ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="col-md-6 card-product">
                                    <h3><?php echo e($item->name); ?></h3>
                                    <div class="d-flex">
                                        <div class="img-product col-5 p-0">
                                            <div class="p-2 bg-white">
                                                <img src="<?php echo e(asset('storage').'/'.$item->thumbnail); ?>"
                                                    alt="" class="img-product">
                                            </div>
                                            <div class="bg-orange text-center text-white py-1">
                                                IDR <?php echo e(number_format($item->sell_price)); ?>

                                            </div>
                                        </div>
                                        <div class="col-6 pr-0">
                                            <p class="mb-1"><?php echo \Illuminate\Support\Str::limit($item->text, 180,'...'); ?>

                                            </p>
                                            <a href="<?php echo e(route('detail-product',['name' => $item->slug])); ?>"><button class="btn border border-white btn-read w-100">Read
                                                    More</button></a>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="text-center w-100 pt-5">
                                <h2 style="text-transform: none">No Product</h2>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/search.blade.php ENDPATH**/ ?>