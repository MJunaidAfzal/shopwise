<div class="col-lg-3 col-md-4 col-6">
    <div class="product">
        <a href="{{ route('product.detail',$product->slug) }}">
        <div class="product_img">
                <img height="300px" width="300px" src="{{asset('upload/product_images/'.mainImage($product->id))}}" alt="">
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

            @if(!empty($product->review->reviews))
            <div class="mt-3">
                @php $ratenum = number_format($product->review->reviews) @endphp
                @for ($i = 1; $i <= $ratenum; $i++)
                <i style="color: rgb(255, 144, 0); " class="fa fa-star"></i>
                @endfor
                @for ($j = $ratenum+1; $j <= 5; $j++)
                <i style="" class="fa fa-star"></i>
                @endfor
              </div>
            @else
            <div class="rating_wrap">
                <div class="rating">
                    <div class="product_rate" style="width:80%"></div>
                </div>
                <span class="rating_num">(21)</span>
            </div>
            @endif
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
