<!-- START FOOTER -->
<footer class="footer_dark">
	<div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12">
                	<div class="widget">
                        <div class="footer_logo">
                            <a href="{{ route('pages.index') }}">
                            @if(!empty(settings()->footer))
                            <img src="{{asset('upload/setting/'.settings()->footer)}}" alt="logo">
                            @else
                            <img src="{{asset('assets/images/logo_light.png')}}" alt="logo">
                            @endif
                            </a>
                        </div>
                        <p>If you are going to use of Lorem Ipsum need to be sure there isn't hidden of text</p>
                    </div>
                  <div class="widget">
                    <ul class="social_icons social_white">
                        <li><a href="{{ settings()->facebook }}"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="{{ settings()->twitter }}}"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="{{ settings()->google }}"><i class="ion-social-googleplus"></i></a></li>
                        <li><a href="{{ settings()->youtube }}"><i class="ion-social-youtube-outline"></i></a></li>
                        <li><a href="{{ settings()->instagram }}"><i class="ion-social-instagram-outline"></i></a></li>
                    </ul>
                </div>
        		</div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Useful Links</h6>
                        <ul class="widget_links">
                            {{-- @foreach ($pages as $page)
                                            <li><a href="{{ route('pages',$page->slug) }}">{{ $page->title }}</a></li>
                                        @endforeach --}}
                                        <li><a href="{{ route('about-us') }}">About us</a></li>
                                        <li><a href="{{ route('contact-us') }}">Contact us</a></li>
                                        <li><a href="{{ route('faq') }}">Faq</a></li>
                                        <li><a href="{{ route('terms') }}">Terms and conditions</a></li>
                                        <li><a href="{{ route('contact-us') }}">Contact</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-3 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">Category</h6>
                        <ul class="widget_links">
                            @forelse (categories() as $index=>$category)
                            <li><a href="{{ route('categorywise.product',$category->slug) }}">{{ $category->name }}</a></li>
                            @empty
                            <b>Category Not Added!</b>
                            @endforelse
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6">
                	<div class="widget">
                        <h6 class="widget_title">My Account</h6>
                        <ul class="widget_links">
                            <li><a href="#">My Account</a></li>
                            <li><a href="#">Discount</a></li>
                            <li><a href="#">Returns</a></li>
                            <li><a href="#">Orders History</a></li>
                            <li><a href="#">Order Tracking</a></li>
                        </ul>
                    </div>
                </div>
           <div class="col-lg-3 col-md-4 col-sm-6">
            <div class="widget">
                <h6 class="widget_title">Contact Info</h6>
                <ul class="contact_info contact_info_light">
                    <li>
                        <i class="ti-location-pin"></i>
                        <p>{{ settings()->address }}</p>
                    </li>
                    <li>
                        <i class="ti-email"></i>
                        <a href="{{ settings()->email }}">{{ settings()->email }}</a>
                    </li>
                    <li>
                        <i class="ti-mobile"></i>
                        <p>+ {{ settings()->phone }}</p>
                    </li>
                </ul>
            </div>
        </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-md-0 text-center text-md-start">© 2020 All Rights Reserved by Bestwebcreator</p>
                </div>
                <div class="col-md-6">
                    <ul class="footer_payment text-center text-lg-end">
                        <li><a href="#"><img src="{{asset('assets/images/visa.png')}}" alt="visa"></a></li>
                        <li><a href="#"><img src="{{asset('assets/images/discover.png')}}" alt="discover"></a></li>
                        <li><a href="#"><img src="{{asset('assets/images/master_card.png')}}" alt="master_card"></a></li>
                        <li><a href="#"><img src="{{asset('assets/images/paypal.png')}}" alt="paypal"></a></li>
                        <li><a href="#"><img src="{{asset('assets/images/amarican_express.png')}}" alt="amarican_express"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->
