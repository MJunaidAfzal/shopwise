@extends('layouts.scaffold')
@push('title')
{{ $title ?? '' }}
@endpush
@push('styles')
<style>
     input.star { display: none; }
    label.star {
      float: right;
      padding: 10px;
      font-size: 20px;
      color: black;
      transition: all .2s;
    }
    input.star:checked ~ label.star:before {
      content: '\f005';
      color: #FD4;
      transition: all .25s;
    }
    input.star-5:checked ~ label.star:before {
        color: #FE7;
        text-shadow: 0 0 10px #952;
    }
    input.star-1:checked ~ label.star:before { color: #F62; }
    label.star:hover { transform: rotate(-15deg) scale(1.3); }
    label.star:before {
      content: '\f006';
      font-family: FontAwesome;
    }
    #social-links ul li{
            display: inline-block;
        }
        #social-links ul li a{
            padding: 20px;
            margin: 2px;
            font-size: 30px;
            color: black;
        }
        #social-links ul li a:hover{
            background-color: black;
            color: white;
        }
</style>
@endpush
@section('content')



<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>{{ $title ?? '' }}</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="">Prodcut Name</a></li>
                    <li class="breadcrumb-item active">{{ $title ?? '' }}</li>
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
            <div class="col-lg-6 col-md-6 mb-4 mb-md-0">
              <div class="product-image vertical_gallery">
                    <div id="pr_item_gallery" class="product_gallery_item slick_slider" data-vertical="true" data-vertical-swiping="true" data-slides-to-show="5" data-slides-to-scroll="1" data-infinite="false">

                        @forelse ($galleries as $gallery)
                    @if($gallery->is_main == 0)
                        <div class="item">
                            <a href="#" class="product_gallery_item" data-image="{{asset('upload/product_images/'.$gallery->image)}}" data-zoom-image="{{asset('assets/images/product_zoom_img4.jpg')}}">
                                <img height="100px" src="{{asset('upload/product_images/'.$gallery->image)}}" alt="product_small_img4">
                            </a>
                        </div>
                        @else
                        @endif
                        @empty
                     Not found image for this product!
                        @endforelse
                    </div>
                    <div class="product_img_box">
                        <img id="product_img" src='{{asset('upload/product_images/'.mainImage($product->id))}}' data-zoom-image="{{asset('upload/product_images/'.mainImage($product->id))}}" alt="product_img1">
                        <a href="#" class="product_img_zoom" title="Zoom">
                            <span class="linearicons-zoom-in"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="pr_detail product_data">
                    <div class="product_description">
                        <h4 class="product_title"><a href="#">{{ $product->title }}</a></h4>
                        <div class="product_price">
                            <span class="price">${{ $product->price }}</span>
                            <del>${{ $product->del_price }}</del>
                            <div class="on_sale">
                                <span>{{ $product->discount }}</span>
                            </div>
                        </div>
                        {{-- <div class="rating_wrap">
                            @php $ratenum = number_format($reviewCount) @endphp
                            @for ($i = 1; $i <= $ratenum; $i++)
                            <i style="color: rgb(255, 144, 0); " class="fa fa-star"></i>
                            @endfor
                            @for ($j = $ratenum+1; $j <= 5; $j++)
                            <i style="" class="fa fa-star"></i>
                            @endfor
                            </div><br><br> --}}
                        <div class="pr_desc mt-5">
                            <p>{{ $product->detail }}.</p>
                        </div>
                        <div class="product_sort_info">
                            <ul>
                                <li><i class="linearicons-shield-check"></i> 1 Year AL Jazeera Brand Warranty</li>
                                <li><i class="linearicons-sync"></i> 30 Day Return Policy</li>
                                <li><i class="linearicons-bag-dollar"></i> Cash on Delivery available</li>
                            </ul>
                        </div>
                        <div class="pr_switch_wrap">
                            <span class="switch_lable">Color</span>
                            <div class="product_color_switch">
                                <b>{{ $product->color }}</b>
                            </div>
                        </div>
                        <div class="pr_switch_wrap">
                            <span class="switch_lable">Size</span>
                          <b>{{ isset($product->size) ? $product->size->size : '-' }}</b>
                        </div>
                    </div>
                    <hr>
                    <div class="cart_extra">
                        <div class="cart-product-quantity">
                            <div class="quantity">
                                <input type="hidden" class="prod_id" value="{{ $product->id }}">
                                <input type="button" value="-" class="minus">
                                <input type="text" name="quantity" value="1" title="Qty" class="qty qty-input" size="4">
                                <input type="button" value="+" class="plus">
                            </div>
                        </div>
                        <div class="cart_btn">
                            <a href="javascript:void(0);"  class="btn btn-fill-out btn-addtocart addtocartBtn" type="button"><i class="icon-basket-loaded"></i> Add to cart</a>
                         <span>
                            @php $countfavourite = 0 @endphp
                            @if (Auth::check())
                                @php
                                    $countfavourite = App\Models\ProductFavourite::countfavourite($product['id']);
                                @endphp
                            @endif
                            <a style="cursor: pointer;"  data-productid="{{ $product->id }}" class="ms-1 update-favourite">
                                @if ($countfavourite > 0)
                                <i style="font-size: 20px;color:red;" class="fa fa-heart"></i><br>
                                @else
                                <i style="font-size: 20px" class="fa fa-heart-o"></i><br>
                                    @endif
                            </a>
                          </span>
                            {{-- <a class="add_wishlist" href="#"><i class="icon-heart"></i></a> --}}
                            {{-- <a class="add_compare" href="#"><i class="icon-shuffle"></i></a> --}}
                        </div>
                    </div>
                    <hr>
                    <ul class="product-meta">
                        <li>SKU: <a href="#">{{ $product->sku }}</a></li>
                        <li>Category: <a href="#">{{ isset($product->category) ? $product->category->name : '-' }}</a></li>
                        <li>Tags: <a href="#" rel="tag">Cloth</a>, <a href="#" rel="tag">printed</a> </li>
                    </ul>

                    <div class="product_share">
                        <span>Share:</span>
                        <ul class="social_icons">
                            <div data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal" style="cursor: pointer;" class="col-md-12 text-center">
                                <span ><i style="font-size: 20px" class="fa fa-share"></i></span><br>
                            </div>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="large_divider clearfix"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="tab-style3">
					<ul class="nav nav-tabs" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="Description-tab" data-bs-toggle="tab" href="#Description" role="tab" aria-controls="Description" aria-selected="true">Description</a>
                      	</li>
                      	<li class="nav-item">
                        	<a class="nav-link" id="Additional-info-tab" data-bs-toggle="tab" href="#Additional-info" role="tab" aria-controls="Additional-info" aria-selected="false">Additional info</a>
                      	</li>
                      	<li class="nav-item">
                        	<a class="nav-link" id="Reviews-tab" data-bs-toggle="tab" href="#Reviews" role="tab" aria-controls="Reviews" aria-selected="false">Reviews ( {{ $review }} )</a>
                      	</li>
                    </ul>
                	<div class="tab-content shop_info_tab">
                      	<div class="tab-pane fade show active" id="Description" role="tabpanel" aria-labelledby="Description-tab">
                        	<p>{!! $product->description !!}.</p>
                      	</div>
                      	<div class="tab-pane fade" id="Additional-info" role="tabpanel" aria-labelledby="Additional-info-tab">
                        	<table class="table table-bordered">
                            	<tr>
                                	<td>Capacity</td>
                                	<td>{{ $product->capacity }}</td>
                            	</tr>
                                <tr>
                                    <td>Color</td>
                                    <td>{{ $product->color }}</td>
                                </tr>
                                <tr>
                                    <td>Water Resistant</td>
                                    <td>{{ $product->water_resistant }}</td>
                                </tr>
                                <tr>
                                    <td>Material</td>
                                    <td>{{ $product->material }}</td>
                                </tr>
                        	</table>
                      	</div>
                      	<div class="tab-pane fade" id="Reviews" role="tabpanel" aria-labelledby="Reviews-tab">
                        	<div class="comments">
                            	<h5 class="product_tab_title"> Review For <span>{{ $product->title }}</span></h5>
                                <ul class="list_none comment_list mt-4">

                                   @forelse ($reviews as $index=>$review)
                                   <li>
                                    <div class="comment_img">
                                        <img src="{{asset('upload/image/'.$review->user->image)}}" alt="user2">
                                    </div>
                                    <div class="comment_block">
                                        <div class="rating_wrap">
                                                    @php $ratenum = number_format($review->reviews) @endphp
                                                    @for ($i = 1; $i <= $ratenum; $i++)
                                                    <i style="color: rgb(255, 144, 0); " class="fa fa-star"></i>
                                                    @endfor
                                                    @for ($j = $ratenum+1; $j <= 5; $j++)
                                                    <i style="" class="fa fa-star"></i>
                                                    @endfor
                                        </div>
                                        <p class="customer_meta">
                                            <span class="review_author">{{ $review->user->name }}</span>
                                            <span class="comment-date">{{ \Carbon\Carbon::parse($review->created_at)->format('M/d/Y') }}</span>
                                        </p>
                                        <div class="description">
                                            <p>{{ $review->message }}</p>
                                        </div>
                                    </div>
                                </li>
                                   @empty
                                Review Not Found!
                                   @endforelse
                                </ul>
                        	</div>
                            <div class="review_form field_form">
                                <h5>Add a review</h5>
                                    <div class="row mt-3">
                                    <div class="form-group col-12 mb-3">
                                        <div class="star_rating">
                                            <form action="{{ route('review.store') }}" method="POST">
                                                @csrf
                                                @if(isset(auth()->user()->id))
                                                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                                                @else
                                                @endif
                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input value="1" class="star star-1" id="star-1" type="radio" name="reviews"/>
                                            <label class="star star-1" for="star-1"></label>
                                            <input value="2" class="star star-2" id="star-2" type="radio" name="reviews"/>
                                            <label class="star star-2" for="star-2"></label>
                                            <input value="3" class="star star-3" id="star-3" type="radio" name="reviews"/>
                                            <label class="star star-3" for="star-3"></label>
                                            <input value="4" class="star star-4" id="star-4" type="radio" name="reviews"/>
                                            <label class="star star-4" for="star-4"></label>
                                            <input value="5" class="star star-5" id="star-5" type="radio" name="reviews"/>
                                            <label class="star star-5" for="star-5"></label>
                                        </div>
                                    </div>
                                    <div class="form-group col-12 mb-3">
                                        <textarea placeholder="Your review *" class="form-control" name="message" rows="4"></textarea>
                                    </div>

                                    <div class="form-group col-12 mb-3">
                                        <button type="submit" class="btn btn-fill-out">Submit Review</button>
                                    </div>
                                </form>

                                </div>
                            </div>
                      	</div>
                	</div>
                </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="small_divider"></div>
            	<div class="divider"></div>
                <div class="medium_divider"></div>
            </div>
        </div>
        <div class="row">
        	<div class="col-12">
            	<div class="heading_s1">
                	<h3>Releted Products</h3>
                </div>
            	<div class="releted_product_slider carousel_slider owl-carousel owl-theme" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "1199":{"items": "4"}}'>
                	@forelse ($relatedProducts as $product)
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
                    <form action="">
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
<div class="modal fade modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        {{-- <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ban and Un Ban User</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div> --}}
        <div class="modal-body mt-3" style="text-align: center;">
            {!! $shareButton !!}
            <div class="container">
                <hr>
                <input  style="width: 80%;" type="text" class="p-2" value="{{ route('product.detail',$product->slug) }}" id="myInput" disabled>
                <button style="height: 43px; margin-bottom: 4px;" class="btn btn-dark btn-sm"  onclick="myFunction()" onmouseout="outFunc()"><i class="fa fa-clipboard"></i></button>
             </div>

        </div>
        {{-- <div class="modal-footer">
          <button class="btn btn-success" type="button" data-bs-dismiss="modal">Close</button>
          <button class="btn btn-primary update_user" type="button">Save changes</button>
        </div> --}}
      </div>
    </div>
