@extends('layout.app')
@section('title', 'Browse by Brand')
@section('content')
    <div class="aboutus">
        <div class="container">
            <div class="row">
                
                <div class="col-md-12 p-0">
                    <div class="row mx-0">
                        @if (count($products) > 0)
                            @foreach ($products as $item)
                                <div class="col-md-6 card-product">
                                    <h3>{{$item->name}}</h3>
                                    <div class="d-flex">
                                        <div class="img-product col-5 p-0">
                                            <div class="p-2 bg-white">
                                                <img src="{{asset('storage').'/'.$item->thumbnail}}"
                                                    alt="" class="img-product">
                                            </div>
                                            <div class="bg-orange text-center text-white py-1">
                                                IDR {{number_format($item->sell_price)}}
                                            </div>
                                        </div>
                                        <div class="col-6 pr-0">
                                            <p class="mb-1">{!! \Illuminate\Support\Str::limit($item->text, 180,'...') !!}
                                            </p>
                                            <a href="{{route('detail-product',['name' => $item->slug])}}"><button class="btn border border-white btn-read w-100">Read
                                                    More</button></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="text-center w-100 pt-5">
                                <h2 style="text-transform: none">No Product</h2>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

