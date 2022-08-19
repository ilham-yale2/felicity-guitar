
<?php $__env->startSection('title', 'Browse by Category'); ?>
<?php $__env->startSection('content'); ?>
<style>
    @media (min-width: 1200px){
        .container, .container-lg, .container-md, .container-sm, .container-xl {
            max-width: 95%;
        }
    }

    body{
        background-position: top;
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
                        <?php if(isset($title)): ?>
                        <div class="border-gold-bottom">
                            <h4 class="mb-0"><?php echo e($title); ?></h4>
                        </div>
                        <?php endif; ?>
                        <ul class="list-none mt-4 list-brand">
                            <?php if($brands): ?>    
                                <?php $__currentLoopData = $brands; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                                
                                <li class="text-capitalize">
                                    <a class="filter text-gold" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?>&brd=<?php echo e($item); ?><?php echo e($ctg); ?>"><span class="text-country"><b><?php echo e($item); ?></b></span></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            
                            <?php endif; ?>
                            
                        </ul>
                        <ul class="list-none brand-list mt-4 mb-3">
                            <?php if($condition): ?>
                                <li class="">
                                    <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?><?php echo e($ctg); ?>&condition=new"><span>New</span></a>
                                </li>
                                <li class="mt-0">
                                    <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?><?php echo e($ctg); ?>&condition=Used"><span>Used</span></a>
                                </li>
                            <?php endif; ?>
                            <?php if($subject == 'Guitar'): ?>
                                <?php if($type == 'all' || 'without acoustic'): ?>                        
                                    <li class="mt-4">
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=Guitar<?php echo e($ctg); ?>&type=1"><span>Solidbody</span></a>
                                    </li>
                                    <li>
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=Guitar<?php echo e($ctg); ?>&type=2"><span>Semi-hollowbody</span></a>
                                    </li>
                                    <li>
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=Guitar<?php echo e($ctg); ?>&type=3"><span>Offset</span></a>
                                    </li>
                                    <li>
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=Guitar<?php echo e($ctg); ?>&type=4"><span>Hollowbody</span></a>
                                    </li>
                                <?php endif; ?>
                                <?php if($type == 'all'): ?>
                                    <li>
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=Guitar<?php echo e($ctg); ?>&type=5"><span>Acoustic</span></a>
                                    </li>
                                <?php endif; ?>
                            <?php endif; ?>
                        </ul>
                        <?php if($subject == 'Merch-Apparel'): ?>
                            <ul class="list-none">
                                <li class="type-drop mb-2">
                                    <a href="#" class="d-flex">
                                        <span class="fw-bold">Tank Tops </span>
                                        <span class="ml-auto iconify text-white" data-icon="ant-design:caret-right-filled">
                                    </a>
                                    <ul class="sub-type mt-1 pl-2" style="display: none">
                                        <li>
                                            <a href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?>&type=Tank-Tops&gender=Men's" class="filter">Men's</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?>&type=Tank-Tops&gender=Women's" class="filter">Women's</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="type-drop mb-2">
                                    <a href="#" class="d-flex">
                                        <span class="fw-bold">T-Shirts</span>
                                        <span class="ml-auto iconify text-white" data-icon="ant-design:caret-right-filled">
                                    </a>
                                    <ul class="sub-type mt-1 pl-2" style="display: none">
                                        <li>
                                            <a href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?>&type=T-Shirts&gender=Men's" class="filter">Men's</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?>&type=T-Shirts&gender=Women's" class="filter">Women's</a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="type-drop mb-2">
                                    <a href="#" class="d-flex">
                                        <span class="fw-bold">Long Sleeve Ts</span> 
                                        <span class="ml-auto iconify text-white" data-icon="ant-design:caret-right-filled">
                                    </a>
                                    <ul class="sub-type mt-1 pl-2" style="display: none">
                                        <li>
                                            <a href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?>&type=Long-Slesve-Ts&gender=Men's" class="filter">Men's</a>
                                        </li>
                                        <li>
                                            <a href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?>&type=Long-Slesve-Ts&gender=Women's" class="filter">Women's</a>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        <?php endif; ?>
                        <?php if($types): ?>
                            <ul class="list-none brand-list mt-3" >
                                <?php $__currentLoopData = $types; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="my-0">
                                        <a class="<?php echo e($bold ? 'fw-bold' : ''); ?> <?php echo e(($subject == 'Exotic-Instruments') ? 'text-gold' : ''); ?>" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?>&type=<?php echo e(str_replace('_', '-', $item)); ?>"><?php echo e(str_replace('_',' - ', str_replace('-', ' / ', $item))); ?></a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        <?php endif; ?>
                        <?php if($addition): ?>
                            <ul class="list-none mt-4">
                                
                                <ul class="list-none brand-list mt-3">
                                    <?php $__empty_1 = true; $__currentLoopData = $addition; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                        <li><a href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?>&type=<?php echo e($item); ?>"><?php echo e(str_replace('-', ' & ', $item)); ?></a></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                    
                                    <?php endif; ?>
                                </ul>
                            </ul>
                        <?php endif; ?>

                        <div class="d-flex d-md-block">
                            <ul class="mt-4 list-none brand-list">
                                <li class="<?php echo e(($price || $price_list) ? '' : 'd-none'); ?>">$ Price Range</li>
                                <?php if($price): ?>    
                                    <li class="">
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?><?php echo e($ctg); ?>&from_price=0&to_price=999"><span class="mr-4">-  </span> 999</a>
                                    </li>
                                    <li>
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?>ctg=<?php echo e($ctg); ?>&from_price=1000&to_price=1999"><span>1000 -  </span> 1999</a>
                                    </li>
                                    <li>
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subjet=<?php echo e($subject); ?><?php echo e($ctg); ?>&from_price=2000&to_price=2999"><span>2000 -  </span> 2999</a>
                                    </li>
                                    <li>
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subjet=<?php echo e($subject); ?><?php echo e($ctg); ?>&from_price=3000&to_price=3999"><span>3000 -  </span> 3999</a>
                                    </li>
                                    <li>
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subjet=<?php echo e($subject); ?><?php echo e($ctg); ?>&from_price=4000&to_price=4999"><span>4000 -  </span> 4999</a>
                                    </li>
                                    <li>
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subjet=<?php echo e($subject); ?><?php echo e($ctg); ?>&from_price=5000&to_price=5999"><span>5000 -  </span> 5999</a>
                                    </li>
                                    <li>
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subjet=<?php echo e($subject); ?><?php echo e($ctg); ?>&from_price=6000&to_price=6999"><span>6000 -  </span> 6999</a>
                                    </li>
                                    <?php if($subject != 'Exotic-Instruments'): ?>
                                        <li>
                                            <a class="filter" href="<?php echo e(route('browse-category')); ?>?subjet=<?php echo e($subject); ?><?php echo e($ctg); ?>&from_price=7000&to_price=7999"><span>7000 -  </span> 7999</a>
                                        </li>
                                        <li>
                                            <a class="filter" href="<?php echo e(route('browse-category')); ?>?subjet=<?php echo e($subject); ?><?php echo e($ctg); ?>&from_price=8000&to_price=8999"><span>8000 -  </span> 8999</a>
                                        </li>
                                        <li>
                                            <a class="filter" href="<?php echo e(route('browse-category')); ?>?subjet=<?php echo e($subject); ?><?php echo e($ctg); ?>&from_price=9000&to_price=9999"><span>9000 -  </span> 9999</a>
                                        </li>
                                        <li>
                                            <a class="filter" href="<?php echo e(route('browse-category')); ?>?subjet=<?php echo e($subject); ?><?php echo e($ctg); ?>&up_to=10000"><span>10000 -  </span> </a>
                                        </li>
                                    <?php endif; ?>
                                <?php elseif($price_list): ?>
                                    <li>
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?>ctg=<?php echo e($ctg); ?>&from_price=50&to_price=99"><span>50  &nbsp - &nbsp  </span> 99</a>
                                    </li>
                                    <li>
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?>ctg=<?php echo e($ctg); ?>&from_price=100&to_price=199"><span>100 -  </span> 199</a>
                                    </li>
                                    <li>
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?>ctg=<?php echo e($ctg); ?>&from_price=200&to_price=299"><span>200 -  </span> 299</a>
                                    </li>
                                    <li>
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?>ctg=<?php echo e($ctg); ?>&from_price=300&to_price=399"><span>300 -  </span> 399</a>
                                    </li>
                                    <li>
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?>ctg=<?php echo e($ctg); ?>&from_price=400&to_price=499"><span>400 -  </span> 499</a>
                                    </li>
                                    <li>
                                        <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?>ctg=<?php echo e($ctg); ?>&up_to=5000"><span>500 -  </span></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                            <?php if($year): ?>
                            <ul class="mt-4 list-none brand-list ml-auto ml-md-0">
                                <li> Year</li>
                                <li>
                                    <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?><?php echo e($ctg); ?>&from_year=1950&to_year=1959"><span>1950 - </span>1959</a>
                                </li>
                                <li>
                                    <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?><?php echo e($ctg); ?>&from_year=1960&to_year=1969"><span>1960 - </span>1969</a>
                                </li>
                                <li>
                                    <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?><?php echo e($ctg); ?>&from_year=1970&to_year=1979"><span>1970 - </span>1979</a>
                                </li>
                                <li>
                                    <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?><?php echo e($ctg); ?>&from_year=1980&to_year=1989"><span>1980 - </span>1989</a>
                                </li>
                                <li>
                                    <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?><?php echo e($ctg); ?>&from_year=1990&to_year=1999"><span>1990 - </span>1999</a>
                                </li>
                                <li>
                                    <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?><?php echo e($ctg); ?>&from_year=2000&to_year=2009"><span>2000 - </span>2009</a>
                                </li>
                                <li>
                                    <a class="filter" href="<?php echo e(route('browse-category')); ?>?subject=<?php echo e($subject); ?><?php echo e($ctg); ?>&from_year=2010&to_year=2019"><span>2010 - </span>2019</a>
                                </li>
                                <li class="pb-5">
                                    <a class="filter" href="<?php echo e(route('browse-brand')); ?>?subject=<?php echo e($subject); ?><?php echo e($ctg); ?>&up_year=2020"><span>2020 - </span></a>
                                </li>
                            </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-2 px-0 d-block d-md-none">
                        <button class="btn text-white btn-toggle-filter">
                            <span class="iconify" data-icon="ion:caret-back-circle" data-width="35"></span>
                        </button>
                    </div>
                </div>
                <?php if(count($products) > 0 ): ?>
                <div class="col-md-10 p-0">
                    
                    <div class="row mx-0">
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="<?php echo e($col ?? 'col-card'); ?> col-6 card-product mb-4 text-center px-3 py-0">
                                <a href="<?php echo e(route('detail-product',['name' => $product->slug])); ?>">
                                    <div class="d-flex justify-content-center">
                                        <img src="<?php echo e(asset('storage').'/'.$product->thumbnail); ?>" class="<?php echo e($image ?? 'card-product-img'); ?>" alt="<?php echo e($product->alt_text); ?>">
                                    </div>
                                    <p class="product-name text-gold copperplate mb-0"><?php echo e($product->name_2); ?></p>    
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
                    <?php if($empty_text): ?>
                        <h3 style="font-size: 28px" class="text-gold copperplate"><?php echo e($empty_text); ?></h3>
                    <?php else: ?>
                    <h2 class="text-gold copperplate"><?php echo e($empty_text ?? '~ Stay tuned ~'); ?></h2>
                    <?php endif; ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/category.js')); ?>"></script>
<script>
    function redirect(url){
        window.location.href=url
    }
    $('.btn-toggle-filter').on('click', function(){
        $('.nav-filter').toggleClass('show')
    })

    $('.type-drop').click(function(){
        $(this).find('.sub-type').slideToggle()
    })

    $('a.page-link').each(function(index){
        $(this).data('url', $(this).attr('href'))
    })
    // setBrand('<?php echo e($ctg); ?>')
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', ['background' => 'background-multi-item.jpg'], ['subject' => $subject], \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/browse-category.blade.php ENDPATH**/ ?>