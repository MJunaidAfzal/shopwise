@extends('layouts.scaffold')
@push('title')
    {{ $title ?? '' }}
@endpush
@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
                    <div class="col-xl-9">
                        <div class="single_post">
                            <h2 class="blog_title">{{ $blog->title }}</h2>
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ti-user"></i> {{ $blog->user->name }}</a></li>
                                <li><a href="#"><i class="ti-time"></i>
                                        {{ Carbon\Carbon::parse($blog->created_at)->diffForHumans() }}</a></li>
                                <li class="btn btn-sm btn-dark" style="float: right"><i class="ti-eye"></i>
                                    <b>{{ $blog->views }}</b></li>
                            </ul>
                            <div class="blog_img">
                                <img src="{{ asset('upload/blog/' . $blog->image) }}" alt="">
                            </div>
                            <div class="blog_content">
                                <div class="blog_text">
                                    <p>{!! $blog->short_description !!}</p>
                                    <h2><b>BLOG DETAIL</b></h2>

                                    <p>{!! $blog->long_description !!}.</p>
                                    <div class="blog_post_footer">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col-md-8 mb-3 mb-md-0">
                                                <div class="tags">
                                                    <a href="#">General</a>
                                                    <a href="#">Design</a>
                                                    <a href="#">jQuery</a>
                                                    <a href="#">Branding</a>
                                                    <a href="#">Modern</a>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <ul class="social_icons  text-md-end">
                                                    <li><a href="#" class="sc_facebook"><i
                                                                class="ion-social-facebook"></i></a></li>
                                                    <li><a href="#" class="sc_twitter"><i
                                                                class="ion-social-twitter"></i></a></li>
                                                    <li><a href="#" class="sc_google"><i
                                                                class="ion-social-googleplus"></i></a></li>
                                                    <li><a href="#" class="sc_youtube"><i
                                                                class="ion-social-youtube-outline"></i></a></li>
                                                    <li><a href="#" class="sc_instagram"><i
                                                                class="ion-social-instagram-outline"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="post_navigation bg_gray">
                            <div class="row align-items-center justify-content-between p-4">
                                <div class="col-5">
                                    <a href="#">
                                        <div class="post_nav post_nav_prev">
                                            <i class="ti-arrow-left"></i>
                                            <span>blanditiis praesentium</span>
                                        </div>
                                    </a>
                                </div>
                                <div class="col-2">
                                    <a href="#" class="post_nav_home">
                                        <i class="ti-layout-grid2"></i>
                                    </a>
                                </div>
                                <div class="col-5">
                                    <a href="#">
                                        <div class="post_nav post_nav_next">
                                            <i class="ti-arrow-right"></i>
                                            <span>voluptatum deleniti</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card post_author">
                            <div class="card-body">
                                <div class="author_img">
                                    @if (!empty($blog->user->image))
                                        <img src="{{ asset('upload/image/' . $blog->user->image) }}" alt="user1">
                                    @else
                                        <img src="{{ asset('user/assets/img/logo.jpg') }}" alt=""
                                            class="h-auto rounded-circle">
                                    @endif
                                </div>
                                <div class="author_info">
                                    @if ($blog->user->name)
                                        <h6 class="author_name"><a href="#"
                                                class="mb-1 d-inline-block">{{ $blog->user->name }}</a></h6>
                                    @else
                                        <h6 class="author_name"><a href="#" class="mb-1 d-inline-block">--</a></h6>
                                    @endif
                                    @if ($blog->user->phone)
                                        <small><b><i style="margin-right: 5px"
                                                    class="text-success fa fa-phone"></i>{{ $blog->user->phone }}</b></small><br>
                                    @else
                                        <small><b><i style="margin-right: 5px"
                                                    class="text-success fa fa-phone"></i>--</b></small><br>
                                    @endif
                                    @if ($blog->user->address)
                                        <small><b><i style="margin-right: 5px"
                                                    class="text-danger fa fa-address-card"></i>{{ $blog->user->address }}</b></small><br>
                                    @else
                                        <small><b><i style="margin-right: 5px"
                                                    class="text-danger fa fa-address-card"></i>--</b></small><br>
                                    @endif
                                    @if ($blog->user->dob)
                                        <small><b><i style="margin-right: 5px"
                                                    class="text-info fa fa-birthday-cake"></i>{{ $blog->user->dob }}</b></small>
                                    @else
                                        <small><b><i style="margin-right: 5px"
                                                    class="text-info fa fa-birthday-cake"></i>--</b></small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="related_post">
                            <div class="content_title">
                                <h5>Related posts</h5>
                            </div>
                            <div class="row">
                                @forelse ($relatedBlogs as $item)
                                    <div class="col-md-6">
                                        <div class="blog_post blog_style2 box_shadow1">
                                            <div class="blog_img">
                                                <a href="{{ route('blog-detail', $item->slug) }}">
                                                    <img src="{{ asset('upload/blog/' . $item->image) }}" alt="">
                                                </a>
                                            </div>
                                            <div class="blog_content bg-white">
                                                <div class="blog_text">
                                                    <h5 class="blog_title"><a
                                                            href="{{ route('blog-detail', $item->slug) }}">{{ $item->title }}</a>
                                                    </h5>
                                                    <ul class="list_none blog_meta">
                                                        <li><a href="#"><i class="ti-user"></i>
                                                                {{ $item->user->name }}</a></li>
                                                        <li><a href="#"><i
                                                                    class="ti-time"></i>{{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</a>
                                                        </li>
                                                    </ul>
                                                    <p>{!! $item->short_description !!}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @empty
                                    <b>No Related Blog Found!</b>
                                @endforelse
                            </div>
                        </div>
                        <div class="comment-area">
                            <div class="content_title">
                                <h5>Comments</h5>
                            </div>
                            <ul class="list_none comment_list">

                                @forelse ($comments as $item)
                                    <li class="comment_info">
                                        <div class="d-flex">
                                            <div class="comment_user">
                                                @if (!empty($item->reader->image))
                                                    <img src="{{ asset('upload/image/' . $item->reader->image) }}"
                                                        alt="user4">
                                                @else
                                                    <img src="{{ asset('user/assets/img/logo.jpg') }}" alt="">
                                                @endif
                                            </div>
                                            <div class="comment_content">
                                                <div class="d-flex">
                                                    <div class="meta_data">
                                                        <h6><a href="#">{{ $item->reader->name }}</a></h6>
                                                        <div class="comment-time">
                                                            {{date('j F, Y',strtotime($item->created_at))}}
                                                        </div>
                                                    </div>
                                                    <div style="margin-left:50px">
                                                        <a href="#" class="comment-reply"><i
                                                                class="ion-reply-all"></i></a><br>
                                                                <form action="{{ route('comment.delete',$item->id) }}" method="POST" style="display:inline;">
                                                                    @csrf
                                                                        @method('DELETE')
                                                                        <button type="submit" style="border: none; background-color: transparent;" onclick="return confirm('Are you sure you want to delete this Comment?')"><i class="text-danger fa fa-trash"></i></button>
                                                                </form>
                                                    </div>
                                                </div>
                                                <p>{{ $item->comment }}</p>
                                            </div>
                                        </div>
                                    </li>
                                @empty
                                    Not Comment Yet!
                                @endforelse
                            </ul>
                            <div class="content_title">
                                <h5>Write a comment</h5>
                            </div>
                            <form class="field_form" name="enq" action="{{ route('comment.store') }}"
                                method="post">
                                @csrf
                                <input type="hidden" name="blog_id" value="{{ $blog->id }}">
                                <input type="hidden" name="user_id" value="{{ $blog->user->id }}">
                                <div class="row">
                                    <div class="form-group col-md-12 mb-3">
                                        <textarea rows="3" name="comment" class="form-control" placeholder="Your Comment"></textarea>
                                        <small class="text-danger">
                                            @error('comment')
                                                {{ $message }}
                                            @enderror
                                        </small>
                                    </div>
                                    <div class="form-group col-md-12 mb-3">
                                        <button class="btn btn-fill-out" type="submit">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-3 mt-4 pt-2 mt-xl-0 pt-xl-0">
                        <div class="sidebar">
                            <div class="widget">
                          <div class="row">
                            <div class="col-md-12 text-center">
                           <span>
                            @php $countFavourite = 0 @endphp
                                    @if (Auth::check())
                                        @php
                                            $countFavourite = App\Models\BlogFavourite::countFavourite($blog['id']);
                                        @endphp
                                    @endif
                                    <a style="cursor: pointer;"  data-blogid="{{ $blog->id }}" class="ms-1 update-favourite">
                                        @if ($countFavourite > 0)
                                        <i style="font-size: 20px;color:red;" class="fa fa-heart"></i><br>
                                            @else
                                        <i style="font-size: 20px" class="fa fa-heart-o"></i><br>
                                            @endif

                                    </a>
                        <small><b>Favourite</b></small>

                            {{-- <img src="{{asset('assets/imgs/fi_bookmark-red.svg')}}" alt=""> --}}
                        </span>
                              {{-- <span>
                                @php $countFavourite = 0 @endphp
                                @if (Auth::check())
                                    @php
                                        $countFavourite = App\Models\BlogFavourite::countFavourite($blog['id']);
                                    @endphp
                                @endif
                                <a style="cursor: pointer;"  data-blogid="{{ $blog->id }}" class="ms-1 update-favourite">
                                @if ($countFavourite > 0)
                                <i style="font-size: 20px;color:red;" class="fa fa-heart"></i><br>
                                @else
                                <i style="font-size: 20px" class="fa fa-heart-o"></i><br>
                                @endif
                              </span> --}}
                            </div>
                            <div data-bs-toggle="modal" data-original-title="test" data-bs-target="#exampleModal" style="cursor: pointer;" class="col-md-12 mt-3 text-center">
                                <span ><i style="font-size: 20px" class="fa fa-share"></i></span><br>
                                <small><b>Share</b></small>
                            </div>
                          </div>
                            </div>
                            <div class="widget">
                                <h5 class="widget_title">Popular Posts</h5>
                                <ul class="widget_recent_post">
                                    @forelse ($popularPosts as $item)
                                        <li>
                                            <div class="post_footer">
                                                <div class="post_img">
                                                    <a href="{{ route('blog-detail', $item->slug) }}"><img
                                                            src="{{ asset('upload/blog/' . $item->image) }}"
                                                            alt="letest_post1"></a>
                                                </div>
                                                <div class="post_content">
                                                    <h6><a
                                                            href="{{ route('blog-detail', $item->slug) }}">{{ $item->title }}</a>
                                                    </h6>
                                                    <p class="small m-0">
                                                        {{ Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</p>
                                                </div>
                                            </div>
                                        </li>
                                    @empty
                                        Data Not Found!
                                    @endforelse
                                </ul>
                            </div>
                            <div class="widget">
                                <h5 class="widget_title">Categories</h5>
                                <ul class="widget_archive">
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('category-wise', $category->slug) }}"><span
                                                    class="archive_year">{{ $category->name }}</span><span
                                                    class="archive_num">( {{ $category->categoryCount($category->id) }}
                                                    )</span></a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget">
                                <div class="shop_banner">
                                    <div class="banner_img overlay_bg_20">
                                        <img src="{{ asset('assets/images/sidebar_banner_img.jpg') }}"
                                            alt="sidebar_banner_img">
                                    </div>
                                    <div class="shop_bn_content2 text_white">
                                        <h5 class="text-uppercase shop_subtitle">New Collection</h5>
                                        <h3 class="text-uppercase shop_title">Sale 30% Off</h3>
                                        <a href="#" class="btn btn-white rounded-0 btn-sm text-uppercase">Shop
                                            Now</a>
                                    </div>
                                </div>
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
                                <input type="text" required="" class="form-control rounded-0"
                                    placeholder="Enter Email Address">
                                <button type="submit" class="btn btn-dark rounded-0" name="submit"
                                    value="Submit">Subscribe</button>
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
                        <input  style="width: 80%;" type="text" class="p-2" value="{{ route('blog-detail',$blog->slug) }}" id="myInput" disabled>
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
            var blog_id = $(this).data('blogid');
            $.ajax({
                type: 'POST',
                url: '{{ route('favourite.store') }}',
                data: {
                    user_id: user_id,
                    blog_id: blog_id
                },
                beforeSend : function(response){
                $('.loader').show();
                },
                success:function(response){
                    if(response.action == 'add'){
                        $('.loader').hide();
                        $('a[data-blogid='+blog_id+']').html(`<i style="font-size: 20px;color:red;" class="fa fa-heart"></i><br>`);
                        toastr.success(response.message);
                    } else if (response.action == 'remove') {
                        $('.loader').hide();
                        $('a[data-blogid=' + blog_id + ']').html(
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
{{-- Share --}}
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
