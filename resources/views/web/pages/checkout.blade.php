@extends('layouts.scaffold')
@push('title')
{{ $title ?? '' }}
@endpush
@section('content')


<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Checkout</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pages.checkout') }}">Checkout</a></li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION SHOP -->
<div class="section">
	<div class="container">
        <div class="row">
            <div class="col-lg-6">
            	<div class="toggle_info">
                	<span><i class="fas fa-user"></i>Returning customer? <a href="#loginform" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here to login</a></span>
                </div>
                <div class="panel-collapse collapse login_form" id="loginform">
                    <div class="panel-body">
                    	<p>If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing &amp; Shipping section.</p>
                    	<form method="post">
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" name="email" placeholder="Username Or Email">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" type="password" name="password" placeholder="Password">
                            </div>
                            <div class="login_footer form-group mb-3">
                                <div class="chek-form">
                                    <div class="custome-checkbox">
                                        <input class="form-check-input" type="checkbox" name="checkbox" id="remember" value="">
                                        <label class="form-check-label" for="remember"><span>Remember me</span></label>
                                    </div>
                                </div>
                                <a href="#">Forgot password?</a>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" class="btn btn-fill-out btn-block" name="login">Log in</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
            	<div class="toggle_info">
            		<span><i class="fas fa-tag"></i>Have a coupon? <a href="#coupon" data-bs-toggle="collapse" class="collapsed" aria-expanded="false">Click here to enter your code</a></span>
                </div>
                <div class="panel-collapse collapse coupon_form" id="coupon">
                    <div class="panel-body">
                    	<p>If you have a coupon code, please apply it below.</p>
                        <div class="coupon field_form input-group">
                            <input type="text" value="" class="form-control" placeholder="Enter Coupon Code..">
                            <div class="input-group-append">
                                <button class="btn btn-fill-out btn-sm" type="submit">Apply Coupon</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
            	<div class="medium_divider"></div>
            	<div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
            	<div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-md-6">
            	<div class="heading_s1">
            		<h4>Billing Details</h4>
                </div>
                <form action="{{ route('place-order') }}" method="POST">
                    @csrf
                    {{-- <input type="hidden" name="user_id" value="{{ auth()->user()->id }}"> --}}
                    <div class="form-group mb-3">
                        <input type="text" value="{{ auth()->user()->first_name }}" class="form-control" name="first_name" placeholder="First name *">
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" value="{{ auth()->user()->last_name }}" class="form-control" name="last_name" placeholder="Last name *">
                    </div>
                    <div class="form-group mb-3">
                        <input class="form-control" value="{{ auth()->user()->country }}" type="text" name="country" placeholder="Country Name">
                    </div>

                    <div class="form-group mb-3">
                        <input type="text" value="{{ auth()->user()->address }}" class="form-control" name="address" placeholder="Address *">
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" value="{{ auth()->user()->address2 }}" class="form-control" name="address2" placeholder="Address line2">
                    </div>
                    <div class="form-group mb-3">
                        <input value="{{ auth()->user()->city }}" class="form-control" type="text" name="city" placeholder="City *">
                    </div>
                    <div class="form-group mb-3">
                        <input class="form-control" value="{{ auth()->user()->state }}" type="text" name="state" placeholder="State *">
                    </div>
                    <div class="form-group mb-3">
                        <input class="form-control" value="{{ auth()->user()->pincode }}" type="text" name="pincode" placeholder="Postcode / ZIP *">
                    </div>
                    <div class="form-group mb-3">
                        <input class="form-control" value="{{ auth()->user()->phone }}" type="text" name="phone" placeholder="Phone *">
                    </div>
                    <div class="form-group mb-3">
                        <input class="form-control" value="{{ auth()->user()->email }}" type="text" name="email" placeholder="Email address *">
                    </div>
                      <div class="heading_s1">
                        <h4>Additional information</h4>
                    </div>
                    <div class="form-group mb-0">
                        <textarea rows="5" name="message" class="form-control" placeholder="Order notes"></textarea>
                    </div>
            </div>
            <div class="col-md-6">
                <div class="order_review">
                    <div class="heading_s1">
                        <h4>Your Orders</h4>
                    </div>
                    <div class="table-responsive order_table">
                     @if($cartsItem->count() > 0)
                     <table class="table">
                        <thead>
                            <tr>
                                <th>Product</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php $total = 0; @endphp
                          @forelse ($cartsItem as $item)
                          <tr>
                            <td>{{ $item->products->title }}<span class="product-qty"> x {{ $item->prod_qty }}</span></td>
                            <td>${{ $item->products->price }}</td>
                        </tr>
                        @php $total += $item->products->price * $item->prod_qty; @endphp
                          @empty

                          @endforelse
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>SubTotal</th>
                                <td class="product-subtotal">${{ $total }}</td>
                            </tr>
                            <tr>
                                <th>Shipping</th>
                                <td>Free Shipping</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td class="product-subtotal">${{ $total }}</td>
                                <input type="hidden" name="total_price" value="{{ $total }}">
                            </tr>
                        </tfoot>
                    </table>
                    <button type="submit" class="btn btn-fill-out btn-block">Place Order</button>

                     @else
                    <b class="text-center" style="font-size:25px">No Products in Cart</b>
                     @endif
                    </div>

                </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<div class="section bg_default small_pt small_pb">
	<div class="container">
    	<div class="row align-items-center">
            <div class="col-md-6">
                <div class="heading_s1 mb-md-0 heading_light">
                    <h3>Subscribe Our Newsletter</h3>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form">
                    <form>
                        <input type="text" class="form-control rounded-0" placeholder="Enter Email Address">
                        <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Subscribe</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->




@endsection
