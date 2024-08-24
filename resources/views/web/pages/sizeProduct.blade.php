@extends('layouts.scaffold')
@push('title')
Size - {{ $size->size }}
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
</style>
@endpush
@section('content')

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>{{ $size->size }}</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('pages.shop') }}">Shop</a></li>
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

                <div class="row shop_container list">
                  @forelse ($products as $index=>$product)
                  <div class="col-lg-3 col-md-4 col-6">
                    <div class="product">
                        <div class="product_img">
                            <a href="{{ route('product.detail',$product->slug) }}">
                                <img height="300px" width="250px" src="{{ asset('upload/product_images/'.mainImage($product->id)) }}" alt="product_img1">
                            </a>

                        </div>
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
                                <p>{!! $product->description !!}.</p>
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
                                      <li> <div data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal" style="cursor: pointer;" class="col-md-12 text-center">
                                        <span ><i style="font-size: 20px" class="fa fa-share"></i></span><br>
                                    </div></li>
                                    {{-- <li><a href="#"><i class="icon-heart"></i></a></li> --}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                  @empty
                <b>Product Not Found!</b>
                  @endforelse
                </div>
        		<div class="row">
                    <div class="col-12">
                        <ul style="font-size: 10px" class="pagination pagination_style1 justify-content-center">
                            <li >{!! $products->links() !!}</li>
                        </ul>
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
                <input  style="width: 80%;" type="text" class="p-2" value="{{ route('sizewise.product',$size->size) }}" id="myInput" disabled>
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

</div>
<!-- END MAIN CONTENT -->

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
@endpush
