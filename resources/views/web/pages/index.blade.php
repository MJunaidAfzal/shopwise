@extends('layouts.scaffold')
@push('title')
{{ $title ?? '' }}
@endpush
@section('content')

{{-- <!-- LOADER -->
<div class="preloader">
    <div class="lds-ellipsis">
        <span></span>
        <span></span>
        <span></span>
    </div>
</div>
<!-- END LOADER --> --}}




<!-- START SECTION BANNER -->
<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-bs-ride="carousel">
        <div class="carousel-inner">

          @forelse ($sliders as $item)
          <div class="carousel-item active background_bg" data-img-src="{{asset('upload/slider/'.$item->image)}}">
            <div class="banner_slide_content">
                <div class="container"><!-- STRART CONTAINER -->
                    <div class="row">
                        <div class="col-lg-7 col-9">
                            <div class="banner_content overflow-hidden">
                                <h5 class="mb-3 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="0.5s">{{ $item->detail }}</h5>
                                <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="1s">{{ $item->name }}</h2>
                                <a class="btn btn-fill-out rounded-0 staggered-animation text-uppercase" href="{{ $item->link }}" data-animation="slideInLeft" data-animation-delay="1.5s">{{ $item->button_name }}</a>
                            </div>
                        </div>
                    </div>
                </div><!-- END CONTAINER-->
            </div>
        </div>
          @empty
        Slider Not Added!
          @endforelse

        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER -->

<!-- END MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION BANNER -->
<div class="section pb_20">
	<div class="container">
    	<div class="row">

            @forelse ($banners as $banner)
            <div class="col-md-6">
            	<div class="single_banner">
                	<img src="{{asset('upload/banner/'.$banner->image)}}" alt="shop_banner_img1">
                    <div class="single_banner_info">
                        <h5 class="single_bn_title1">{{ $banner->detail }}</h5>
                        <h3 class="single_bn_title">{{ $banner->name }}</h3>
                        <a href="{{ $banner->link }}" class="single_bn_link">{{ $banner->button_name }}</a>
                    </div>
                </div>
            </div>
            @empty
            Banner Not Added!
            @endforelse

        </div>
    </div>
</div>
<!-- END SECTION BANNER -->

<!-- START SECTION SHOP -->
<div class="section small_pt pb_70">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-6">
            	<div class="heading_s1 text-center">
                	<h2>Exclusive Products</h2>
                </div>
            </div>
		</div>
        <div class="row">
        	<div class="col-12">
            	<div class="tab-style1">
                    <ul class="nav nav-tabs justify-content-center" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="arrival-tab" data-bs-toggle="tab" href="#arrival" role="tab" aria-controls="arrival" aria-selected="true">wival</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="sellers-tab" data-bs-toggle="tab" href="#sellers" role="tab" aria-controls="sellers" aria-selected="false">Best Sellers</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="featured-tab" data-bs-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="false">Featured</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="special-tab" data-bs-toggle="tab" href="#special" role="tab" aria-controls="special" aria-selected="false">Special Offer
</a>
                        </li>
                    </ul>
                </div>
                <div class="tab-content">
                	<div class="tab-pane fade show active" id="arrival" role="tabpanel" aria-labelledby="arrival-tab">
                        <div class="row shop_container">
                            @forelse ($products as $product)
                           @include('web.product.components.product')
                            @empty
                        <b>Product Not Found!</b>
                            @endforelse
                        </div>
                    </div>
                    <div class="tab-pane fade" id="sellers" role="tabpanel" aria-labelledby="sellers-tab">
                        <div class="row shop_container">
                           @forelse ($bestSellers as $product)
                           @include('web.product.components.product')
                           @empty
                           <b>Product Not Found!</b>
                           @endforelse

                        </div>
                    </div>
                    <div class="tab-pane fade" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                        <div class="row shop_container">
                           @forelse ($featured as $product)
                           @include('web.product.components.product')
                           @empty
                           <b>Product Not Found!</b>
                           @endforelse

                        </div>
                    </div>
                    <div class="tab-pane fade" id="special" role="tabpanel" aria-labelledby="special-tab">
                        <div class="row shop_container">
                            @forelse ($specialOffers as $product)
                            @include('web.product.components.product')
                            @empty
                            <b>Product Not Found!</b>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SINGLE BANNER -->
