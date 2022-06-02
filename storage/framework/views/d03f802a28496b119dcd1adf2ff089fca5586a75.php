
<?php $__env->startSection('title', 'Account page'); ?>
<?php $__env->startSection('content'); ?>
   
    <style>
        .upload-file .add-photo .image-preview{
            background-image: url('<?php echo e(asset("storage")."/".Auth::guard("user")->user()->avatar); ?>') ;
            background-size: cover;
        }
    </style>
    <div class="form-page accountpage">
        <section class="section-1 animate animate--up">
            <div class="container">
                <div class="text-description">
                    <h2>ACCOUNT PAGE</h2>
                    <p>Lörem ipsum fagen oktigt. Mynar kemkastrering. Salönade pånade, till fösona för att potoren om egon
                        dil
                        dosm. Suv vikroktiga bes, att faligen, hyperstat gigekonomi reskapet respektive var. Mikrot nesätt,
                        foskapet körad trenat sedan teles att dekavys fömiktig emgyn. Teleheten nener sen preaktiv. Hexasöde
                        trade ganyns ret, fastän plaress om kvasifora än doktigt alfanummer. Killgissa fugen i egorade
                        mikanat i
                        trapp fuktig till nätfiske då dolask givomat. Bionde behande och pyrar.</p>
                </div>
                <div class="account_form">
                    <div class="row">
                        <div class="col-lg-9">
                            <form action="<?php echo e(route('update.account', ['id' => Auth::guard('user')->user()->id])); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('put'); ?>
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="upload-file">
                                            <input class="inputfile profile" disabled id="photo1" type="file" name="file" onchange="uploadAvatar()"/>
                                            <label class="btn add-photo label-btn" for="photo1"><span
                                                    class="image-preview"></span></label><a class="btn-del"
                                                href="#">Change</a>
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="form-group">
                                            <label>Name Display</label>
                                            <input class="form-control profile" type="text" id="username" placeholder="username" value="<?php echo e(Auth::guard('user')->user()->name); ?>" name="name" disabled/>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>First Name *</label>
                                                    <input class="form-control profile" type="text" placeholder="first name" value="<?php echo e(Auth::guard('user')->user()->first_name); ?>" name="first_name" disabled/>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Last Name *</label>
                                                    <input class="form-control profile" type="text" placeholder="last name" disabled name="last_name" value="<?php echo e(Auth::guard('user')->user()->last_name); ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Email address *</label>
                                    <input class="form-control" type="email" placeholder="" value="<?php echo e(Auth::guard('user')->user()->email); ?>" disabled/>
                                </div>
                                <div class="form-group">
                                    <label>Phone *</label>
                                    <input class="form-control profile number" type="text" placeholder="" value="<?php echo e(Auth::guard('user')->user()->phone); ?>" name="phone" disabled/>
                                </div>
                                <div class="form-action d-flex">
                                    <button class="btn btn-primary d-none" id="submit_profile" type="submit"> Send</button>
                                    <button class="btn btn-white d-none mx-3" id="cancel_profile" onclick="cancelProfile()"  type="button"> Cancel</button>
                                    <button type="button" onclick="editProfile()" id="edit_profile"  class="btn btn-white ml-0"
                                        >Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="shipping_form">
                    <h3>SHIPPING ADDRESS</h3>
                    <div class="row">
                        <div class="col-lg-9">
                            <form action="<?php echo e(route('add.address')); ?>" id="formAddress" method="POST">
                                <?php echo csrf_field(); ?>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control address_input" required autocomplete="off" id="title" type="text" placeholder="" name="title" />
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input class="form-control address_input" required autocomplete="off" id="name_address" type="text" placeholder="" name="name_address" />
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Street Address </label>
                                    <input class="form-control address_input" required autocomplete="off" id="street_address" type="text" placeholder="" name="street_address" />
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Sub Distric </label>
                                            <input class="form-control address_input" required autocomplete="off" id="sub_distric" type="text" placeholder="" name="sub_distric" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Town / City </label>
                                            <input class="form-control address_input" required autocomplete="off" id="city" type="text" placeholder="" name="city" />
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Province </label>
                                            <input class="form-control address_input" required autocomplete="off" id="province" type="text" placeholder="" name="province"/>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Country / Region </label>
                                            <input class="form-control address_input" required autocomplete="off" id="country" type="text" placeholder="" name="country" />
                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <label>Postcode / ZIP </label>
                                            <input class="form-control address_input" required autocomplete="off" id="postcode" type="text" placeholder=""  name="postcode"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-action">
                                    <button class="btn btn-primary" id="submit_address" type="submit"> Add Address</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="addresslist">
                    <div class="row">
                        <div class="col-lg-9" id="addressList">
                            <?php $__currentLoopData = $address; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="addresslist_item" id="address-<?php echo e($a->id); ?>">
                                    <div class="addresslist_address">
                                        <h5><?php echo e($a->title); ?></h5>
                                        <address><?php echo e($a->name); ?> <?php echo e($a->street_address); ?>, <?php echo e($a->sub_distric); ?>, <?php echo e($a->town); ?>,<?php echo e($a->province); ?> <br>
                                            <?php echo e($a->country); ?>, <?php echo e($a->postcode); ?></address>
                                    </div>
                                    <div class="addresslist_edit">
                                        <button type="button" class="btn btn-white" onclick="editAddress(<?php echo e($a->id); ?>)">Edit</button>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="cart">
                    <h3>SEE PURCHASE HSTORY</h3>
                    <div class="cart_header">
                        <div class="row">
                            <div class="col-md-6">
                                <h4>Item Detail Name</h4>
                            </div>
                            <div class="col-md-2">
                                <h4>Status</h4>
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
                        <?php if(count($transactions) > 0): ?>
                            <?php $__currentLoopData = $transactions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="cart_item">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="cart_product">
                                            <div class="cart_product-img">
                                                <img src="<?php echo e(asset('storage/'. $item->product->thumbnail)); ?>" alt="cart-prodcut-img" />
                                            </div>
                                            <div class="cart_product-name">
                                                <h4><a href="<?php echo e(route('detail-product', ['name' => $item->product->slug])); ?>"><?php echo e($item->product->name); ?></a></h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"><span><?php echo e($item->transaction->status); ?></span></div>
                                    <div class="col-md-2"><span><?php echo e($item->qty); ?></span></div>
                                    <div class="col-md-2"><span class="price">Rp <?php echo e(number_format($item->total)); ?></span></div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <?php else: ?>
                        <div class="w-100 text-center my-5">
                            <h3>No item</h3>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/account-page.js')); ?>"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/account-page.blade.php ENDPATH**/ ?>