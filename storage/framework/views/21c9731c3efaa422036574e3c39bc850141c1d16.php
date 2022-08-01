
<?php $__env->startSection('title', 'Private vault'); ?>
<?php $__env->startSection('css'); ?>
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="privatevault">
        <section class="privatevault_description animate animate--up">
            <div class="container">
                <div id="carouselExampleSlidesOnly" class="carousel slide privatevault_description-wrap" data-ride="carousel" data-interval="4000">
                    <div class="carousel-inner">
                        <?php if(count($products)>0): ?>
                            <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($loop->iteration < 4): ?>
                                    <div class="carousel-item <?php echo e($loop->iteration == 1 ? 'active' : ''); ?>">
                                        <div class="row w-100">
                                            <div class="col-md-6">
                                                <h2>PRIVATE VAULT</h2>
                                                <article class="text-private-vault">
                                                    <h3><?php echo e($item->name); ?></h3>
                                                    <?php echo $item->text; ?>

                                                </article>
                                            </div>
                                            <div class="col-md-5 ml-auto">
                                                <div class="privatevault_img">
                                                    <img src="<?php echo e(asset('storage/'.$item->thumbnail_2)); ?>" alt="img" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                            <div class="w-100 text-center"><h1>No Product</h1></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
        <section class="privatevault_guitar animate animate--up">
            <div class="container">
                <div class="row">
                    <?php if(count($products) > 0): ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="col-lg-3 col-md-6">
                            <div class="privatevault_guitar-card">
                                <div class="imgbox">
                                    <a href="<?php echo e(route('detail-vault', ['name' => $item->slug] )); ?>"> 
                                        <img src="<?php echo e(asset('storage/'.$item->thumbnail)); ?>" alt="img-guitar" />
                                    </a>
                                </div>
                                <div class="textbox">
                                    <h3> 
                                        <a class="d-inline-block text-truncate" style="max-width: 220px"href="<?php echo e(route('detail-vault', ['name' => $item->slug] )); ?>">
                                            <?php echo e($item->name); ?> 
                                            
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endif; ?>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('js'); ?>
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    $('.slider-vault').slick({
        dots: false,
        prevArrow: false,
        nextArrow: false,
        slideToShow: 1
    })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/private-vault.blade.php ENDPATH**/ ?>