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
            		<h1>Wishlist</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pages.wishlist') }}">Wishlist</a></li>
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
            <div class="col-12">
                <div class="table-responsive wishlist_table">
                	<table class="table">
                    	<thead>
                        	<tr>
                                <th class="product-img">Product</th>
                                <th class="product-name">Title</th>
                                <th class="product-price">Price</th>
                                <th class="product-remove">Remove</th>
                            </tr>
                        </thead>
                       @if($favourites->count() > 0)
                       <tbody>
                        @forelse ($favourites as $item)
                        <tr>
                          <td class="product-thumbnail"><a href="{{ route('product.detail',$item->product->slug) }}"><img height="100px" width="80px" src="{{asset('upload/product_images/'.mainImage($item->product->id))}}" alt="product3"></a></td>
                          <td class="product-name" data-title="Product"><a href="{{ route('product.detail',$item->product->slug) }}">{{ $item->product->title }}</a></td>
                          <td class="product-price" data-title="Price">${{ $item->product->price }}</td>
                          <td class="product-remove" data-title="Remove">
                              <form action="{{ route('product.destroy',$item->id) }}" method="POST" style="display:inline;">
                               @csrf
                                   @method('DELETE')
                                   <button type="submit" style="border: none; background-color: transparent;" onclick="return confirm('Are you sure you want to delete this product from wishlist?')"><i class="ti-close"></i></button>
                           </form>
                           </td>
                      </tr>
                        @empty
                      Your Wish List is Empty
                        @endforelse
                      </tbody>
                       @else
                       <td style="font-size:25px;" colspan="6">Your Wishlist is Empty
                        <br>
                        <a href="{{ route('pages.shop') }}" class="btn btn-fill-out btn-sm">Continue Shopping</a>
                    </td>
                       @endif
                    </table>
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
                        <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
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
