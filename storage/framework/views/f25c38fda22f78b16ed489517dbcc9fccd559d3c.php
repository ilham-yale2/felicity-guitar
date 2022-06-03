
<?php $__env->startSection('title', 'Browse by Category'); ?>
<?php $__env->startSection('content'); ?>
    <div class="aboutus">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-2 ">
                    <h4 class="border-bottom pb-2"><b>Category</b></h4>
                    <ul class="list-none mt-4 category-list">
                        <li><a href="<?php echo e(route('browse-category')); ?>">All Guitars</a></li>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            
                        <li><a href="<?php echo e(route('browse-category').'?ctg='. $item->name); ?>"><?php echo e($item->name); ?></a></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        
                    </ul>
                </div>
                <div class="col-md-10 p-0">
                    <div class="row">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-md-6 card-product mb-4" onclick="redirect('<?php echo e(route('detail-product',['name' => $product->slug])); ?>')">
                            <h3><?php echo e($product->name); ?></h3>
                            <div class="d-flex flex-wrap border-bottom border-white pb-3">
                                <div class="img-product col-5 p-0">
                                    <div class="p-2 bg-white">
                                        <img src="<?php echo e(asset('storage').'/'.$product->thumbnail); ?>"
                                            alt="" class="img-product">
                                    </div>
                                    <div class="bg-orange text-center text-white py-1">
                                        IDR <?php echo e(number_format($product->sell_price)); ?> 
                                    </div>
                                </div>
                                <div class="col-6 pr-0 d-flex flex-wrap" style="min-height: 250px">
                                    <p class="mb-1 w-100"><?php echo e(\Illuminate\Support\Str::limit(strip_tags($product->text), 250,'...')); ?>

                                    </p>
                                    <a class="w-100 mt-auto" href="<?php echo e(route('detail-product',['name' => $product->slug])); ?>"><button class="btn border border-white btn-read w-100">Read
                                            More</button></a>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        function redirect(url){
            window.location.href=url
        }
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/browse-category.blade.php ENDPATH**/ ?>