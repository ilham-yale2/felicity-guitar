
<?php $__env->startSection('title', 'Detail Product'); ?>
<?php $__env->startSection('css'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/blueimp-gallery.min.css')); ?>">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
<style>
    .mfp-arrow-left { background:url('<?php echo e(asset("plugins/magnific-popup/src/img/prev.png")); ?>') no-Repeat top left !important; width:40px; height:40px; } 
    .mfp-arrow-right { background:url('<?php echo e(asset("plugins/magnific-popup/src/img/next.png")); ?>') no-Repeat top left !important; width:40px; height:40px; }
     .mfp-arrow-left::after,.mfp-arrow-left::before, .mfp-arrow-right::before,.mfp-arrow-right::after { display: none; }
</style>
 <section id="section-detail" class="mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="details text-white">
                                <h1 class="title">
                                    <?php echo e($product->name); ?>

                                </h1>
                                <div class="short-desc">  
                                    <?php echo $product->text; ?>

                                </div>
                                <a href="#wrap-detail" class="btn btn-outline" id="read-more-detail">Read More</a>
                            </div>

                        </div>
                        <div class="col-md-5 offset-md-1">
                            <img src="<?php echo e(asset('storage').'/'.$product->thumbnail); ?>" class="w-100 img-details" alt="">
                            <p class="price mt-3 mb-2">IDR <?php echo e(number_format($product->price)); ?></p>
                            <span>Price inclusive of VAT ● Shipping costs will be calculated at check out</span>
                           <?php if($product->status != 'sold'): ?>
                           <div class="row mt-3">
                            <div class="col-md-6">
                                <form action="<?php echo e(route('buynow')); ?>" method="POST">
                                    <?php echo csrf_field(); ?>
                                    <input type="hidden" name="product[]" value="<?php echo e(\Crypt::encryptString($product->id)); ?>">
                                </form>
                                <a href="<?php echo e($product->wa_link); ?>"  class="btn cta-product w-100">Buy Now</a>
                            </div>
                            <?php if(Auth::guard('user')->user()): ?>
                                <div class="col-md-6">
                                    <button type="button" class="btn cta-product w-100" onclick="addToCart(`<?php echo e(\Crypt::encryptString($product->code)); ?>`)">Add to Cart </button>
                                </div>
                            <?php endif; ?>
                        </div>
                           <?php endif; ?>
                        </div>
                    </div>
                </div>
            </section>
            <div id="wrap-detail" class="pt-5">
                <section id="section-detail-more">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="detail-more-title">description</p>
                                <div class="desc-more text-white">
                                    <?php echo $detail->description ?? '-'; ?>


                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="section-spec" class="mt-5 mb-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="detail-more-title">Specifications</p>
                                <table class="w-100 table-spec">
                                    <thead>
                                        <tr>
                                            <td colspan="2">general</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Condition</td>
                                            <td><?php echo e($detail->condition ?? '-'); ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Number of Strings</td>
                                            <td><?php echo e($detail->number_of_strings ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Orientation</td>
                                            <td><?php echo e($detail->orientation ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Country of Origin</td>
                                            <td><?php echo e($detail->made_in ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Year</td>
                                            <td><?php echo e($detail->year ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Weight</td>
                                            <td><?php echo e($detail->weight_product ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Limited Edition / Series</td>
                                            <td><?php echo e($detail->limited_series ?? '-' ? 'Limited Edition' : 'Series'); ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><?php echo e($detail->limited_series_text ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Weight</td>
                                            <td><?php echo e($detail->weight_product ?? '-'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="w-100 table-spec mt-3">
                                    <thead>
                                        <tr>
                                            <td colspan="2">body</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Body Type</td>
                                            <td><?php echo e($detail->type ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Body Shape</td>
                                            <td>
                                                <?php echo e($detail->shape ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Body Material</td>
                                            <td><?php echo e($detail->material ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Body Carve</td>
                                            <td><?php echo e($detail->carve ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Body Binding</td>
                                            <td><?php echo e($detail->binding ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Weight Relief</td>
                                            <td><?php echo e($detail->weight_relief ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Build Materials Used</td>
                                            <td><?php echo e($detail->build_material ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Body Finish Type</td>
                                            <td><?php echo e($detail->body_finish_type ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Color</td>
                                            <td><?php echo e($detail->color ?? '-'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="w-100 table-spec mt-3">
                                    <thead>
                                        <tr>
                                            <td colspan="2">neck</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Neck Material</td>
                                            <td><?php echo e($detail->neck_material ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Truss Rod</td>
                                            <td><?php echo e($detail->truss_rod ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Truss Rod Cover</td>
                                            <td><?php echo e($detail->truss_rod_cover ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Peghead Particulars</td>
                                            <td><?php echo e($detail->peghead_particular ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Neck Profile</td>
                                            <td><?php echo e($detail->neck_profile ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Fingerboard Material</td>
                                            <td><?php echo e($detail->fingerboard_material ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Crown Radius</td>
                                            <td><?php echo e($detail->crown_radius ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Scale Length</td>
                                            <td><?php echo e($detail->scale_length ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>No. Frets / Type</td>
                                            <td><?php echo e($detail->frets ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Nut Size / Material</td>
                                            <td><?php echo e($detail->nut_size ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Neck Width</td>
                                            <td><?php echo e($detail->neck_width ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Neck Depth</td>
                                            <td><?php echo e($detail->neck_depth ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Fingerboard Inlays</td>
                                            <td><?php echo e($detail->inlays ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Neck Binding</td>
                                            <td><?php echo e($detail->neck_binding ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Side Dots</td>
                                            <td><?php echo e($detail->side_dots ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Neck Joint</td>
                                            <td><?php echo e($detail->neck_joint ?? '-'); ?></td>
                                        </tr>

                                    </tbody>
                                </table>
                                <table class="w-100 table-spec mt-3">
                                    <thead>
                                        <tr>
                                            <td colspan="2">hardware</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Bridge</td>
                                            <td><?php echo e($detail->bridge ?? '-'); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tailpiece / Tremolo</td>
                                            <td><?php echo e($detail->tailpiece ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tuning Machines</td>
                                            <td><?php echo e($detail->tuning_machines ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pickup Cover / Ring</td>
                                            <td><?php echo e($detail->pickup_cover ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Strap Buttons</td>
                                            <td><?php echo e($detail->strap_buttons ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Pickguard</td>
                                            <td><?php echo e($detail->pickguard ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Control Knobs</td>
                                            <td><?php echo e($detail->control_knobs ?? '-'); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Switch</td>
                                            <td><?php echo e($detail->switch ?? '-'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="w-100 table-spec mt-3">
                                    <thead>
                                        <tr>
                                            <td colspan="2">electronics</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Bridge Pickup</td>
                                            <td><?php echo e($detail->bridge_pickup ?? '-'); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Middle Pickup</td>
                                            <td><?php echo e($detail->middle_pickup ?? '-' ? 'Yes' : 'No'); ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><?php echo e($detail->middle_pickup_text ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Neck Pickup</td>
                                            <td><?php echo e($detail->neck_pickup ?? '-'); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Active / Passive</td>
                                            <td><?php echo e($detail->active_passive ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Series / Parallel</td>
                                            <td><?php echo e($detail->series_pararell ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Controls</td>
                                            <td><?php echo e($detail->control ?? '-'); ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Mono / Stereo</td>
                                            <td><?php echo e($detail->mono_stereo ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Vol Potentiometer </td>
                                            <td><?php echo e($detail->vol_pontentiometer ?? '-'); ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Tone Potentiometer</td>
                                            <td><?php echo e($detail->pontentiometer ?? '-'); ?> </td>
                                        </tr>
                                        <tr>
                                            <td>Capacitors</td>
                                            <td><?php echo e($detail->capacitor ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Harness</td>
                                            <td><?php echo e($detail->harnesst ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Push-pull</td>
                                            <td><?php echo e($detail->push_pull ?? '-' ? 'Yes' : 'No'); ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><?php echo e($detail->push_pull_text ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Piezo</td>
                                            <td><?php echo e($detail->piezo ?? '-' ? 'Yes' : 'No'); ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><?php echo e($detail->piezo_text ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Active EQ</td>
                                            <td><?php echo e($detail->active_eq ?? '-' ? 'Yes' : 'No'); ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><?php echo e($detail->active_eq_text ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Kill switch</td>
                                            <td><?php echo e($detail->kill_switch ?? '-' ? 'Yes' : 'No'); ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><?php echo e($detail->kill_switch_text ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Output Jack</td>
                                            <td><?php echo e($detail->output_jack ?? '-'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table class="w-100 table-spec mt-3">
                                    <thead>
                                        <tr>
                                            <td colspan="2">miscellaneous</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Case / Gigbag</td>
                                            <td><?php echo e($detail->case ?? '-'); ?>

                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Strap Locks</td>
                                            <td><?php echo e($detail->strap_lock ?? '-' ? 'Yes' : 'No'); ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><?php echo e($detail->strap_lock_text ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Strings</td>
                                            <td><?php echo e($detail->strings ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Tools / Accessories</td>
                                            <td><?php echo e($detail->tools ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Manual / Literature </td>
                                            <td><?php echo e($detail->manual ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>C.O.A.</td>
                                            <td><?php echo e($detail->coa ?? '-' ? 'Yes' : 'No'); ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><?php echo e($detail->coa_text ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Other</td>
                                            <td><?php echo e($detail->other ?? '-' ? 'Yes' : 'No'); ?></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td><?php echo e($detail->other_text ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Weight</td>
                                            <td><?php echo e($detail->weight ?? '-'); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Disclosure</td>
                                            <td><?php echo e($detail->disclosure ?? '-'); ?></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <div class="container">
                <h2>Gallery</h2>
                
            </div>
            <div class="container my-5">
               <div id="links" class="d-flex flex-wrap">
                   <?php $__currentLoopData = $images; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                       
                   <a class="img-gallery"  target="_blank" href="<?php echo e(asset('storage/'.$item->image)); ?>" title="<?php echo e($product->name); ?>">
                     <img src="<?php echo e(asset('storage/'.$item->image)); ?>" alt="Banana" />
                   </a>
                   <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </div>
                
                <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
                    <div class="slides"></div>
                    <h3 class="title"></h3>
                    <a target="_blank" class="prev"></a>
                    <a target="_blank" class="next"></a>
                    <a target="_blank" class="close"></a>
                    <a target="_blank" class="play-pause"></a>
                    <ol class="indicator"></ol>
                </div>

            </div>
<?php $__env->stopSection(); ?> 

<?php $__env->startSection('js'); ?>
<script src="<?php echo e(asset('js/detail-product.js')); ?>"></script>
<script src="<?php echo e(asset('js/blueimp-gallery.min.js')); ?>"></script>
<script>
    $(document).ready(function () {
            $("#wrap-detail").hide();
        });
    $("#read-more-detail").click(function () {

        $("#wrap-detail").slideDown();
    })
    $('#gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        zoom: {
                enabled: true,
                duration: 300,
                easing: 'ease-in-out',

                opener: function(openerElement) {
                    return openerElement.is('img') ? openerElement : openerElement.find(
                        'img');
                }
            },
        gallery: {
          enabled:true,
        }
    });
    document.getElementById('links').onclick = function (event) {
        event = event || window.event;
        var target = event.target || event.srcElement,
                link = target.src ? target.parentNode : target,
                options = { index: link, event: event },
                links = this.getElementsByTagName('a');
        // blueimp.Gallery(links, options);
        var gallery = blueimp.Gallery(
                links,
                {
                index: link, event: event,
                onopen: function () {
                        // Callback function executed when the Gallery is initialized.
                },
                onopened: function () {
                        // Callback function executed when the Gallery has been initialized
                        // and the initialization transition has been completed.
                },
                onslide: function (index, slide) {
                        //console.log("onslide:"+index);
                        // Callback function executed on slide change.
                        var get_index = index+1;
                        var get_w = $('.indicator').width();
                        var get_item_num = Math.floor(get_w/52)-1;
                        var page_index =  Math.floor(get_index/get_item_num);
                        // console.log("onslideend:"+get_index+"/"+get_w+"num:"+get_item_num+"page:"+page_index);
                        $('.indicator').scrollLeft(page_index*get_w);
                },
                onslideend: function (index, slide) {
                        var get_index = index+1;
                        var get_w = $('.indicator').width();
                        var get_item_num = Math.floor(get_w/52);
                        var page_index =  Math.floor(get_index/get_item_num);
                        console.log("onslideend:"+get_index+"/"+get_w+"num:"+get_item_num+"page:"+page_index);
                        $('.indicator').scrollLeft(page_index*get_w);
                        // Callback function executed after the slide change transition.
                },
                onslidecomplete: function (index, slide) {
                        // Callback function executed on slide content load.
                },
                onclose: function () {
                        // Callback function executed when the Gallery is about to be closed.
                },
                onclosed: function () {
                        // Callback function executed when the Gallery has been closed
                        // and the closing transition has been completed.
                }
                }
        );
    };
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\felicity-guitar\resources\views/product_detail.blade.php ENDPATH**/ ?>