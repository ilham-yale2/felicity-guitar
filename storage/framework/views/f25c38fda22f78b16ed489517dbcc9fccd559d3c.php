
<?php $__env->startSection('title', 'Browse by Category'); ?>
<?php $__env->startSection('content'); ?>
<style>
    @media (min-width: 1200px){
        .container, .container-lg, .container-md, .container-sm, .container-xl {
            max-width: 1290px;
        }
    }
    body {
        background: url("<?php echo e(asset('images/background-multi-item.jpg')); ?>");
    }

    body:before {
        background: unset;
    }
</style>
    <div class="aboutus">
        <div class="container">
            <div class="row mt-4">
                <div class="col-12 mb-5 d-block d-md-none">
                    <button class="btn d-flex align-items-center text-white bg-orange btn-toggle-filter rounded">
                        <h3 class="mb-0 mr-3">Show filter</h3>
                        <span class="iconify" data-icon="ion:caret-forward-circle-sharp" data-width="30"></span>
                    </button>
                </div>
                <div class="col-md-2 d-flex nav-filter">
                    <div class="col-10 px-0 mt-5 mt-md-0">
                        <h4 class="border-bottom pb-2 text-gold"><b>Category</b></h4>
                        <ul class="list-none mt-4 category-list">
                            <li><a class="text-gold" href="<?php echo e(route('browse-category')); ?>">All Guitars</a></li>
                            <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                
                            <li><a class="text-gold" href="<?php echo e(route('browse-category').'?ctg='. $item->name); ?>"><?php echo e($item->name); ?></a></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                        </ul>
                    </div>
                    <div class="col-2 px-0 d-block d-md-none">
                        <button class="btn text-white btn-toggle-filter">
                            <span class="iconify" data-icon="ion:caret-back-circle" data-width="35"></span>
                        </button>
                    </div>
                </div>
                <?php if(count($products) > 0): ?>
                <div class="col-md-10 p-0">
                    <a href="<?php echo e(route('index')); ?>" class="btn btn-outline position-fixed button-home">Home</a>
                    <div class="row mx-0">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="<?php echo e($col ?? 'col-card'); ?> col-6 card-product mb-4 text-center px-3 py-0">
                                <a href="<?php echo e(route('detail-product',['name' => $product->slug])); ?>">
                                    <div class="d-flex justify-content-center">
                                        <img src="<?php echo e(asset('storage').'/'.$product->thumbnail); ?>" class="card-product-img" alt="">
                                    </div>
                                    <p class="product-name text-gold copperplate mb-0"><?php echo e($product->name); ?></p>    
                                    <p>
                                        More Info..
                                    </p>
                                </a>
                                
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <div class="w-100 d-flex">
                            <div class="ml-auto paginate-product">
                                <?php echo e($products->links()); ?>

                            </div>
                        </div>
                    </div>
                </div>
                <?php else: ?>
                <div class="text-center col-md-8 col-12 pt-5 mt-5">
                    <h1 class="text-orange copperplate mb-0">Coming soon!</h1>
                    <h2 class="text-gold copperplate">~ Stay tuned ~</h2>
                    <h5 class="text-gold copperplate">(pun intended)</h5>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script>
        function redirect(url){
            window.location.href=url
        }
        $('.btn-toggle-filter').on('click', function(){
            $('.nav-filter').toggleClass('show')
        })
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/browse-category.blade.php ENDPATH**/ ?>