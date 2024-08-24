@extends('user.layouts.user-scaffold')
@push('title')
{{ $title ?? '' }}
@endpush
@section('content')
<div class="layout-page">
   <div class="content-wrapper">
      <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
               <div style="border: 1px lightgrey groove" class="card p-4">
                  <h3>{{ $title ?? ''}}</h3>
                  <hr>
                  <div  class="card-body">
                   @forelse ($reviews as $review)
                   <div style="border: 1px lightgrey groove;border-radius:10px" class="row mt-2 p-3">
                       <div class="col-md-2 mt-2">
                      <a href="{{ route('product.detail',$review->product->slug) }}"> <img height="110px" width="110px" src="{{asset('upload/product_images/'.mainImage($review->product->id))}}" class="img-thumbnail"></a>
                       </div>
                       <div class="col-md-4">
                        <a href="{{ route('product.detail',$review->product->slug) }}"><b style="font-size: 20px;">{{ isset($review->product) ? $review->product->title : '-' }}</b></a><br>
                          <div class="mt-3">
                            @php $ratenum = number_format($review->reviews) @endphp
                            @for ($i = 1; $i <= $ratenum; $i++)
                            <i style="color: rgb(255, 144, 0); " class="fa fa-star"></i>
                            @endfor
                            @for ($j = $ratenum+1; $j <= 5; $j++)
                            <i style="" class="fa fa-star"></i>
                            @endfor
                          </div>
                           <p class="mt-4">{{ $review->message }}</p>
                       </div>
                       <div class="col-md-6 mt-3">
                           <div style="float: right;">
                               <b>{{ date('d M Y' , strtotime( $review->created_at ))}}</b><br><br>
                               <form action="{{ route('user.review.destroy',$review->id) }}" method="POST" style="display:inline;">
                                @csrf
                                    @method('DELETE')
                                    <button type="submit" style="border: none; background-color: transparent;" onclick="return confirm('Are you sure you want to delete this data?')"><i style="font-size: 20px" class="text-danger fa fa-trash"></i><br>DELETE</button>
                            </form>
                           </div>
                       </div>
                   </div>
                   @empty
                       <h5>No reviews founded</h5>
                   @endforelse
                  </div>
               </div>
            </div>
         </div>

      </div>
   </div>
</div>
@endsection
