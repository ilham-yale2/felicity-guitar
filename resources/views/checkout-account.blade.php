@extends('layout.app')
@section('title', 'Checkout Account')

@section('content')
    <div class="checkout">
        <section class="checkout_account animate animate--up">
            <div class="container">
                <div class="row">
                    <div class="col-lg-9">
                        <form action="#">
                            <h3>PERSONAL DETAILS</h3>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-6">
                                        <label> First Name *</label>
                                        <input class="form-control" type="text" placeholder="First Name" />
                                    </div>
                                    <div class="col-md-6">
                                        <label> Last Name *</label>
                                        <input class="form-control" type="text" placeholder="Last Name" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Street Address *</label>
                                <input class="form-control" type="text" placeholder="" />
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label> Town / City *</label>
                                        <input class="form-control" type="text" placeholder="" />
                                    </div>
                                    <div class="col-md-8">
                                        <label> Province * </label>
                                        <input class="form-control" type="text" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label> Country / Region * </label>
                                        <input class="form-control" type="text" placeholder="" />
                                    </div>
                                    <div class="col-md-8">
                                        <label> Postcode / ZIP *</label>
                                        <input class="form-control" type="text" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email address *</label>
                                <input class="form-control" type="email" placeholder="" />
                            </div>
                            <div class="form-group">
                                <label>Phone *</label>
                                <input class="form-control" type="email" placeholder="" />
                            </div>
                        </form>
                        <form action="#">
                            <h3>SHIPPING ADDRESS</h3>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="different" type="checkbox" name="different" />
                                <label class="custom-control-label" for="different">Different Address</label>
                            </div>
                            <div class="form-group">
                                <label>Street Address *</label>
                                <input class="form-control" type="text" placeholder="" />
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label> Town / City *</label>
                                        <input class="form-control" type="text" placeholder="" />
                                    </div>
                                    <div class="col-md-8">
                                        <label> Province * </label>
                                        <input class="form-control" type="text" placeholder="" />
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label> Country / Region * </label>
                                        <input class="form-control" type="text" placeholder="" />
                                    </div>
                                    <div class="col-md-8">
                                        <label> Postcode / ZIP *</label>
                                        <input class="form-control" type="text" placeholder="" />
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="form-action">
                            <div class="terms"><a href="#">Read Terms and Conditions</a></div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="recive_email" type="checkbox" name="recive_email" />
                                <label class="custom-control-label" for="recive_email">Receive email notification</label>
                            </div>
                            <div class="custom-control custom-checkbox">
                                <input class="custom-control-input" id="stay_login" type="checkbox" name="stay_login" />
                                <label class="custom-control-label" for="stay_login">Stay logged in </label>
                            </div>
                            <button class="btn btn-primary" type="submit"> Send Order</button>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
