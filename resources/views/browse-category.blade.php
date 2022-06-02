@extends('layout.app')
@section('title', 'Browse by Category')
@section('content')
    <div class="aboutus">
        <div class="container">
            <div class="row mt-4">
                <div class="col-md-2 ">
                    <h4 class="border-bottom pb-2"><b>Category</b></h4>
                    <ul class="list-none mt-4 category-list">
                        <li><a href="{{route('browse-category')}}">All Guitars</a></li>
                        @foreach ($categories as $item)
                            
                        <li><a href="{{route('browse-category').'?ctg='. $item->name}}">{{$item->name}}</a></li>
                        @endforeach
                        
                    </ul>
                </div>
                <div class="col-md-10 p-0">
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-md-6 card-product mb-4" onclick="redirect('{{route('detail-product',['name' => $product->slug])}}')">
                            <h3>{{$product->name}}</h3>
                            <div class="d-flex flex-wrap border-bottom border-white pb-3">
                                <div class="img-product col-5 p-0">
                                    <div class="p-2 bg-white">
                                        <img src="{{asset('storage').'/'.$product->thumbnail}}"
                                            alt="" class="img-product">
                                    </div>
                                    <div class="bg-orange text-center text-white py-1">
                                        IDR {{number_format($product->sell_price)}} 
                                    </div>
                                </div>
                                <div class="col-6 pr-0 d-flex flex-wrap" style="min-height: 250px">
                                    <p class="mb-1 w-100">{!! strip_tags(\Illuminate\Support\Str::limit($product->text, 250,'...')) !!}
                                    </p>
                                    <a class="w-100 mt-auto" href="{{route('detail-product',['name' => $product->slug])}}"><button class="btn border border-white btn-read w-100">Read
                                            More</button></a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function redirect(url){
            window.location.href=url
        }
    </script>
@endsection