</div>






@endsection
@push('scripts')
<script>
    var user_id = "{{ Auth::id() }}";
    $(document).ready(function() {
        $('.update-favourite').click(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var product_id = $(this).data('productid');
            $.ajax({
                type: 'POST',
                url: '{{ route('product.favourite') }}',
                data: {
                    product_id: product_id,
                    user_id: user_id
                },
                beforeSend : function(response){
                $('.loader').show();
                },
                success:function(response){
                    if(response.action == 'add'){
                        $('.loader').hide();
                        $('a[data-productid='+product_id+']').html(`<i style="font-size: 20px;color:red;" class="fa fa-heart"></i><br>`);
                        toastr.success(response.message);
                    } else if (response.action == 'remove') {
                        $('.loader').hide();
                        $('a[data-productid=' + product_id + ']').html(
                            `<i style="font-size: 20px;" class="fa fa-heart-o"></i><br>`);
                        toastr.success(response.message);
                    }
                },
                error:function(response){
                    window.location.href = '{{ route('login') }}';
                }
            });
        });
    });
</script>
<script>
    function myFunction() {
        toastr.success('Text copied');
      var copyText = document.getElementById("myInput");
      copyText.select();
      copyText.setSelectionRange(0, 99999);
      navigator.clipboard.writeText(copyText.value);

      var tooltip = document.getElementById("myTooltip");
      tooltip.innerHTML = "Copied: " + copyText.value;
    }
    </script>
    <script>
        $(document).ready(function (e){
            $('.addtocartBtn').click(function (e){
                e.preventDefault();
                var product_id = $(this).closest('.product_data').find('.prod_id').val();
                var product_qty = $(this).closest('.product_data').find('.qty-input').val();

                $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

                $.ajax({
                    type: 'POST',
                    url: '/add-to-cart',
                    data: {
                    'product_id': product_id,
                    'product_qty': product_qty,
                },
                success:function(response){
                    if(response.action == 'add'){
                        toastr.success(response.message);
                    } else if (response.action == 'added') {
                        toastr.error(response.message);
                    }
                },
                error:function(response){
                    window.location.href = '{{ route('login') }}';
                }
                });
            });
        });
    </script>

@endpush
