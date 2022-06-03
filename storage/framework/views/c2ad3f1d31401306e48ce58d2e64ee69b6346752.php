
<?php $__env->startSection('title', 'Browse by Brand'); ?>
<?php $__env->startSection('content'); ?>
    <div class="aboutus">
        <style>
            .child li:hover, .text-orange{
                color: #CC6500 
            }
        </style>
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-2 pr-0">
                    <div class="d-flex border-bottom pb-2 align-items-bottom">
                        <div>
                            <img id="brandImg"  src="<?php echo e(asset('storage').'/'.$brand['image']); ?>" alt="">
                        </div>
                    </div>
                    <ul class="list-none mt-4 brand-list">
                        <li>
                            <div class="d-flex align-items-center parent">
                                <span class="main">Brands</span>
                                <span class="iconify arr ml-auto" data-icon="bi:caret-down-fill"></span>
                            </div>
                            <ul class="child pl-2">
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="text-capitalize list-<?php echo e($loop->iteration); ?>" onclick="changeBrand('<?php echo e($loop->iteration); ?>','<?php echo e($item->name); ?>','<?php echo e($item->image); ?>')"><?php echo e($item->name); ?></li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </li>
                    </ul>
                    <ul class="list-none mt-4 brand-list" id="country">

                        
                        
                    </ul>
                    <ul class="list-none brand-list mt-4">
                        <li class="">
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&condition=new"><span>New</span></a>
                        </li>
                        <li class="mt-0">
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&condition=used"><span>Used</span></a>
                        </li>
                        <li class="mt-4">
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&type=solidbody"><span>Solidbody</span></a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&type=semi-hollowbody"><span>Semi-hollowbody</span></a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&type=offset"><span>Offset</span></a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&type=hollowbody"><span>Hollowbody</span></a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&type=accoustic"><span>Accoustic</span></a>
                        </li>
                    </ul>
                    <ul class="mt-4 list-none brand-list">
                        <li>$ Price Range</li>
                        <li class="">
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_price=0&to_price=999"><span class="mr-4">-  </span> 999</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_price=1000&to_price=1999"><span>1000 -  </span> 1999</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_price=2000&to_price=2999"><span>2000 -  </span> 2999</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_price=3000&to_price=3999"><span>3000 -  </span> 3999</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_price=4000&to_price=4999"><span>4000 -  </span> 4999</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_price=5000&to_price=5999"><span>5000 -  </span> 5999</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_price=6000&to_price=6999"><span>6000 -  </span> 6999</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_price=7000&to_price=7999"><span>7000 -  </span> 7999</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_price=8000&to_price=8999"><span>8000 -  </span> 8999</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_price=9000&to_price=9999"><span>9000 -  </span> 9999</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&up_to=10000"><span>10000 -  </span> </a>
                        </li>
                    </ul>
                    <ul class="mt-4 list-none brand-list">
                        <li> Year</li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_year=1950&to_year=1959"><span>1950 - </span>1959</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_year=1960&to_year=1969"><span>1960 - </span>1969</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_year=1970&to_year=1979"><span>1970 - </span>1979</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_year=1980&to_year=1989"><span>1980 - </span>1989</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_year=1990&to_year=1999"><span>1990 - </span>1999</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_year=2000&to_year=2009"><span>2000 - </span>2009</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&from_year=2010&to_year=2019"><span>2010 - </span>2019</a>
                        </li>
                        <li>
                            <a class="filter" href="<?php echo e(route('browse-brand')); ?>?brd=<?php echo e($brand['name']); ?>&up_year=2020"><span>2020 - </span></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-10 p-0">
                    <div class="row mx-0">
                        <?php if(count($products) > 0): ?>
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
                                        <p class="mb-1 w-100"><?php echo strip_tags(\Illuminate\Support\Str::limit($product->text, 250,'...')); ?>

                                        </p>
                                        <a class="w-100 mt-auto" href="<?php echo e(route('detail-product',['name' => $product->slug])); ?>"><button class="btn border border-white btn-read w-100">Read
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
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('js/brand.js')); ?>"></script>
    <script>
        var brand = '<?php echo e($brand["name"]); ?>'
        setCountry(`<?php echo e($brand['name']); ?>`)
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/browse-brand.blade.php ENDPATH**/ ?>