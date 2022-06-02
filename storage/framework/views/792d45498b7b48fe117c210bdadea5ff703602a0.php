
<?php $__env->startSection('title', 'Checkout'); ?>
<?php $__env->startSection('content'); ?>
<div class="checkout">
    <section class="checkout_account animate animate--up">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <form action="<?php echo e(route('make.order')); ?>" method="POST">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PATCH'); ?>
                <h3>PERSONAL DETAILS</h3>
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-6">
                        <label> First Name *</label>
                        <input class="form-control" required type="text" name="first_name" placeholder="First Name" value="<?php echo e(Auth::guard('user')->user()->first_name ?? ''); ?>"/>
                    </div>
                    <div class="col-md-6">
                        <label> Last Name *</label>
                        <input class="form-control" required type="text" name="last_name" placeholder="Last Name" value="<?php echo e(Auth::guard('user')->user()->last_name ?? ''); ?>"/>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Street Address *</label>
                    <input class="form-control" required type="text" placeholder="" name="street_address"/>
                </div>
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-4">
                        <label> Sub Distric *</label>
                        <input class="form-control" required type="text" placeholder="" name="sub_distric"/>
                    </div>
                    <div class="col-md-4">
                        <label> Town / City *</label>
                        <input class="form-control" required type="text" placeholder="" name="city"/>
                    </div>
                    <div class="col-md-4">
                        <label> Province * </label>
                        <input class="form-control" required type="text" placeholder="" name="province"/>
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-4">
                        <label> Country / Region * </label>
                        <input class="form-control" required type="text" name="country" placeholder="" />
                    </div>
                    <div class="col-md-8">
                        <label> Postcode / ZIP *</label>
                        <input class="form-control" required type="text" name="postcode" placeholder="" />
                    </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>Email address *</label>
                    <input class="form-control" required type="email" name="email" placeholder="" value="<?php echo e(Auth::guard('user')->user()->email ?? ''); ?>" />
                </div>
                <div class="form-group">
                    <label>Phone *</label>
                    <input class="form-control number" required type="text" name="phone"  placeholder="" value="<?php echo e(Auth::guard('user')->user()->phone ?? ''); ?> "/>
                </div>
                <h3 class="mt-4">SHIPPING ADDRESS</h3>
                <div class="row mx-0 align-items-center">
                    <div class="custom-control custom-checkbox d-flex align-ite">
                        <input class="custom-control-input" name="different" id="different" type="checkbox" onchange="showForm()" value="1"/>
                        <label class="custom-control-label" for="different">Different Address</label>
                    </div>
                    <?php if(Auth::guard('user')->user()): ?>
                    <div class="form-group ml-4 col-md-4">
                        <select class="form-control d-none"  id="addressSelect">
                            <option hidden selected>Select Your Address</option>
                            <?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($item->id); ?>"><?php echo e($item->title); ?></option>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php if(!$address || count($address) <= 0): ?>
                                <option  > You not have a Address</option>
                            <?php endif; ?>
                        </select>
                    </div>
                    <?php endif; ?>
                </div>
                <div class="d-none" id="form-address">
                    <div class="form-group">
                        <label>Street Address *</label>
                        <input class="form-control input-address" type="text" placeholder="" name="shipping_address"/>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label> Sub distric *</label>
                                <input class="form-control input-address" type="text" placeholder="" name="shipping_sub_distric"/>
                            </div>
                            <div class="col-md-4">
                                <label> Town / City *</label>
                                <input class="form-control input-address" type="text" placeholder="" name="shipping_city"/>
                            </div>
                            <div class="col-md-4">
                                <label> Province * </label>
                                <input class="form-control input-address" type="text" placeholder="" name="shipping_province"/>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-4">
                                <label> Country / Region * </label>
                                <input class="form-control input-address" type="text" placeholder="" name="shipping_country"/>
                            </div>
                            <div class="col-md-8">
                                <label> Postcode / ZIP *</label>
                                <input class="form-control input-address" type="text" placeholder="" name="shipping_postcode"/>
                            </div>
                        </div>
                    </div>
                </div>
                <h3 class="mt-4">Product</h3>
                <div class="w-100">
                    <div class="cart_header">
                        <div class="row">
                            <div class="col-md-7">
                                <h4>Item Detail Name</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Quantity</h4>
                            </div>
                            <div class="col-md-3">
                                <h4>Price</h4>
                            </div>
                        </div>
                    </div>
                    <div class="cart_wrap">
                        <?php
                            $total = 0;
                            $qty = 0;
                        ?>
                        
                        <?php $__currentLoopData = $carts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>                            
                            <div class="cart_item" id="product-<?php echo e($loop->iteration); ?>">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="cart_product">
                                            <div class="cart_product-img p-0">
                                                <img class="position-relative" src="<?php echo e(asset('storage')); ?>/<?php echo e($item->product->thumbnail ?? $item->thumbnail); ?>" alt="cart-prodcut-img" />
                                            </div>
                                            <div class="cart_product-name">
                                                <h4><a href="<?php echo e(route('detail-product', ['name' => $item->product->code ?? $item->code ])); ?>"><?php echo e($item->product->name ?? $item->name); ?></a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"><span><?php echo e($item->qty ?? '1'); ?></span></div>
                                    <div class="col-md-3"><span class="price">Rp <?php echo e(number_format($item->product->sell_price ?? $item->sell_price)); ?></span></div>
                                </div>
                            </div>
                            <?php if($item->qty != null): ?>
                                    <input type="hidden" name="product_id[]" value="<?php echo e(\Crypt::encryptString($item->id)); ?>">

                                    <?php
                                        $qty = $qty + $item->qty;
                                        $total = $total + $item->product->sell_price;
                                    ?>
                            <?php else: ?>
                                    <input type="hidden" name="product" value="<?php echo e(\Crypt::encryptString($item->id)); ?>">

                                    <?php
                                        
                                        $qty = $qty + 1;
                                        $total = $total + $item->sell_price;
                                    ?>
                            <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                    <div class="cart_total">
                        <div class="row">
                            <div class="col-md-6">
                                
                            </div>
                            <div class="col-md-6">
                                <div class="grand_total">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <h4>Total</h4>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="total_qty"><span><?php echo e(number_format($qty)); ?></span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="total_nominal"><span>Rp <?php echo e(number_format($total)); ?></span></div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-action">
                    <div class="terms"><a href="#">Read Terms and Conditions</a></div>
                    <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="recive_email" type="checkbox" value="1" name="recive_email" />
                        <label class="custom-control-label" for="recive_email">Receive email notification</label>
                    </div>
                    
                    <button class="btn btn-primary" type="submit"> Send Order</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
    <script src="<?php echo e(asset('js/checkout.js')); ?>"></script>
    <script>
       if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_BACK_FORWARD) {
            window.location.reload()
        }
        
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/checkout.blade.php ENDPATH**/ ?>