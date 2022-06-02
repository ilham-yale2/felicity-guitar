
<?php $__env->startSection('title', 'Cart'); ?>
<?php $__env->startSection('content'); ?>
<input type="hidden" id="dirty" value="0">
<form action="<?php echo e(route('checkout')); ?>" method="POST">
    <?php echo csrf_field(); ?>
    <div class="cart animate animate--up">
        <div class="container">
            <div class="cart_header">
                <div class="row">
                    <div class="col-md-1"></div>
                    <div class="col-md-7">
                        <h4>Item Detail Name</h4>
                    </div>
                    <div class="col-md-2">
                        <h4>Quantity</h4>
                    </div>
                    <div class="col-md-2">
                        <h4>Price</h4>
                    </div>
                </div>
            </div>
            <div class="cart_wrap">
                
                
                <?php if(Auth::guard('user')->user()): ?>
                    
                    <?php if(count($products) > 0): ?>
                        <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="cart_item" id="product-<?php echo e($loop->iteration); ?>">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="cart_action d-flex align-items-center">
                                            <button type="button" class=" btn p-0 text-white bg-transparent" onclick="deleteItem(`<?php echo e(\Crypt::encryptString($item->id)); ?>`, `<?php echo e($loop->iteration); ?>`)">
                                                <span class="iconify" data-icon="bi:trash" data-width="18"></span>
                                            </button>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="cart_item_<?php echo e($loop->iteration); ?>" type="checkbox"
                                                    name="product[]" onchange="getTotal(`<?php echo e($loop->iteration); ?>`)" value="<?php echo e(\Crypt::encryptString($item->id)); ?>" />
                                                <label class="custom-control-label" for="cart_item_<?php echo e($loop->iteration); ?>"></label>
                                                <input type="hidden" value="<?php echo e($item->qty); ?>" id="qq-<?php echo e($loop->iteration); ?>">
                                                <input type="hidden" value="<?php echo e($item->product->sell_price); ?>" id="pp-<?php echo e($loop->iteration); ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="cart_product">
                                            <div class="cart_product-img"><img src="<?php echo e(asset('storage').'/'.$item->product->thumbnail); ?>"
                                                    alt="cart-prodcut-img" />
                                            </div>
                                            <div class="cart_product-name">
                                                <h4><a href="<?php echo e(route('detail-product', ['name' => $item->product->slug])); ?>"><?php echo e($item->product->name); ?></a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"><span><?php echo e($item->qty); ?></span></div>
                                    <div class="col-md-2"><span class="price">Rp <?php echo e(number_format($item->price)); ?></span></div>
                                </div>
                            </div>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php else: ?>
                        <div class="cart_item">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <h2>Your cart is empty</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php else: ?>
                
                <div class="cart_item">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <h2>You must Login first</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="cart_total">
                <div class="row">
                    <div class="col-md-6">
                        <div class="agreement">
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="agree" type="checkbox" name="agree" />
                                <label class="custom-control-label" for="agree">I agree with the sales <a href="#">terms and
                                        conditions</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="grand_total">
                            <div class="row">
                                <div class="col-md-4">
                                    <h4>Total</h4>
                                </div>
                                <div class="col-md-4">
                                    <div class="total_qty"><span>0</span></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="total_nominal"><span>Rp 0</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="total_action"><button type="submit" class="btn btn-primary btn-block" disabled="true">Order
                                Now</button></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/cart.js')); ?>"></script>
<script>
    var total = 0;
    var qty = 0;
    if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_BACK_FORWARD) {
        window.location.reload()
    }
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/cart.blade.php ENDPATH**/ ?>