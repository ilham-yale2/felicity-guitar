@php
$users = App\User::orderBy('name', 'asc')->get();
$setting = App\Setting::first();
$format_number = explode('08', $setting->phone);
$format_number = '628' . $format_number[1];
@endphp

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta itemprop="name" content="@yield('title') - {{ $setting->name }}">
    <meta property="og:title" content="@yield('title') - {{ $setting->name }}">
    <meta name="twitter:title" content="@yield('title') - {{ $setting->name }}">
    <meta property="og:url" content="{{ Request::url() }}">
    
    
    <meta name="description" content="{{ $setting->description }}">
    <meta name="keyword" content="{{ $setting->seo_keyword }}">

    <!-- Google / Search Engine Tags -->
    <meta itemprop="description" content="{{ $tags['description'] ?? $setting->description }}">
    <meta itemprop="image" content="{{ asset('storage') }}/{{ $tags['image'] ?? $setting->image}}">

    <!-- Facebook Meta Tags -->

    <meta property="og:url" content="{{route('index')}}">
    <meta property="og:type" content="website">
    <meta property="og:title" content="{{$tags['title'] ?? $setting->name}}">
    <meta property="og:description" content="{{ $tags['description'] ?? $setting->description }}">
    <meta property="og:image" content="{{ asset('storage') }}/{{ $tags['image'] ?? $setting->image}}?time=1656324492">

    <!-- Twitter Meta Tags -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:description" content="{{ $tags['description'] ?? $setting->description }}">
    <meta name="twitter:image" content="{{ asset('storage') }}/{{ $tags['image'] ?? $setting->image}}">

    {{-- <meta property="og:updated_time" content="1440432930" /> --}}


    <title>@yield('title') - {{ $setting->name }}</title>
    <link rel="shortcut icon" href="{{ asset('images/logo-felicity.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main-mobile.css') }}" />
    <link rel="stylesheet" href="{{asset('plugins/magnific-popup/dist/magnific-popup.css')}}">
    @yield('css')
    <script>
        const base_url = "{{ url('') }}";
        const token = "{{ csrf_token() }}";
    </script>
</head>

