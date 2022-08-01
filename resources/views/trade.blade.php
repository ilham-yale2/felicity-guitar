@extends('layout.app')
@section('title', 'Trade')

@section('content')
    <div class="form-page" style="overflow-x: hidden">
        <section class="section-1 animate animate--up">
            <div class="container">
                <div class="text-description">
                    <h2 class="text-gold copperplate"><b>WANNA SELL OR TRADE?</b></h2>
                    <p>We are always looking for clean, all original, name-brand and rare guitars and amplifiers to add to our
                        shop, so please do keep us in mind if you are contemplating selling any of your guitars or amplifiers. We
                        have an honest reputation of paying our clients fair market value for exceptionally clean pieces, whether
                        it’s a single piece or many pieces from a collection. For mint, near mint and excellent+ condition guitars,
                        we will certainly offer much more of a premium than we can for guitars with extensive wear or which
                        have been ‘modded’ with aftermarket parts. </p>
                    <p>We operate a small family-run shop with much less overhead than the “big guys” which costs us less to
                        ‘keep the lights on’ so to speak, and so we can usually offer you more for your instrument than larger
                        dealers would typically offer you. </p>
                    <p>Likewise, if you see an instrument that you like in our inventory and you would like to upgrade your
                        present-day instrument for a newer or higher-end model or just need a change, contact us and maybe we
                        can work out a trade with a reasonable balance. And vice versa, whether you bought a guitar that’s just
                        “a little too flashy” to be your everyday player and have some buyer’s remorse, or if you are thinking
                        about selling your guitar by necessity but don’t want to be without a nice guitar altogether, you may want
                        to ‘trade down’ and receive a very fair payment of cash back in the process. Either way, please do contact
                        us and we’ll work with you to find a solution for you.
                    </p>
                    <p>If you live within a reasonable distance from where we are located we are also ‘happy’ to come to you to
                        assess firsthand any exceptionally rare or expensive guitars, or also to survey an expansive guitar
                        collection including amplifiers, pedals, effects and other accoutrements for sale as a gross amount. </p>
                    <p>
                        If you are interested in selling your instrument(s) as described above, the first step would be to contact us
                        to see if we would be interested. If contacting via email or an app messenger, you should attach only a
                        few “clear” photographs initially with a basic description of your guitar including details like the year,
                        model and general condition. Also, please include your asking price. If we are interested we likely ask you
                        for some more photographs and the serial number.
                    </p>
                    <p>
                        If we agree on a price, we will request you to package the instrument safely and send us the guitar so that
                        we can properly inspect the instrument in person. After authentication, we will send payment to you via
                        bank wire-transfer the same day that the item is received and authenticated. If however, we receive the
                        instrument in condition ‘other than as described’ we will promptly return the guitar to you in the same
                        packing materials as received in, at our cost, although we have never had this happen yet –knock on
                        wood.
                    </p>
                    <p>
                        We thank you very much for considering us as a potential buying or trading partner, whether now or
                        anytime in the future.
                    </p>
                    <p>
                        Sincerely,
                    </p>
                    <h2 class="edwardian">- Felicity</h2>
                </div>
                <form action="{{route('trade.upload')}}" method="POST" enctype="multipart/form-data" id="myForm">
                    @csrf
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name *</label>
                                        <input class="form-control" required type="text" placeholder="username" name="name" value="{{ Auth::guard('user')->user()->name ?? '' }}"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email *</label>
                                        <input class="form-control" required type="email" placeholder="example@gmail.com" name="email"  value="{{ Auth::guard('user')->user()->email ?? '' }}"/>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                        <input class="form-control" required type="text" placeholder="phone" name="phone" value="{{ Auth::guard('user')->user()->phone ?? '' }}"/>
                                    </div>
                                    <div class="col-md-6">
                                        <label> City and State *</label>
                                        <input class="form-control" required type="text" placeholder="" name="city" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Do you have more than one piece of gear to sell? * </p>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" id="radio_yes" type="radio" name="piece_of_gear"
                                        value="1"  />
                                    <label class="custom-control-label" for="radio_yes">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" id="radio_no" type="radio" name="piece_of_gear"
                                        value="0" checked />
                                    <label class="custom-control-label" for="radio_no">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Gear Type: *</label>
                                        <select class="select" title="Choose Gear Type" name="gear_type" required>
                                            <option value="1">Type 1</option>
                                            <option value="2">Type 2</option>
                                            <option value="3">Type 3</option>
                                            <option value="4">Type 4</option>
                                            <option value="5">Type 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Make *</label>
                                        <input class="form-control" required type="text" name="make" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Model * </label>
                                        <input class="form-control" required type="text"  name="model"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Condition </label>
                                        <select class="select" title="Choose Condition" name="condition" required>
                                            <option value="1">Condition 1</option>
                                            <option value="2">Condition 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Serial Number * </label>
                                        <input class="form-control" type="text" name="serial_number" required/>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Case Include: *</label>
                                        <select class="select" title="Choose Included" name="case_include">
                                            <option value="Included 1">Included 1</option>
                                            <option value="Included 2">Included 2</option>
                                            <option value="Included 3">Included 3</option>
                                            <option value="Included 4">Included 4</option>
                                            <option value="Included 5">Included 5</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <label>Please check all applicable boxes *</label>
                            <div class="group-chkbox">
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="applicable1" type="checkbox"
                                        name="applicable_1" />
                                    <label class="custom-control-label" for="applicable1">Item has known issues or
                                        damage</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="applicable2" type="checkbox"
                                        name="applicable_2" />
                                    <label class="custom-control-label" for="applicable2">Item has been modified</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="applicable3" type="checkbox"
                                        name="applicable_3" />
                                    <label class="custom-control-label" for="applicable3">I would like to provide additional
                                        information</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="applicable4" type="checkbox"
                                        name="applicable_4" />
                                    <label class="custom-control-label" for="applicable4">Gear is listed online and I have a
                                        URL to
                                        provide</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Describe/list issues, problems and/or damage. *</label>
                                <textarea required class="form-control" placeholder="Describe" name="description_problem"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Describe/list modifications. *</label>
                                <textarea required class="form-control" placeholder="Describe" name="description_modification"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Additional information *</label>
                                <textarea required class="form-control" placeholder="Information" name="information"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Listing URL *</label>
                                <input class="form-control" type="url" placeholder=""  name="url" required />
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="form-group upImg-group">
                                <label>Image</label>
                                <div class="row">
                                    <div class="col">
                                        <div class="upload-file">
                                            <input class="inputfile" id="photo1" type="file" name="file[]" />
                                            <label class="btn add-photo label-btn" for="photo1"><span
                                                    class="image-preview"></span></label><a class="btn-del"
                                                href="#">Delete</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="upload-file">
                                            <input class="inputfile" id="photo2" type="file" name="file[]" />
                                            <label class="btn add-photo label-btn" for="photo2"><span
                                                    class="image-preview"></span></label><a class="btn-del"
                                                href="#">Delete</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="upload-file">
                                            <input class="inputfile" id="photo3" type="file" name="file[]" />
                                            <label class="btn add-photo label-btn" for="photo3"><span
                                                    class="image-preview"></span></label><a class="btn-del"
                                                href="#">Delete</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="upload-file">
                                            <input class="inputfile" id="photo4" type="file" name="file[]" />
                                            <label class="btn add-photo label-btn" for="photo4"><span
                                                    class="image-preview"></span></label><a class="btn-del"
                                                href="#">Delete</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="upload-file">
                                            <input class="inputfile" id="photo5" type="file" name="file[]" />
                                            <label class="btn add-photo label-btn" for="photo5"><span
                                                    class="image-preview"></span></label><a class="btn-del"
                                                href="#">Delete</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <div class="form-action">
                                <div class="terms"><a href="#">Read Terms and Conditions</a></div>
                                <button class="btn btn-primary" type="submit"> Send</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </section>
    </div>
@endsection
@section('js')
<script>
    $('#myForm').submit(function(){
        if($('input[name="file[]"]')[0].files.length === 0){
            Swal.fire({
            icon: 'info',
            title: 'Oops...!',
            text: "Please input images",
            })
            return false
        }
    })
</script>
@endsection