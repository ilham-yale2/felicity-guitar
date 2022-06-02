@extends('layout.app')
@section('title', 'Checkout')
@section('content')
<div class="checkout">
    <section class="checkout_account animate animate--up">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <form action="{{route('make.order')}}" method="POST">
                @csrf
                @method('PATCH')
                <h3>PERSONAL DETAILS</h3>
                <div class="form-group">
                    <div class="row">
                    <div class="col-md-6">
                        <label> First Name *</label>
                        <input class="form-control" required type="text" name="first_name" placeholder="First Name" value="{{ Auth::guard('user')->user()->first_name ?? '' }}"/>
                    </div>
                    <div class="col-md-6">
                        <label> Last Name *</label>
                        <input class="form-control" required type="text" name="last_name" placeholder="Last Name" value="{{ Auth::guard('user')->user()->last_name ?? '' }}"/>
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
                    <input class="form-control" required type="email" name="email" placeholder="" value="{{ Auth::guard('user')->user()->email ?? '' }}" />
                </div>
                <div class="form-group">
                    <label>Phone *</label>
                    <input class="form-control number" required type="text" name="phone"  placeholder="" value="{{Auth::guard('user')->user()->phone ?? '' }} "/>
                </div>
                <h3 class="mt-4">SHIPPING ADDRESS</h3>
                <div class="row mx-0 align-items-center">
                    <div class="custom-control custom-checkbox d-flex align-ite">
                        <input class="custom-control-input" name="different" id="different" type="checkbox" onchange="showForm()" value="1"/>
                        <label class="custom-control-label" for="different">Different Address</label>
                    </div>
                    @if (Auth::guard('user')->user())
                    <div class="form-group ml-4 col-md-4">
                        <select class="form-control d-none"  id="addressSelect">
                            <option hidden selected>Select Your Address</option>
                            @foreach ($address as $item)
                            <option value="{{$item->id}}">{{$item->title}}</option>
                            @endforeach
                            @if (!$address || count($address) <= 0)
                                <option  > You not have a Address</option>
                            @endif
                        </select>
                    </div>
                    @endif
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
                        @php
                            $total = 0;
                            $qty = 0;
                        @endphp
                        {{-- if user have a product in cart --}}
                        @foreach ($carts as $item)                            
                            <div class="cart_item" id="product-{{ $loop->iteration }}">
                                <div class="row">
                                    <div class="col-md-7">
                                        <div class="cart_product">
                                            <div class="cart_product-img p-0">
                                                <img class="position-relative" src="{{ asset('storage')}}/{{$item->product->thumbnail ?? $item->thumbnail }}" alt="cart-prodcut-img" />
                                            </div>
                                            <div class="cart_product-name">
                                                <h4><a href="{{route('detail-product', ['name' => $item->product->code ?? $item->code ])}}">{{$item->product->name ?? $item->name}}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"><span>{{$item->qty ?? '1'}}</span></div>
                                    <div class="col-md-3"><span class="price">Rp {{ number_format($item->product->sell_price ?? $item->sell_price)}}</span></div>
                                </div>
                            </div>
                            @if ($item->qty != null)
                                    <input type="hidden" name="product_id[]" value="{{\Crypt::encryptString($item->id)}}">

                                    @php
                                        $qty = $qty + $item->qty;
                                        $total = $total + $item->product->sell_price;
                                    @endphp
                            @else
                                    <input type="hidden" name="product" value="{{\Crypt::encryptString($item->id)}}">

                                    @php
                                        
                                        $qty = $qty + 1;
                                        $total = $total + $item->sell_price;
                                    @endphp
                            @endif
                        @endforeach
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
                                            <div class="total_qty"><span>{{number_format($qty)}}</span></div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="total_nominal"><span>Rp {{number_format($total)}}</span></div>
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
                    {{-- <div class="custom-control custom-checkbox">
                        <input class="custom-control-input" id="stay_login" type="checkbox" name="stay_login" />
                        <label class="custom-control-label" for="stay_login">Stay logged in </label>
                    </div> --}}
                    <button class="btn btn-primary" type="submit"> Send Order</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection
@section('js')
    <script src="{{asset('js/checkout.js')}}"></script>
    <script>
       if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_BACK_FORWARD) {
            window.location.reload()
        }
        
    </script>
@endsection