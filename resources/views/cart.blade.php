@extends('layout.app')
@section('title', 'Cart')
@section('content')
<input type="hidden" id="dirty" value="0">
<form action="{{route('checkout')}}" method="POST">
    @csrf
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
                
                {{-- if user login --}}
                @if (Auth::guard('user')->user())
                    {{-- if user have a product in cart --}}
                    @if (count($products) > 0)
                        @foreach ($products as $item)
                            <div class="cart_item" id="product-{{ $loop->iteration }}">
                                <div class="row">
                                    <div class="col-md-1">
                                        <div class="cart_action d-flex align-items-center">
                                            <button type="button" class=" btn p-0 text-white bg-transparent" onclick="deleteItem(`{{ \Crypt::encryptString($item->id) }}`, `{{$loop->iteration}}`)">
                                                <span class="iconify" data-icon="bi:trash" data-width="18"></span>
                                            </button>
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="cart_item_{{$loop->iteration}}" type="checkbox"
                                                    name="product[]" onchange="getTotal(`{{ $loop->iteration }}`)" value="{{ \Crypt::encryptString($item->id) }}" />
                                                <label class="custom-control-label" for="cart_item_{{$loop->iteration}}"></label>
                                                <input type="hidden" value="{{$item->qty}}" id="qq-{{ $loop->iteration }}">
                                                <input type="hidden" value="{{$item->product->sell_price}}" id="pp-{{ $loop->iteration }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-7">
                                        <div class="cart_product">
                                            <div class="cart_product-img"><img src="{{asset('storage').'/'.$item->product->thumbnail}}"
                                                    alt="cart-prodcut-img" />
                                            </div>
                                            <div class="cart_product-name">
                                                <h4><a href="{{route('detail-product', ['name' => $item->product->slug])}}">{{$item->product->name}}</a>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"><span>{{$item->qty}}</span></div>
                                    <div class="col-md-2"><span class="price">Rp {{number_format($item->price)}}</span></div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="cart_item">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center">
                                        <h2>Your cart is empty</h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @else
                {{-- if user not login --}}
                <div class="cart_item">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="text-center">
                                <h2>You must Login first</h2>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
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
@endsection
@section('js')
<script src="{{asset('js/cart.js')}}"></script>
<script>
    var total = 0;
    var qty = 0;
    if (window.performance && window.performance.navigation.type === window.performance.navigation.TYPE_BACK_FORWARD) {
        window.location.reload()
    }
</script>
@endsection