<div class="section bg_light_blue2 pb-0 pt-md-0">
	<div class="container">
    	<div class="row align-items-center flex-row-reverse">
            <div class="col-md-6 offset-md-1">
            	<div class="medium_divider d-none d-md-block clearfix"></div>
            	<div class="trand_banner_text text-center text-md-start">
                    <div class="heading_s1 mb-3">
                        <span class="sub_heading">New season trends!</span>
                        <h2>Best Summer Collection</h2>
                    </div>
                    <h5 class="mb-4">Sale Get up to 50% Off</h5>
                    <a href="{{ route('pages.shop') }}" class="btn btn-fill-out rounded-0">Shop Now</a>
                </div>
            	<div class="medium_divider clearfix"></div>
            </div>
            <div class="col-md-5">
                <div class="text-center trading_img">
                    <img src="{{asset('assets/images/tranding_img.png')}}" alt="tranding_img">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SINGLE BANNER -->

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
    	<div class="row justify-content-center">
			<div class="col-md-6">
            	<div class="heading_s1 text-center">
                	<h2>Featured Products</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            	<div class="product_slider carousel_slider owl-carousel owl-theme nav_style1" data-loop="true" data-dots="false" data-nav="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                    @forelse ($featured as $product)
                    <div class="item">
                        <div class="product">
                            <a href="{{ route('product.detail',$product->slug) }}">
                            <div class="product_img">
                                    <img height="300px" width="300px" src="{{asset('upload/product_images/'.mainImage($product->id))}}" alt="product_img1">
                                </div>
                            </a>
                            <div class="product_info">
                                <h6 class="product_title"><a href="{{ route('product.detail',$product->slug) }}">{{ $product->title }}</a></h6>
                                <div class="product_price">
                                    <span class="price">${{ $product->price }}</span>
                                    <del>${{ $product->del_price }}</del>
                                    <div class="on_sale">
                                        <span>{{ $product->discount }}</span>
                                    </div>
                                </div>
                                <div class="rating_wrap">
                                    <div class="rating">
                                        <div class="product_rate" style="width:80%"></div>
                                    </div>
                                    <span class="rating_num">(21)</span>
                                </div>
                                <div class="pr_desc">
                                    <p>{{ $product->detail }}.</p>
                                </div>
                                <div class="pr_switch_wrap">
                                    <div class="product_color_switch">
                                        <span class="active" data-color="#87554B"></span>
                                        <span data-color="#333333"></span>
                                        <span data-color="#DA323F"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <b>Product Not Found!</b>
                    @endforelse

                </div>
            </div>
		</div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION TESTIMONIAL -->
<div class="section bg_redon">
	<div class="container">
    	<div class="row justify-content-center">
        	<div class="col-md-6">
            	<div class="heading_s1 text-center">
                	<h2>Our Client Say!</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9">
            	<div class="testimonial_wrap testimonial_style1 carousel_slider owl-carousel owl-theme nav_style2" data-nav="true" data-dots="false" data-center="true" data-loop="true" data-autoplay="true" data-items='1'>
                	@forelse ($clients as $index=>$item)
                    <div class="testimonial_box">
                    	<div class="testimonial_desc">
                        	<p>{{ $item->message }}.</p>
                        </div>
                        <div class="author_wrap">
                            <div class="author_img">
                                <img src="{{asset('upload/image/'.$item->user->image)}}" alt="user_img1">
                            </div>
                            <div class="author_name">
                                <h6>{{ $item->user->name }}</h6>
                                <span>{{ $item->user->type }}</span>
                            </div>
                        </div>
                    </div>
                    @empty
                    <b>Client not Found!</b>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION TESTIMONIAL -->

<!-- START SECTION SHOP INFO -->
<div class="section pb_70">
    	<div class="container">
            <div class="row g-0">
                <div class="col-lg-4">
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-shipped"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>Free Delivery</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-money-back"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>30 Day Return</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="icon_box icon_box_style1">
                        <div class="icon">
                            <i class="flaticon-support"></i>
                        </div>
                        <div class="icon_box_content">
                            <h5>27/4 Support</h5>
                            <p>If you are going to use of Lorem, you need to be sure there anything</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- END SECTION SHOP INFO -->



</div>
<!-- END MAIN CONTENT -->




@endsection

