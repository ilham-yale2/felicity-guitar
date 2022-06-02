<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">
        <div class="shadow-bottom"></div>

        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu">
                <a href="/dashboard" aria-expanded="false" class="dropdown-toggle" {!! $menu == 'dashboard' ? 'data-active="true"' : '' !!}>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Dashboard</span>
                    </div>
                </a>
            </li>

            <li class="menu">
                <a href="#category" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
                    {!! $menu == 'category' ? 'data-active="true"' : '' !!}>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-file-text">
                            <path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path>
                            <polyline points="14 2 14 8 20 8"></polyline>
                            <line x1="16" y1="13" x2="8" y2="13"></line>
                            <line x1="16" y1="17" x2="8" y2="17"></line>
                            <polyline points="10 9 9 9 8 9"></polyline>
                        </svg>
                        <span>Category</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="{{ $menu == 'category' ? '' : 'collapse' }} submenu list-unstyled" id="category"
                    data-parent="#accordionExample">
                    <li>
                        <a href="{{route('category.index')}}">list Category </a>
                        <a href="{{route('category.create')}}">Add Category </a>
                    </li>
                </ul>
            </li>
            
            <li class="menu">
                <a href="#brand" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
                    {!! $menu == 'brand' ? 'data-active="true"' : '' !!}>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-box">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span>Brand</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="{{ $menu == 'brand' ? '' : 'collapse' }} submenu list-unstyled" id="brand"
                    data-parent="#accordionExample">
                    <li>
                        <a href="{{route('brand.index')}}"> List Brand </a>
                        <a href="{{route('brand.create')}}"> Add Brand </a>
                    </li>
                </ul>
            </li>
            <li class="menu">
                <a href="#product" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
                    {!! $menu == 'product' ? 'data-active="true"' : '' !!}>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-box">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span>Produk</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="{{ $menu == 'product' ? '' : 'collapse' }} submenu list-unstyled" id="product"
                    data-parent="#accordionExample">
                    <li>
                        <a href="{{route('product.index')}}"> List Produk </a>
                        <a href="{{route('product.create')}}"> Add Produk </a>
                    </li>
                </ul>
            </li>
            <li class="menu">
                <a href="#vault" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
                    {!! $menu == 'vault' ? 'data-active="true"' : '' !!}>
                    <div class="">
                        <span class="iconify" data-icon="ph:vault-bold"></span>
                        <span>Private Vault</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="{{ $menu == 'vault' ? '' : 'collapse' }} submenu list-unstyled" id="vault"
                    data-parent="#accordionExample">
                    <li>
                        <a href="{{route('vault.index')}}"> List Produk </a>
                        <a href="{{route('vault.create')}}"> Add Produk </a>
                    </li>
                </ul>
            </li>
            <li class="menu">
                <a href="#user" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"
                    {!! $menu == 'user' ? 'data-active="true"' : '' !!}>
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                            <circle cx="9" cy="7" r="4"></circle>
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                            <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                        </svg>
                        <span>User</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                            class="feather feather-chevron-right">
                            <polyline points="9 18 15 12 9 6"></polyline>
                        </svg>
                    </div>
                </a>
                <ul class="{{ $menu == 'user' ? '' : 'collapse' }} submenu list-unstyled" id="user"
                    data-parent="#accordionExample">
                    <li>
                        <a href="{{route('user.index')}}"> List User </a>
                    </li>
                </ul>
            </li>
            <li class="menu">
                <a href="{{route('trade.index')}}" aria-expanded="false" class="dropdown-toggle" {!! $menu == 'trade' ? 'data-active="true"' : '' !!}>
                    <div class="">
                        <span class="iconify" data-icon="ic:twotone-sell"></span>
                        <span>Sell & Trade</span>
                    </div>
                </a>
            </li>
            {{-- <li class="menu">
                <a href="{{route('transaction.index')}}" aria-expanded="false" class="dropdown-toggle" {!! $menu == 'partner' ? 'data-active="true"' : '' !!}>
                    <div class="">
                        <span class="iconify" data-icon="fluent:money-16-regular"></span>
                        <span>Transactions</span>
                    </div>
                </a>
            </li> --}}
            <li class="menu">
                <a href="{{route('partner.index')}}" aria-expanded="false" class="dropdown-toggle" {!! $menu == 'partner' ? 'data-active="true"' : '' !!}>
                    <div class="">
                        <span class="iconify" data-icon="ic:twotone-handshake"></span>
                        <span>Bussiness Friend</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{route('user-contact.index')}}" aria-expanded="false" class="dropdown-toggle" {!! $menu == 'contact' ? 'data-active="true"' : '' !!}>
                    <div class="">
                        <span class="iconify" data-icon="bi:inbox-fill"></span>
                        <span>User Mail</span>
                    </div>
                </a>
            </li>
            <li class="menu">
                <a href="{{route('setting.index')}}" aria-expanded="false" class="dropdown-toggle" {!! $menu == 'setting' ? 'data-active="true"' : '' !!}>
                    <div class="">
                        <span class="iconify" data-icon="icon-park-twotone:setting-two"></span>
                        <span>Setting</span>
                    </div>
                </a>
            </li>
           
        </ul>

    </nav>

</div>
