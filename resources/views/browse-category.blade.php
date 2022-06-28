@extends('layout.app')
@section('title', 'Browse by Category')
@section('content')
<style>
    @media (min-width: 1200px){
        .container, .container-lg, .container-md, .container-sm, .container-xl {
            max-width: 1290px;
        }
    }
    body {
        background: url("{{asset('images/background-multi-item.jpg')}}");
    }

    body:before {
        background: unset;
    }
</style>
    <div class="aboutus">
        <div class="container">
            <div class="row mt-4">
                <div class="col-12 mb-5 d-block d-md-none">
                    <button class="btn d-flex align-items-center text-white bg-orange btn-toggle-filter rounded">
                        <h3 class="mb-0 mr-3">Show filter</h3>
                        <span class="iconify" data-icon="ion:caret-forward-circle-sharp" data-width="30"></span>
                    </button>
                </div>
                <div class="col-md-2 d-flex nav-filter">
                    <div class="col-10 px-0 mt-5 mt-md-0">
                        <h4 class="border-bottom pb-2 text-gold"><b>Category</b></h4>
                        <ul class="list-none mt-4 category-list">
                            <li><a class="text-gold" href="{{route('browse-category')}}">All Guitars</a></li>
                            @foreach ($categories as $item)
                                
                            <li><a class="text-gold" href="{{route('browse-category').'?ctg='. $item->name}}">{{$item->name}}</a></li>
                            @endforeach
                            
                        </ul>
                    </div>
                    <div class="col-2 px-0 d-block d-md-none">
                        <button class="btn text-white btn-toggle-filter">
                            <span class="iconify" data-icon="ion:caret-back-circle" data-width="35"></span>
                        </button>
                    </div>
                </div>
                @if (count($products) > 0)
                <div class="col-md-10 p-0">
                    <a href="{{route('index')}}" class="btn btn-outline position-fixed button-home">Home</a>
                    <div class="row mx-0">
                        @foreach ($products as $product)
                            <div class="{{$col ?? 'col-card'}} col-6 card-product mb-4 text-center px-3 py-0">
                                <a href="{{route('detail-product',['name' => $product->slug])}}">
                                    <div class="d-flex justify-content-center">
                                        <img src="{{asset('storage').'/'.$product->thumbnail}}" class="card-product-img" alt="">
                                    </div>
                                    <p class="product-name text-gold copperplate mb-0">{{$product->name}}</p>    
                                    <p>
                                        More Info..
                                    </p>
                                </a>
                                {{-- <div class="d-flex flex-wrap border-bottom border-white pb-3">
                                    <div class="img-product col-5 p-0">
                                        <div class="p-2 bg-white">
                                        </div>
                                        <div class="bg-orange text-center text-white py-1">
                                            IDR {{number_format($product->sell_price)}} 
                                        </div>
                                    </div>
                                    <div class="col-6 pr-0 d-flex flex-wrap" style="min-height: 250px">
                                        <p class="mb-1 w-100 d-none d-md-block">{{ \Illuminate\Support\Str::limit(strip_tags($product->text), 220,'...') }}
                                        </p>
                                        <p class="mb-1 w-100 d-block d-md-none">{{ \Illuminate\Support\Str::limit(strip_tags($product->text), 270,'...') }}
                                        </p>
                                        <a class="w-100 mt-auto" href="{{route('detail-product',['name' => $product->slug])}}"><button class="btn border border-white btn-read w-100">Read
                                                More</button></a>
                                    </div>
                                </div> --}}
                            </div>
                        @endforeach
                        <div class="w-100 d-flex">
                            <div class="ml-auto paginate-product">
                                {{$products->links()}}
                            </div>
                        </div>
                    </div>
                </div>
                @else
                <div class="text-center col-md-8 col-12 pt-5 mt-5">
                    <h1 class="text-orange copperplate mb-0">Coming soon!</h1>
                    <h2 class="text-gold copperplate">~ Stay tuned ~</h2>
                    <h5 class="text-gold copperplate">(pun intended)</h5>
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        function redirect(url){
            window.location.href=url
        }
        $('.btn-toggle-filter').on('click', function(){
            $('.nav-filter').toggleClass('show')
        })
    </script>
@endsection