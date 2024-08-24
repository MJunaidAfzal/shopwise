<!-- START HEADER -->
<header class="header_wrap fixed-top header_with_topbar">
	<div class="top-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                	<div class="d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="lng_dropdown me-2">
                            <select name="countries" class="custome_select">
                                <option value='en' data-image="{{asset('assets/images/eng.png')}}" data-title="English">English</option>
                                <option value='fn' data-image="{{asset('assets/images/fn.png')}}" data-title="France">France</option>
                                <option value='us' data-image="{{asset('assets/images/us.png')}}" data-title="United States">United States</option>
                            </select>
                        </div>
                        <div class="me-3">
                            <select name="countries" class="custome_select">
                                <option value='USD' data-title="USD">USD</option>
                                <option value='EUR' data-title="EUR">EUR</option>
                                <option value='GBR' data-title="GBR">GBR</option>
                            </select>
                        </div>
                     <a href="{{ route('contact-us') }}">
                        <ul class="contact_detail text-center text-lg-start">
                            <li><i class="ti-mobile"></i><span>123-456-7890</span></li>
                        </ul>
                     </a>
                    </div>
                </div>
                <div class="col-md-6">
                	<div class="text-center text-md-end">
                       	<ul class="header_list">
                        @auth
                        {{-- <li><a href="compare.html"><i class="ti-control-shuffle"></i><span>Compare</span></a></li> --}}
                        {{-- <li><a href="{{ route('pages.wishlist') }}"><i class="ti-heart"></i><span>Wishlist</span></a></li> --}}
                        <li><span>Welcome to Shopwise !
                            @if(auth()->user()->type == 'user')
                            <a href="{{ route('user.dashboard') }}">  <i class="ti-user"></i>{{ auth()->user()->name }}</a>
                             @else
                             <a href="{{ route('reader.dashboard') }}">  <i class="ti-user"></i>{{ auth()->user()->name }}</a>
                             @endif
                        </span>
                        <button href="logout" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="background-color: #ff324d;color:white;border-radius:10px;padding:5px;margin-left:10px">
                            <i style="margin-left: 5px" class="fa fa-power-off"></i>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                             </form></li>

                        @endauth
                        @guest

                        <li><a href="{{ route('login') }}"><i class="ti-user"></i><span>Login</span></a></li> |
                        <li style="margin-left: 10px"><a href="{{ route('register') }}"><i class="ti-user"></i><span>Register</span></a></li>
                        @endguest
						</ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_header dark_skin main_menu_uppercase">
    	<div class="container">
            <nav class="navbar navbar-expand-lg">
                <a class="navbar-brand" href="{{ route('pages.index') }}">
                    {{-- <img class="logo_light" src="{{asset('assets/images/logo_light.png')}}" alt="logo"> --}}
                    @if(!empty(settings()->header))
                    <img class="logo_dark" src="{{asset('upload/setting/'.settings()->header)}}" alt="logo">
                    @else
                    <img class="logo_dark" src="{{asset('assets/images/logo_dark.png')}}" alt="logo">
                    @endif
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-expanded="false">
                    <span class="ion-android-menu"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link"  href="{{ route('pages.index') }}">Home</a>
                        </li>
                        <li class="dropdown">
                            <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu">
                                <ul>
                                    {{-- @foreach ($pages as $page)
                                            <li><a class="dropdown-item nav-link nav_item" href="{{ route('pages',$page->slug) }}">{{ $page->title }}</a></li>
                                        @endforeach --}}
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('about-us') }}">About us</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('contact-us') }}">Contact us</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('faq') }}">Faq</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('login') }}">Login</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('register') }}">Register</a></li>
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('terms') }}">Terms and conditions</a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="nav-item">
                            <li class="dropdown">
                                <a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">Categories</a>
                                <div class="dropdown-menu">
                                    <ul>
                                        @foreach (categories() as $index=>$category)
                                        <li><a class="dropdown-item nav-link nav_item" href="{{ route('categorywise.product',$category->slug) }}">{{ $category->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </li>

                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('blogs') }}">Blog</a>
                        </li>
                        <li class="dropdown dropdown-mega-menu">
                            <a class=" nav-link" href="{{ route('pages.shop') }}">Shop</a>

                        </li>
                        <li><a class="nav-link nav_item" href="{{ route('contact-us') }}">Contact Us</a></li>
                    </ul>
                </div>
                <ul class="navbar-nav attr-nav align-items-center">

                    <li class="nav-item cart_dropdown"><a class="nav-link cart_trigger" href="{{ route('pages.wishlist') }}"><i class="ti-heart"></i>
                        {{-- <span class="cart_count cart-count">2</span> --}}
                    </a>
                        <li class="nav-item cart_dropdown"><a class="nav-link cart_trigger" href="{{ route('pages.cart') }}"><i class="linearicons-cart"></i>
                        {{-- <span class="wishlist_count wishlist-count">2</span> --}}
                    </a>
                        {{-- <div class="cart_box dropdown-menu dropdown-menu-right">
                            <ul class="cart_list">
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="{{asset('assets/images/cart_thamb1.jpg')}}" alt="cart_thumb1">Variable product 001</a>
                                    <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00</span>
                                </li>
                                <li>
                                    <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                    <a href="#"><img src="{{asset('assets/images/cart_thamb2.jpg')}}" alt="cart_thumb2">Ornare sed consequat</a>
                                    <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>81.00</span>
                                </li>
                            </ul>
                            <div class="cart_footer">
                                <p class="cart_total"><strong>Subtotal:</strong> <span class="cart_price"> <span class="price_symbole">$</span></span>159.00</p>
                                <p class="cart_buttons"><a href="#" class="btn btn-fill-line rounded-0 view-cart">View Cart</a><a href="#" class="btn btn-fill-out rounded-0 checkout">Checkout</a></p>
                            </div>
                        </div> --}}
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- END HEADER -->
