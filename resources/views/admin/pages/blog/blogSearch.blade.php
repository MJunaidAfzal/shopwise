
<div class="row">
    <div class="col-md-3 col-6 mt-3"></div>
<div class="col-md-6 col-6 mt-3">
    <a href="{{ route('blog-detail',$blog->slug) }}"><div class="card">
         <div class="card-body">
            <div class="text-center">
               <img width="100%" class="mb-3" src="{{asset('upload/blog/'.$blog->image)}}" alt="">
               <hr>
               <small><b>{{ $blog->title }}</b></small><br>
               <b class="text-dark" style="float: left; margin-top: 23px;"><i style="margin-right: 5px" class="fa fa-user"></i> {{ $blog->user->name }}</b>
               <b class="text-dark" style="float: right; margin-top: 23px;"><i style="margin-right: 5px" class="fa fa-clock"></i>  {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</b><br><br>
               <p><b  class="text-warning">{!! $blog->short_description !!}</b></p>
            </div>
         </div>
      </div>
   </div></a>
</div>


