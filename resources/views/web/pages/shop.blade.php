@extends('layouts.scaffold')
@push('title')
{{ $title ?? '' }}
@endpush
@push('styles')
<style>
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
        .accordion-title {
            font-size: 15px;
        }

        .accordion-item {
            border: none;
        }

        #size {
            font-size: 5px;
        }

        @import url("https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap");

        .wrapper1 {
            width: 100%;
            border-radius: 10px;
            padding: 5px 20px 20px;
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.1);

        }

        .price-input {
            width: 100%;
            display: flex;
            margin: 30px 0 35px;
        }

        .price-input .field {
            display: flex;
            width: 80%;
            height: 40px;
            align-items: center;
        }

        .field input {
            width: 100%;
            height: 100%;
            font-size: 19px;
            margin-left: 12px;
            text-align: center;
            border-radius: 3px;
            border: 1px solid #999;
            -moz-appearance: textfield;
        }

        input[type="number"]::-webkit-outer-spin-button,
        input[type="number"]::-webkit-inner-spin-button {
            -webkit-appearance: none;
        }

        .price-input .separator {
            width: 80px;
            display: flex;
            font-size: 19px;
            align-items: center;
            justify-content: center;
        }

        .slider {
            height: 5px;
            position: relative;
            background: #ddd;
            border-radius: 5px;
        }

        .slider .progress {
            height: 100%;
            left: 25%;
            right: 25%;
            position: absolute;
            border-radius: 5px;
            background: rgb(255, 117, 140);
        }

        .range-input {
            position: relative;
        }

        .range-input input {
            position: absolute;
            width: 100%;
            height: 5px;
            top: -5px;
            background: none;
            pointer-events: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        input[type="range"]::-webkit-slider-thumb {
            height: 17px;
            width: 17px;
            border-radius: 50%;
            background: rgb(255, 117, 140);
            pointer-events: auto;
            -webkit-appearance: none;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
        }

        input[type="range"]::-moz-range-thumb {
            height: 17px;
            width: 17px;
            border: none;
            border-radius: 50%;
            background: rgb(255, 117, 140);
            pointer-events: auto;
            -moz-appearance: none;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.05);
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
                    <li class="breadcrumb-item active"><a href="{{ route('pages.shop') }}">{{ $title ?? '' }}</a></li>
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
			<div class="col-lg-9">
            	<div class="row align-items-center mb-4 pb-1">
                    <div class="col-12">
                        <div class="product_header">
                            <div class="product_header_left">
                                <div class="custom_select">
                                    <select class="form-control form-control-sm">
                                        <option value="order">Default sorting</option>
                                        <option value="popularity">Sort by popularity</option>
                                        <option value="date">Sort by newness</option>
                                        <option value="price">Sort by price: low to high</option>
                                        <option value="price-desc">Sort by price: high to low</option>
                                    </select>
                                </div>
                            </div>
                            <div class="product_header_right">
                            	<div class="products_view">
                                    <a href="javascript:;" class="shorting_icon grid active"><i class="ti-view-grid"></i></a>
                                    <a href="javascript:;" class="shorting_icon list"><i class="ti-layout-list-thumb"></i></a>
                                </div>
                                <div class="custom_select">
                                    <select class="form-control form-control-sm">
                                        <option value="">Showing</option>
                                        <option value="9">9</option>
                                        <option value="12">12</option>
                                        <option value="18">18</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row shop_container">
                   @forelse ($data as $index=>$product)
                   <div class="col-md-4 col-6">
                       <div class="product">
                        <a href="{{ route('product.detail',$product->slug) }}">
                        <div class="product_img">
                                <img src="{{asset('upload/product_images/'.mainImage($product->id))}}" alt="" height="300px" width="300px">
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
                                <p>{!! $product->description !!}.</p>
                            </div>
                            <div class="pr_switch_wrap">
                                <div class="product_color_switch">
                                    <span class="active" data-color="#87554B"></span>
                                    <span data-color="#333333"></span>
                                    <span data-color="#DA323F"></span>
                                </div>
                            </div>
                            <div class="list_product_action_box">
                                <ul class="list_none pr_action_btn">
                                    <li>
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
                                    </li>
                                    {{-- <li><a href="#"><i class="icon-heart"></i></a></li> --}}
                                    <li>
                                        <div data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal" style="cursor: pointer;" class="col-md-12 text-center">
                                            <span ><i style="font-size: 20px" class="fa fa-share"></i></span><br>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                   @empty
                <b>Product Not Added!</b>
                   @endforelse
                </div>
        		<div class="row">
                    <div class="col-12">
                        <ul style="font-size: 10px" class="pagination pagination_style1 justify-content-center">
                            <li >{!! $data->links() !!}</li>
                        </ul>
                    </div>
                </div>
        	</div>
            <div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
            	<div class="sidebar">
                    <div class="widget">
                        <h5 class="widget_title">Search Product</h5>
                        <div class="search_form">
                            <form action="{{ route('pages.shop') }}" method="GET">
                                <input name="title" class="form-control" placeholder="Search..." type="text" value="{{ request('title') }}">
                                <button type="submit" class="btn icon_search">
                                    <i class="ion-ios-search-strong"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                	<div class="widget">
                        <h5 class="widget_title">Categories</h5>
                        <ul class="widget_categories">
                            @foreach ($categories as $category)
                            <li><a href="{{ route('categorywise.product',$category->slug) }}"><span class="categories_name">{{ $category->name }}</span><span class="categories_num">( {{ $category->ProductsCount($category->id) }} )</span></a></li>
                            @endforeach
                        </ul>
                    </div>


                    <div class="widget">
                    	<h5 class="widget_title">Filter</h5>
                        <div class="filter_price">
                           <form action="{{ route('pages.shop') }}" method="GET">
                            <div class="d-flex">
                                <div class="">
                                    <div class="price-input">
                                        <div class="field">
                                            <span>Min</span>
                                            <input type="number" name="min" class="input-min"
                                                value="{{ request('min') ?? 0 }}">
                                        </div>
                                        <div class="separator"></div>
                                        <div class="field">
                                            <span>Max</span>
                                            <input type="number" name="max" class="input-max"
                                                value="{{ request('max') ?? 5000 }}">
                                        </div>
                                    </div>
                                    <div class="slider">
                                        <div class="progress"></div>
                                    </div>
                                    <div class="range-input">
                                        <input type="range" name="min" class="range-min" min=""
                                            max="10000" value="{{ request('min') ?? 0 }}" step="100">
                                        <input type="range" name="max" class="range-max" min=""
                                            max="10000" value="{{ request('max') ?? 5000 }}" step="100">
                                    </div>
                                    <button style="float: right;background-color:rgb(255, 117, 140);" class="btn btn-primary mt-3 w-20" type="submit"
                                    ><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                         </div>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Brands</h5>
                        <ul class="widget_categories">
                            @foreach ($brands as $brand)
                            <li><a href="{{ route('brandwise.product',$brand->slug) }}"><span class="categories_name">{{ $brand->name }}</span><span class="categories_num">( {{ $brand->brandsCount($brand->id) }} )</span></a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="widget">
                        <h5 class="widget_title">Sizes</h5>
                        <ul class="widget_categories">
                            @foreach ($sizes as $size)
                            <li><a href="{{ route('sizewise.product',$size->size) }}"><span class="categories_name">{{ $size->size }}</span><span class="categories_num">( {{ $size->SizesCount($size->id) }} )</span></a></li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="widget">
                        <div class="shop_banner">
                            <div class="banner_img overlay_bg_20">
                                <img src="{{asset('assets/images/sidebar_banner_img.jpg')}}" alt="sidebar_banner_img">
                            </div>
                            <div class="shop_bn_content2 text_white">
                                <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                                <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                                <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop Now</a>
                            </div>
                        </div>
                    </div>
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
                <input  style="width: 80%;" type="text" class="p-2" value="{{ route('pages.shop') }}" id="myInput" disabled>
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
    const rangeInput = document.querySelectorAll(".range-input input"),
            priceInput = document.querySelectorAll(".price-input input"),
            range = document.querySelector(".slider .progress");
        let priceGap = 1000;

        priceInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minPrice = parseInt(priceInput[0].value),
                    maxPrice = parseInt(priceInput[1].value);

                if (maxPrice - minPrice >= priceGap && maxPrice <= rangeInput[1].max) {
                    if (e.target.className === "input-min") {
                        rangeInput[0].value = minPrice;
                        range.style.left = (minPrice / rangeInput[0].max) * 100 + "%";
                    } else {
                        rangeInput[1].value = maxPrice;
                        range.style.right = 100 - (maxPrice / rangeInput[1].max) * 100 + "%";
                    }
                }
            });
        });

        rangeInput.forEach((input) => {
            input.addEventListener("input", (e) => {
                let minVal = parseInt(rangeInput[0].value),
                    maxVal = parseInt(rangeInput[1].value);

                if (maxVal - minVal < priceGap) {
                    if (e.target.className === "range-min") {
                        rangeInput[0].value = maxVal - priceGap;
                    } else {
                        rangeInput[1].value = minVal + priceGap;
                    }
                } else {
                    priceInput[0].value = minVal;
                    priceInput[1].value = maxVal;
                    range.style.left = (minVal / rangeInput[0].max) * 100 + "%";
                    range.style.right = 100 - (maxVal / rangeInput[1].max) * 100 + "%";
                }
            });
        });
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