<body>
    @php
        if(isset($background)){
            $b = $background;
        }else{
            $b = "body-bg-repeat.jpg";
        }
    @endphp
    <style>
        input,textarea, select{
            color: white!important;
            background: transparent!important
        }
        input:focus, textarea:focus, select:focus{
            background: rgba(0, 0, 0, 0.45)!important;
        }
        .btn-primary.disabled, .btn-primary:disabled{
            background-color: #CC6500 
        }

        .btn-primary:hover{
            background-color: #cc6600c9
        }
        body{
            background-image: url('{{asset("images")}}/{{$b}}');
        }
    </style>

    <div id="wrap">
        <header class="header" id="header">
            <div class="container">
                <div class="header_top">
                    <div class="row">
                        <div class="col-md-3"><a class="header_logo" href="{{ route('index') }}"><img
                                    src="{{ asset('images/logo-felicity.png') }}" /></a></div>
                        <div class="col-md-6">
                            <div class="header_search">
                                <form action="{{route('search')}}">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="keyword"
                                            placeholder="search" />
                                        <button type="submit"><img src="{{ asset('images/ic-search.svg') }}"
                                                alt="ic-search" class="ml-2" /></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="header_right align-items-center">
                                <div class="header_right-icon"><a href="{{ route('contact') }}">
                                        <img src="{{ asset('images/ic-call.svg') }}" alt="icon" /></a></div>
                                <div class="header_right-currency">
                                    <select class="select">
                                        <option value="USD">USD</option>
                                        <option value="IDR">IDR</option>
                                    </select>
                                </div>
                                <div class="header_right-icon"><a href="{{ route('cart') }}">
                                        <img src="{{ asset('images/ic-cart.svg') }}" alt="icon" /></a></div>
                                <div class="header_right-icon">
                                    @if (Auth::guard('user')->user())
                                        <ul class="menu-wrap align-items-center">
                                            <li class="has-sub pb-0">
                                                <a href="#">
                                                    <img src="{{ asset('images/ic-user.svg') }}" alt="icon" />
                                                </a>
                                                <div class="submenu">
                                                    <ul>
                                                        <li><a href="{{route('account-page')}}">Profile</a></li>
                                                        <li><a href="#" onclick="logout()">Logout</a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                        </ul>
                                    @else
                                        <a href="{{ route('sign-in') }}"
                                            class="py-1 px-3 text-light border border-light bg-transparent">
                                            Login</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header_menu">
                    <ul class="menu-wrap">
                        <li class="has-sub position-relative"><a href="#">Browse by Category</a>
                            <div class="submenu">
                                <?php $categories = \App\Category::orderBy('id', 'ASC')->get();?>
                                <ul>
                                    <li class="more-guitars d-flex pb-md-3">
                                        <a href="#"><span class="mr-4">Guitars</span><span class="iconify text-white" data-icon="ant-design:caret-right-filled"></span>
                                        </a>
                                        <div class="multi-sub position-absolute" >
                                            <div class="sub-multi">
                                                <ul>
                                                    @foreach ($categories as $c)
                                                        <li><a href="{{route('browse-category')}}?subject=Guitar&ctg={{$c->name}}">{{$c->name}}</a></li>
                                                    @endforeach
                                                    <li><a href="{{route('browse-category')}}?subject=Guitar">All Guitars</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="{{route('browse-category')}}?subject=Amplifiers">Amplifiers</a></li>
                                    <li><a href="{{route('browse-category')}}?subject=Effect Pedals">Effect Pedals</a></li>
                                    <li><a href="{{route('browse-category')}}?subject=Parts-Accessories">Parts / Accessories</a></li>
                                    <li><a href="{{route('browse-category')}}?subject=Vintage Stuff">Vintage Stuff</a></li>
                                    <li><a href="{{route('about-us')}}#service">Luthier Services</a></li>
                                    <li><a href="{{route('browse-category')}}?subject=Merch-Apparel">Merch / Apparel</a></li>
                                    <li><a href="{{route('browse-category')}}?subject=Exotic-Instruments">Exotic Instruments</a></li>
                                    
                                </ul>
                            </div>
                        </li>
                        <li class="has-sub position-relative"><a href="#">Browse by Brand</a>
                            <div class="submenu">
                                <?php $brands = \App\Brand::orderBy('id', 'ASC')->get();?>
                                <ul>
                                    @foreach ($brands as $b)
                                        @if ($loop->iteration <= 12)
                                            <li><a href="{{route('browse-brand')}}?brd={{$b->name}}">{{$b->name}}</a></li>
                                        @endif
                                    @endforeach
                                    <li class="more-brand d-flex pt-md-3">
                                        <a href="#">
                                            <span>More Brands</span><span class="iconify text-white" data-icon="ant-design:caret-right-filled"></span>
                                        </a>
                                        <div class="multi-sub-2 position-absolute" >
                                            <div class="sub-multi">
                                                <ul>
                                                    @foreach ($brands as $b)
                                                        @if ($loop->iteration > 12)
                                                            <li class="{{($loop->iteration > 17) ?? 'mt-3'}}"><a href="{{route('browse-brand')}}?brd={{$b->name}}">{{$b->name}}</a></li>
                                                        @endif
                                                    @endforeach
                                                    <li>
                                                        
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="{{ route('private-vault') }}">Private Vault</a></li>
                        <li><a href="{{ route('user.trade') }}">Sell & Trade</a></li>
                        <li><a href="{{ route('about-us') }}">About Us</a></li>
                        
                    </ul>
                </div>
                <div class="mobile-menu"><span></span><span></span><span></span></div>

            </div>
        </header>
        <main>

            @yield('content')
        </main>
        <footer class="footer" id="footer">
            <div class="footer_top">
                <div class="container">
                    <div class="footer_wrap">
                        <div class="row">
                            <div class="col-md-5 left">
                                <div class="footer_menu">
                                    <ul>
                                        <li><a href="#">Home</a></li>
                                        <li><a href="#">Search</a></li>
                                        <li><a href="#">Privacy Policy</a></li>
                                        <li><a href="#">Terms of Service</a></li>
                                    </ul>
                                </div>
                                <div class="footer_contact">
                                    <h4>Contact</h4>
                                    <address>Addres: Lörem ipsum fagen oktigt. Mynar kemkastrering. Salönade pånade,
                                        till fösona för att
                                        po</address>
                                    <div class="email"><span>Email <a
                                                href="mailto:email@email.com">email@email.com</a></span></div>
                                </div>
                            </div>
                            <div class="col-md-7 right">
                                <div class="footer_subs">
                                    <p>Sign Up to Get Special Discounts and <br>Once-in-a-lifetime Deals</p>
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="enter your email" />
                                    </div>
                                </div>
                                <div class="footer_logo"><a href="/"><img
                                            src="{{asset('images/logo-footer-felicity.png')}}" alt="logo-footer" /></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="container">
                    <p>Serving Guitra Enthusiasts and Musicians Worldwide | © 2021. Felicitys-Guitars.com - All Rights
                        Reserved
                    </p>
                </div>
            </div>
            <form action="{{route('user.logout')}}" method="POST" id="formLogout">
                @csrf
                @method('PATCH')
            </form>
        </footer>
    </div>

    <script src="{{ asset('plugins/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('plugins/lity/lity.min.js') }}"></script>
    <script src="{{ asset('plugins/autosize/autosize.min.js') }}"></script>
    <script src="{{asset('plugins/magnific-popup/dist/jquery.magnific-popup.js')}}"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.13/dist/sweetalert2.all.min.js"></script>
    @yield('js')
    <script src="{{ asset('js/mainJs.js') }}"></script>
    @if (session()->has('message'))
    <script>
        var type = "{{session()->get('message')['status']}}"
        if(type == 'success'){
            var title = 'Well Done...'
        }else{
            var title = "Oops..."
        }
        setTimeout(() => {
            Swal.fire({
                icon: type,
                title: title,
                text: "{{session()->get('message')['text']}}",
            })
        }, 1000);
    </script>
    @endif
    <script>
         $('.number').on('keyup', function(){
            var value = $(this).val().replace(/[^,\d]/g, '')
            $(this).val(value)
        })
        function logout(){
            $('#formLogout').submit()
        }
        $('.mobile-menu').click(function(){
            $('body').toggleClass('menu-open')
        })

        // $('.more-brand').click(function(){
        //     $('.multi-sub').toggleClass('open')
        // })
        // $('.more-guitars').click(function(){
        //     $('.multi-sub-2').toggleClass('open')
        // })

        // // $('#wrap').mouseenter(function(){
        // //     $('.multi-sub').removeClass('open')
        // //     console.log($('.multi-sub'));
        // // })
        
    </script>
</body>

</html>
