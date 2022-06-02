@extends('layout.app')
@section('title', 'Detail Product')
@section('css')
    <link rel="stylesheet" href="{{asset('css/blueimp-gallery.min.css')}}">
@endsection
@section('content')
<style>
    .mfp-arrow-left { background:url('{{asset("plugins/magnific-popup/src/img/prev.png")}}') no-Repeat top left !important; width:40px; height:40px; } 
    .mfp-arrow-right { background:url('{{asset("plugins/magnific-popup/src/img/next.png")}}') no-Repeat top left !important; width:40px; height:40px; }
     .mfp-arrow-left::after,.mfp-arrow-left::before, .mfp-arrow-right::before,.mfp-arrow-right::after { display: none; }
</style>
 <section id="section-detail" class="mb-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="details text-white">
                                <h1 class="title">
                                    {{$product->name}}
                                </h1>
                                <div class="short-desc">  
                                    {!! $product->text !!}
                                </div>
                                <a href="#wrap-detail" class="btn btn-outline" id="read-more-detail">Read More</a>
                            </div>

                        </div>
                        <div class="col-md-5 offset-md-1">
                            <img src="{{asset('storage').'/'.$product->thumbnail}}" class="w-100 img-details" alt="">
                            <p class="price mt-3 mb-2">IDR {{number_format($product->price)}}</p>
                            <span>Price inclusive of VAT ● Shipping costs will be calculated at check out</span>
                           @if ($product->status != 'sold')
                           <div class="row mt-3">
                            <div class="col-md-6">
                                <form action="{{route('buynow')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="product[]" value="{{ \Crypt::encryptString($product->id) }}">
                                </form>
                                <a href="{{$product->wa_link}}"  class="btn cta-product w-100">Buy Now</a>
                            </div>
                            @if (Auth::guard('user')->user())
                                @if ($type != 'private-vault')
                                    
                                <div class="col-md-6">
                                    <button type="button" class="btn cta-product w-100" onclick="addToCart(`{{ \Crypt::encryptString($product->code) }}`)">Add to Cart </button>
                                </div>
                                @endif
                            @endif
                        </div>
                           @endif
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
                                    {!! $detail->description ?? '-' !!}

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
                                            <td>{{$detail->condition ?? '-'}} </td>
                                        </tr>
                                        <tr>
                                            <td>Number of Strings</td>
                                            <td>{{$detail->number_of_strings ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Orientation</td>
                                            <td>{{$detail->orientation ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Country of Origin</td>
                                            <td>{{$detail->made_in ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Year</td>
                                            <td>{{$detail->year ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Weight</td>
                                            <td>{{$detail->weight_product ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Limited Edition / Series</td>
                                            <td>{{$detail->limited_series ?? '-' ? 'Limited Edition' : 'Series'}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>{{$detail->limited_series_text ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Weight</td>
                                            <td>{{$detail->weight_product ?? '-'}}</td>
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
                                            <td>{{$detail->type ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Body Shape</td>
                                            <td>
                                                {{$detail->shape ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Body Material</td>
                                            <td>{{$detail->material ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Body Carve</td>
                                            <td>{{$detail->carve ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Body Binding</td>
                                            <td>{{$detail->binding ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Weight Relief</td>
                                            <td>{{$detail->weight_relief ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Build Materials Used</td>
                                            <td>{{$detail->build_material ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Body Finish Type</td>
                                            <td>{{$detail->body_finish_type ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Color</td>
                                            <td>{{$detail->color ?? '-'}}</td>
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
                                            <td>{{$detail->neck_material ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Truss Rod</td>
                                            <td>{{$detail->truss_rod ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Truss Rod Cover</td>
                                            <td>{{$detail->truss_rod_cover ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Peghead Particulars</td>
                                            <td>{{$detail->peghead_particular ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Neck Profile</td>
                                            <td>{{$detail->neck_profile ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Fingerboard Material</td>
                                            <td>{{$detail->fingerboard_material ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Crown Radius</td>
                                            <td>{{$detail->crown_radius ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Scale Length</td>
                                            <td>{{$detail->scale_length ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>No. Frets / Type</td>
                                            <td>{{$detail->frets ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Nut Size / Material</td>
                                            <td>{{$detail->nut_size ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Neck Width</td>
                                            <td>{{$detail->neck_width ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Neck Depth</td>
                                            <td>{{$detail->neck_depth ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Fingerboard Inlays</td>
                                            <td>{{$detail->inlays ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Neck Binding</td>
                                            <td>{{$detail->neck_binding ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Side Dots</td>
                                            <td>{{$detail->side_dots ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Neck Joint</td>
                                            <td>{{$detail->neck_joint ?? '-'}}</td>
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
                                            <td>{{$detail->bridge ?? '-'}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Tailpiece / Tremolo</td>
                                            <td>{{$detail->tailpiece ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tuning Machines</td>
                                            <td>{{$detail->tuning_machines ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Pickup Cover / Ring</td>
                                            <td>{{$detail->pickup_cover ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Strap Buttons</td>
                                            <td>{{$detail->strap_buttons ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Pickguard</td>
                                            <td>{{$detail->pickguard ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Control Knobs</td>
                                            <td>{{$detail->control_knobs ?? '-'}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Switch</td>
                                            <td>{{$detail->switch ?? '-'}}</td>
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
                                            <td>{{$detail->bridge_pickup ?? '-'}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Middle Pickup</td>
                                            <td>{{$detail->middle_pickup ?? '-' ? 'Yes' : 'No'}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>{{$detail->middle_pickup_text ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Neck Pickup</td>
                                            <td>{{$detail->neck_pickup ?? '-'}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Active / Passive</td>
                                            <td>{{$detail->active_passive ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Series / Parallel</td>
                                            <td>{{$detail->series_pararell ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Controls</td>
                                            <td>{{$detail->control ?? '-'}} </td>
                                        </tr>
                                        <tr>
                                            <td>Mono / Stereo</td>
                                            <td>{{$detail->mono_stereo ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Vol Potentiometer </td>
                                            <td>{{$detail->vol_pontentiometer ?? '-'}} </td>
                                        </tr>
                                        <tr>
                                            <td>Tone Potentiometer</td>
                                            <td>{{$detail->pontentiometer ?? '-'}} </td>
                                        </tr>
                                        <tr>
                                            <td>Capacitors</td>
                                            <td>{{$detail->capacitor ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Harness</td>
                                            <td>{{$detail->harnesst ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Push-pull</td>
                                            <td>{{$detail->push_pull ?? '-' ? 'Yes' : 'No'}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>{{$detail->push_pull_text ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Piezo</td>
                                            <td>{{$detail->piezo ?? '-' ? 'Yes' : 'No'}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>{{$detail->piezo_text ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Active EQ</td>
                                            <td>{{$detail->active_eq ?? '-' ? 'Yes' : 'No'}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>{{$detail->active_eq_text ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Kill switch</td>
                                            <td>{{$detail->kill_switch ?? '-' ? 'Yes' : 'No'}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>{{$detail->kill_switch_text ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Output Jack</td>
                                            <td>{{$detail->output_jack ?? '-'}}</td>
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
                                            <td>{{$detail->case ?? '-'}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Strap Locks</td>
                                            <td>{{$detail->strap_lock ?? '-' ? 'Yes' : 'No'}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>{{$detail->strap_lock_text ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Strings</td>
                                            <td>{{$detail->strings ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Tools / Accessories</td>
                                            <td>{{$detail->tools ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Manual / Literature </td>
                                            <td>{{$detail->manual ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>C.O.A.</td>
                                            <td>{{$detail->coa ?? '-' ? 'Yes' : 'No'}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>{{$detail->coa_text ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Other</td>
                                            <td>{{$detail->other ?? '-' ? 'Yes' : 'No'}}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td>{{$detail->other_text ?? '-' }}</td>
                                        </tr>
                                        <tr>
                                            <td>Weight</td>
                                            <td>{{$detail->weight ?? '-'}}</td>
                                        </tr>
                                        <tr>
                                            <td>Disclosure</td>
                                            <td>{{$detail->disclosure ?? '-'}}</td>
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
                {{-- <div class="row" id="gallery">
                    @foreach ($images as $item)    
                        <div class="col-md-2">
                            <a href="{{asset('storage/' . $item->image )}}" target="_blank" data-group="1" class="image-link test">
                                <img src="{{asset('storage/' . $item->image )}}" alt="">
                            </a>            
                        </div>
                    @endforeach
                </div> --}}
            </div>
            <div class="container my-5">
               <div id="links" class="d-flex flex-wrap">
                   @foreach ($images as $item)
                       
                   <a class="img-gallery"  target="_blank" href="{{asset('storage/'.$item->image)}}" title="{{$product->name}}">
                     <img src="{{asset('storage/'.$item->image)}}" alt="Banana" />
                   </a>
                   @endforeach
                
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
@endsection 

@section('js')
<script src="{{asset('js/detail-product.js')}}"></script>
<script src="{{asset('js/blueimp-gallery.min.js')}}"></script>
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
@endsection