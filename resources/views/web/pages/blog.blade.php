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
            		<h1>{{ $title ?? '' }}</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('blogs') }}">Blog</a></li>
                    <li class="breadcrumb-item active">{{ $title ?? '' }}</li>
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
        	<div class="col-lg-9">
                <div class="row blog_thumbs">


                    @forelse ($data as $blog)
                    <div class="col-12">
                        <div class="blog_post blog_style2">
                            <div class="blog_img">
                                <a href="{{{ route('blog-detail',$blog->slug) }}}">
                                    <img src="{{asset('upload/blog/'.$blog->image)}}" alt="">
                                </a>
                            </div>
                            <div class="blog_content bg-white">
                                <div class="blog_text">
                                    <h6 class="blog_title"><a href="{{{ route('blog-detail',$blog->slug) }}}">{{ $blog->title }}</a></h6>
                                    <ul class="list_none blog_meta">
                                        <li><a href=""><i class="ti-user"></i> {{ $blog->user->name }}</a></li>
                                        <li><a href=""><i class="ti-time"></i> {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</a></li>
                                    </ul>
                                    <p>{!! $blog->short_description  !!}</p>
                                    <a href="{{{ route('blog-detail',$blog->slug) }}}" class="btn btn-fill-line border-2 btn-xs rounded-0">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <p>No data found.</p
                    @endforelse


                </div>
                        <ul style="font-size: 10px" class="pagination pagination_style1 justify-content-center">
                            <li >{!! $data->links() !!}</li>
                        </ul>
            </div>
        	<div class="col-lg-3 order-lg-first mt-4 pt-2 mt-lg-0 pt-lg-0">
            	<div class="sidebar">
                	<div class="widget">
                        <div class="search_form">
                            <form action="{{ route('blogs') }}" method="GET">
                                <input name="title" class="form-control" placeholder="Search..." type="text" value="{{ request('title') }}">
                                <button type="submit" class="btn icon_search">
                                    <i class="ion-ios-search-strong"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                	<div class="widget">
                    	<h5 class="widget_title">Recent Posts</h5>
                        <ul class="widget_recent_post">
                           @foreach ($recentPosts as $item)
                           <li>
                            <div class="post_footer">
                                <div class="post_img">
                                    <a href="{{ route('blog-detail',$item->slug) }}"><img src="{{asset('upload/blog/'.$item->image)}}" alt="letest_post"></a>
                                </div>
                                <div class="post_content">
                                    <h6><a href="{{ route('blog-detail',$item->slug) }}">{{ $item->title }}</a></h6>
                                    <p class="small m-0">{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                                </div>
                            </div>
                        </li>
                           @endforeach

                    	</ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Month</h5>
                        <ul class="widget_archive">
                            @foreach ($months as $month)
                            <li><a href="{{ route('blog-month',$month->name) }}"><span class="archive_year">{{ $month->name }}</span><span class="archive_num">( {{$month->monthCount($month->id)}} )</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                    <div class="widget">
                        <h5 class="widget_title">Categories</h5>
                        <ul class="widget_archive">
                            @foreach ($categories as $category)
                            <li><a href="{{ route('category-wise',$category->slug) }}"><span class="archive_year">{{ $category->name }}</span><span class="archive_num">( {{$category->categoryCount($category->id)}} )</span></a></li>
                            @endforeach
                        </ul>
                    </div>
                	<div class="widget">
                    	<h5 class="widget_title">tags</h5>
                        <div class="tags">
                        	<a href="#">General</a>
                            <a href="#">Design</a>
                            <a href="#">jQuery</a>
                            <a href="#">Branding</a>
                            <a href="#">Modern</a>
                            <a href="#">Blog</a>
                            <a href="#">Quotes</a>
                            <a href="#">Advertisement</a>
                        </div>
                    </div>
                </div>
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
