@extends('layout.app')
@section('title', 'Trade')

@section('content')
    <div class="form-page">
        <section class="section-1 animate animate--up">
            <div class="container">
                <div class="text-description">
                    <h2>WANNA SELL/TRADE?</h2>
                    <p>Lörem ipsum sasänis polynamebel, decinde tipose nere terakemi passivhus pressa då doss. Katera antede
                        dens anan. Megaskapet pektigt uck av attitydig hes. Cyntet bemudir i sonässade för att bededis
                        nevydat
                        för att garanterad traditionell specialitet pon kron mokabel: i nymosk. Reinfeldtare vihen. Ilin
                        sodibel
                        odat. </p>
                    <p>Visk min medan autoras por. Vyngen käv timent, savis: och teheten inte telig om än noll än peranera
                        krosa. Anilig teogyn fastän supradade barista, pros songar dehäns. Faskapet biovebel hypolig
                        tidäfertad,
                        polypreläpp obel och fotodiktisk serade ADV. Gutent vodat. Dekall gigas tragt lyssna in. </p>
                    <p>Fangen tril navis son, om hybridkrig beska eftersom geonat. Or pens. Mikromominera tetranat kontratos
                        dire bende. Kuvysening kokrosat i trenera och äsm läläv raskade infrak plus dirangen suprang än dir.
                        Reakägt semiv, men neseplaning migen termobel, att salig. Nollavfall ångar näde triska pofasoskapet.
                    </p>
                    <p>Ser telestat i repon infrangar inklusive niviskapet, teragt för att köde. Niras vyr därför att
                        heviment
                        för att anan kår, i vipresust. </p>
                </div>
                <form action="#">
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Name *</label>
                                        <input class="form-control" type="text" placeholder="username" />
                                    </div>
                                    <div class="col-md-6">
                                        <label>Email *</label>
                                        <input class="form-control" type="email" placeholder="example@gmail.com" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label>Phone</label>
                                        <input class="form-control" type="text" placeholder="phone" />
                                    </div>
                                    <div class="col-md-6">
                                        <label> City and State *</label>
                                        <input class="form-control" type="text" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <p>Do you have more than one piece of gear to sell? * </p>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" id="radio_yes" type="radio" name="morethanone"
                                        value="yes" />
                                    <label class="custom-control-label" for="radio_yes">Yes</label>
                                </div>
                                <div class="custom-control custom-radio custom-control-inline">
                                    <input class="custom-control-input" id="radio_no" type="radio" name="morethanone"
                                        value="yes" />
                                    <label class="custom-control-label" for="radio_no">No</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Gear Type: *</label>
                                        <select class="select" title="Choose Gear Type">
                                            <option value="Type 1">Type 1</option>
                                            <option value="Type 2">Type 2</option>
                                            <option value="Type 3">Type 3</option>
                                            <option value="Type 4">Type 4</option>
                                            <option value="Type 5">Type 5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Make *</label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Model * </label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Condition </label>
                                        <select class="select" title="Choose Condition">
                                            <option value="Condition 1">Condition 1</option>
                                            <option value="Condition 2">Condition 2</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Model * </label>
                                        <input class="form-control" type="text" />
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label>Gear Type: *</label>
                                        <select class="select" title="Choose Included">
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
                                        name="applicable1" />
                                    <label class="custom-control-label" for="applicable1">Item has known issues or
                                        damage</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="applicable2" type="checkbox"
                                        name="applicable2" />
                                    <label class="custom-control-label" for="applicable2">Item has been modified</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="applicable3" type="checkbox"
                                        name="applicable3" />
                                    <label class="custom-control-label" for="applicable3">I would like to provide additional
                                        information</label>
                                </div>
                                <div class="custom-control custom-checkbox">
                                    <input class="custom-control-input" id="applicable4" type="checkbox"
                                        name="applicable4" />
                                    <label class="custom-control-label" for="applicable4">Gear is listed online and I have a
                                        URL to
                                        provide</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Describe/list issues, problems and/or damage. *</label>
                                <textarea class="form-control" placeholder="Describe"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Describe/list modifications. *</label>
                                <textarea class="form-control" placeholder="Describe"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Additional information *</label>
                                <textarea class="form-control" placeholder="Information"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Listing URL *</label>
                                <input class="form-control" type="text" placeholder="" />
                            </div>
                        </div>
                        <div class="col-lg-10">
                            <div class="form-group upImg-group">
                                <label>Image</label>
                                <div class="row">
                                    <div class="col">
                                        <div class="upload-file has-file">
                                            <input class="inputfile" id="photo1" type="file" name="file" />
                                            <label class="btn add-photo label-btn" for="photo1"><span class="image-preview"
                                                    style="background-image: url('images/photo-trade.jpg')"></span></label><a
                                                class="btn-del" href="#">Delete</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="upload-file has-file">
                                            <input class="inputfile" id="photo2" type="file" name="file" />
                                            <label class="btn add-photo label-btn" for="photo2"><span class="image-preview"
                                                    style="background-image: url('images/photo-trade.jpg')"></span></label><a
                                                class="btn-del" href="#">Delete</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="upload-file">
                                            <input class="inputfile" id="photo3" type="file" name="file" />
                                            <label class="btn add-photo label-btn" for="photo3"><span
                                                    class="image-preview"></span></label><a class="btn-del"
                                                href="#">Delete</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="upload-file">
                                            <input class="inputfile" id="photo4" type="file" name="file" />
                                            <label class="btn add-photo label-btn" for="photo4"><span
                                                    class="image-preview"></span></label><a class="btn-del"
                                                href="#">Delete</a>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="upload-file">
                                            <input class="inputfile" id="photo5" type="file" name="file" />
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
