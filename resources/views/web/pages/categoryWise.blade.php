@extends('layouts.scaffold')
@push('title')
Category - {{ $category->name }}
@endpush
@section('content')


<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>{{ $category->name }}</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blogs') }}">Blog</a></li>
                    <li class="breadcrumb-item active">{{ $category->name }}</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION BLOG -->
<div class="section">
	<div class="container">
        <div class="row">
            @forelse ($blogs as $blog)
            <div class="col-lg-4 col-md-6">
                <div class="blog_post blog_style2 box_shadow1">
                    <div class="blog_img">
                        <a href="{{ route('blog-detail',$blog->slug) }}">
                            <img src="{{asset('upload/blog/'.$blog->image)}}" alt="">
                        </a>
                    </div>
                    <div class="blog_content bg-white">
                        <div class="blog_text">
                            <h5 class="blog_title"><a href="{{ route('blog-detail',$blog->slug) }}">{{ $blog->title }}</a></h5>
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ti-user"></i> {{ $blog->user->name }}</a></li>
                                <li><a href="#"><i class="ti-time"></i> {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</a></li>
                            </ul>
                            <p>{!! $blog->short_description  !!}</p>
                        </div>
                    </div>
                </div>
            </div>
            @empty
           <b> Not Added Blogs</b>
            @endforelse
        </div>
        <div class="row">
            <div class="col-12 mt-2 mt-md-4">
                <ul class="pagination pagination_style1 justify-content-center">
                    <li>{{ $blogs->links() }}</li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BLOG -->

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
