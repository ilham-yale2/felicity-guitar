<?php $__env->startSection('title', 'Cart'); ?>
<?php $__env->startSection('content'); ?>
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
                <div class="cart_item">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="cart_action"><a class="delete" href="#"><img src="images/ic-trash.svg"
                                        alt="ic-delete" /></a>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="cart_item_1" type="checkbox"
                                        name="cart_item_1" />
                                    <label class="custom-control-label" for="cart_item_1"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="cart_product">
                                <div class="cart_product-img"><img src="images/cart-product-img-1.jpg"
                                        alt="cart-prodcut-img" />
                                </div>
                                <div class="cart_product-name">
                                    <h4><a href="#">2004 RICKENBACKER 360/12 SEMI-HOLLOWBODY IN MONTEZUMA BROWN FINISH</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"><span>1</span></div>
                        <div class="col-md-2"><span class="price">Rp 90.000.000</span></div>
                    </div>
                </div>
                <div class="cart_item">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="cart_action"><a class="delete" href="#"><img src="images/ic-trash.svg"
                                        alt="ic-delete" /></a>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="cart_item_2" type="checkbox"
                                        name="cart_item_2" />
                                    <label class="custom-control-label" for="cart_item_2"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="cart_product">
                                <div class="cart_product-img"><img src="images/cart-product-img-2.jpg"
                                        alt="cart-prodcut-img" />
                                </div>
                                <div class="cart_product-name">
                                    <h4><a
                                            href="#">2014-Ibanez-Japan-PM200-NT-Pat-Metheny-Sig-Natural-Sitka-Spruce-SN-F1406915</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"><span>1</span></div>
                        <div class="col-md-2"><span class="price">Rp 90.000.000</span></div>
                    </div>
                </div>
                <div class="cart_item">
                    <div class="row">
                        <div class="col-md-1">
                            <div class="cart_action"><a class="delete" href="#"><img src="images/ic-trash.svg"
                                        alt="ic-delete" /></a>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="cart_item_3" type="checkbox"
                                        name="cart_item_3" />
                                    <label class="custom-control-label" for="cart_item_3"></label>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="cart_product">
                                <div class="cart_product-img"><img src="images/cart-product-img-3.jpg"
                                        alt="cart-prodcut-img" />
                                </div>
                                <div class="cart_product-name">
                                    <h4><a
                                            href="#">2015-Gretsch-G5191BK-Tim-Armstrong-Sig-Archtop-Flat-Black-SN-K516063251</a>
                                    </h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2"><span>1</span></div>
                        <div class="col-md-2"><span class="price">Rp 90.000.000</span></div>
                    </div>
                </div>
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
                                    <div class="total_qty"><span>3</span></div>
                                </div>
                                <div class="col-md-4">
                                    <div class="total_nominal"><span>Rp 180.000.000</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="total_action"><a class="btn btn-primary btn-block" href="checkout-account.html">Order
                                Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\rumah-ebes\resources\views/cart.blade.php ENDPATH**/ ?>