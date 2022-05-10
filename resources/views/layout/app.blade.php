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
    @yield('meta')
    <title>@yield('title') - {{ $setting->name }}</title>
    <link rel="shortcut icon" href="{{ asset('images/logo-felicity.png') }}" />
    <link rel="stylesheet" href="{{ asset('css/plugins.css') }}" />
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/main.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />

    @yield('css')
    <script>
        const base_url = "{{ url('') }}";
        const token = "{{ csrf_token() }}";
    </script>
</head>

<body>

    <div id="wrap">
        <header class="header" id="header">
            <div class="container">
                <div class="header_top">
                    <div class="row">
                        <div class="col-md-3"><a class="header_logo" href="{{ route('index') }}"><img
                                    src="{{ asset('images/logo-felicity.png') }}" /></a></div>
                        <div class="col-md-6">
                            <div class="header_search">
                                <form action="#">
                                    <div class="form-group">
                                        <input class="form-control" type="text" name="header_search"
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
                                    @if (Auth::user())
                                        <a href="{{ route('account-page') }}">
                                            <img src="{{ asset('images/ic-user.svg') }}" alt="icon" />
                                        </a>
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
                        <li class="has-sub"><a href="#">Browse by Category</a>
                            <div class="submenu">
                                <ul>
                                    <li><a href="#">All Guitars</a></li>
                                    <li><a href="#">Electric Guitars</a></li>
                                    <li><a href="#">Accoustic Guitars</a></li>
                                    <li><a href="#">Amplifiers</a></li>
                                    <li><a href="#">Pedals</a></li>
                                    <li><a href="#">Accessories</a></li>
                                    <li><a href="#">Merchandise</a></li>
                                    <li><a href="#">Local Instruments</a></li>
                                </ul>
                            </div>
                        </li>
                        <li><a href="{{ route('browse-brand') }}">Browse by Brand</a></li>
                        <li><a href="{{ route('private-vault') }}">Private Vault</a></li>
                        <li><a href="{{ route('trade') }}">Sell & Trade</a></li>
                        <li><a href="{{ route('about-us') }}">About Us</a></li>
                        <li><a href="{{ route('registration') }}">Registration</a></li>
                    </ul>
                </div>
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
                                <div class="footer_logo"><a href="index.html"><img
                                            src="images/logo-footer-felicity.png" alt="logo-footer" /></a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="footer_bottom">
                <div class="container">
                    <p>Serving Guitra Enthusiasts and Musicians Worldwide | © 2022. felicitys-guitars.com - All Rights
                        Reserved
                    </p>
                </div>
            </div>
        </footer>
    </div>

    <script src="{{ asset('plugins/jquery/jquery-3.4.1.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('plugins/owl.carousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-select/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('plugins/lity/lity.min.js') }}"></script>
    <script src="{{ asset('plugins/autosize/autosize.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://code.iconify.design/2/2.2.1/iconify.min.js"></script>

    @yield('js')
</body>

</html>
