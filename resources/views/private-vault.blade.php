@extends('layout.app')
@section('title', 'Private vault')
@section('css')
	<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
@endsection
@section('content')
    <div class="privatevault">
        <section class="privatevault_description animate animate--up">
            <div class="container">
                @if (count($products)>0)
                <div id="carouselExampleSlidesOnly" class="carousel slide privatevault_description-wrap" data-ride="carousel" data-interval="4000">
                    <div class="carousel-inner">
                            @foreach ($products as $item)
                                @if ($loop->iteration < 4)
                                    <div class="carousel-item {{$loop->iteration == 1 ? 'active' : ''}}">
                                        <div class="row w-100">
                                            <div class="col-md-6">
                                                <h2>PRIVATE VAULT</h2>
                                                <article class="text-private-vault">
                                                    <h3>{{$item->name}}</h3>
                                                    {!! $item->text !!}
                                                </article>
                                            </div>
                                            <div class="col-md-5 ml-auto">
                                                <div class="privatevault_img">
                                                    <img src="{{asset('storage/'.$item->thumbnail_2)}}" alt="{{$item->alt_text}}" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                    </div>
                </div>
                @else
                <h1 class="text-center text-orange copperplate mb-0 mt-5 pt-5">Coming soon!</h1>
                <h3 class="text-center text-gold copperplate " style="font-size: 28px">~  Stay Tuned ~ </h3>
                @endif
            </div>
        </section>
        <section class="privatevault_guitar animate animate--up">
            <div class="container">
                <div class="row">
                    @if (count($products) > 0)
                        @foreach ($products as $item)
                        <div class="col-lg-3 col-md-6">
                            <div class="privatevault_guitar-card">
                                <div class="imgbox">
                                    <a href="{{route('detail-vault', ['name' => $item->slug] )}}"> 
                                        <img src="{{asset('storage/'.$item->thumbnail)}}" alt=" {{$item->alt_text}}"/>
                                    </a>
                                </div>
                                <div class="textbox">
                                    <h3> 
                                        <a class="d-inline-block text-truncate" style="max-width: 220px"href="{{route('detail-vault', ['name' => $item->slug] )}}">
                                            {{$item->name}} 
                                            
                                        </a>
                                    </h3>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </section>
    </div>
@endsection


@section('js')
	<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script>
    $('.slider-vault').slick({
        dots: false,
        prevArrow: false,
        nextArrow: false,
        slideToShow: 1
    })
</script>
@endsection