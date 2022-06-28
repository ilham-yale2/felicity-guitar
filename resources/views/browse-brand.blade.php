@extends('layout.app')
@section('title', 'Browse by Brand')
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
            <div class="row mt-0 mt-md-4 ">
                <div class="col-12 mb-5 d-block d-md-none">
                    <button class="btn d-flex align-items-center text-white bg-orange btn-toggle-filter rounded">
                        <h3 class="mb-0 mr-3">Show filter</h3>
                        <span class="iconify" data-icon="ion:caret-forward-circle-sharp" data-width="30"></span>
                    </button>
                </div>
                <div class="col-md-2 pr-0 nav-filter d-flex d-md-block pt-5 pt-md-0">
                    
                    <div class="col-10 col-md-12 px-md-0 pb-5 pb-md-0">
                        <div class="d-flex border-bottom pb-2 align-items-bottom">
                            <div>
                                <img id="brandImg"  src="{{asset('storage').'/'.$brand['image']}}" alt="">
                            </div>
                        </div>
                        <ul class="list-none mt-4 brand-list ">
                            <li>
                                <div class="d-flex align-items-center parent">
                                    <span class="main">Brands</span>
                                    <span class="iconify arr ml-auto text-white" data-icon="bi:caret-down-fill"></span>
                                </div>
                                <ul class="child pl-2">
                                    @foreach ($brands as $item)
                                        <li class="text-capitalize list-{{$loop->iteration}}" onclick="changeBrand('{{$loop->iteration}}','{{$item->name}}','{{$item->image}}')">{{$item->name}}</li>
                                    @endforeach
                                </ul>
                            </li>
                        </ul>
                        <ul class="list-none mt-4 brand-list" id="country">
    
                            
                            {{-- <li class="text-capitalize" >
                                <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&country=Custom"><span class="text-country">{{$brand['name']}}</span> Custom</a>
                            </li>
                            <li class="text-capitalize">
                                <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&country=Memphis"><span class="text-country">{{$brand['name']}}</span> Memphis</a>
                            </li>
                            <li class="text-capitalize">
                                <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&country=Montana"><span class="text-country">{{$brand['name']}}</span> Montana</a>
                            </li> --}}
                        </ul>
                        <ul class="list-none brand-list mt-4">
                            <li class="">
                                <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&condition=new"><span>New</span></a>
                            </li>
                            <li class="mt-0">
                                <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&condition=used"><span>Used</span></a>
                            </li>
                            <li class="mt-4">
                                <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&type=solidbody"><span>Solidbody</span></a>
                            </li>
                            <li>
                                <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&type=semi-hollowbody"><span>Semi-hollowbody</span></a>
                            </li>
                            <li>
                                <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&type=offset"><span>Offset</span></a>
                            </li>
                            <li>
                                <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&type=hollowbody"><span>Hollowbody</span></a>
                            </li>
                            <li>
                                <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&type=accoustic"><span>Accoustic</span></a>
                            </li>
                        </ul>
                        <div class="d-flex d-md-block">
                            <ul class="mt-4 list-none brand-list">
                                <li>$ Price Range</li>
                                <li class="">
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_price=0&to_price=999"><span class="mr-4">-  </span> 999</a>
                                </li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_price=1000&to_price=1999"><span>1000 -  </span> 1999</a>
                                </li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_price=2000&to_price=2999"><span>2000 -  </span> 2999</a>
                                </li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_price=3000&to_price=3999"><span>3000 -  </span> 3999</a>
                                </li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_price=4000&to_price=4999"><span>4000 -  </span> 4999</a>
                                </li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_price=5000&to_price=5999"><span>5000 -  </span> 5999</a>
                                </li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_price=6000&to_price=6999"><span>6000 -  </span> 6999</a>
                                </li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_price=7000&to_price=7999"><span>7000 -  </span> 7999</a>
                                </li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_price=8000&to_price=8999"><span>8000 -  </span> 8999</a>
                                </li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_price=9000&to_price=9999"><span>9000 -  </span> 9999</a>
                                </li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&up_to=10000"><span>10000 -  </span> </a>
                                </li>
                            </ul>
                            <ul class="mt-4 list-none brand-list ml-auto ml-md-0">
                                <li> Year</li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_year=1950&to_year=1959"><span>1950 - </span>1959</a>
                                </li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_year=1960&to_year=1969"><span>1960 - </span>1969</a>
                                </li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_year=1970&to_year=1979"><span>1970 - </span>1979</a>
                                </li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_year=1980&to_year=1989"><span>1980 - </span>1989</a>
                                </li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_year=1990&to_year=1999"><span>1990 - </span>1999</a>
                                </li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_year=2000&to_year=2009"><span>2000 - </span>2009</a>
                                </li>
                                <li>
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&from_year=2010&to_year=2019"><span>2010 - </span>2019</a>
                                </li>
                                <li class="pb-5">
                                    <a class="filter" href="{{route('browse-brand')}}?brd={{$brand['name']}}&up_year=2020"><span>2020 - </span></a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-2 d-block d-md-none btn-toggle-filter">
                        <span class="iconify" data-icon="ion:caret-back-circle" data-width="35"></span>
                    </div>
                </div>
                @if (count($products) > 0)
                <div class="col-md-10 p-0">
                    <a href="{{route('index')}}" class="btn btn-outline position-fixed button-home">Home</a>
                    <div class="row mx-0">
                        @foreach ($products as $product)
                            <div class="col-card col-6 card-product mb-4 text-center px-3">
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
    <script src="{{asset('js/brand.js')}}"></script>
    <script>
        var brand = '{{$brand["name"]}}'
        setCountry(`{{$brand['name']}}`)
        $('.btn-toggle-filter').on('click', function(){
            $('.nav-filter').toggleClass('show')
        })
    </script>
@endsection
