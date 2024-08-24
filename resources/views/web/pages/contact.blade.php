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
            		<h1>Contact</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">Contact</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION CONTACT -->
<div class="section pb_70">
	<div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-map2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Address</span>
                        <p>123 Street, Old Trafford, London, UK</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-envelope-open"></i>
                    </div>
                    <div class="contact_text">
                        <span>Email Address</span>
                        <a href="mailto:info@sitename.com">info@yourmail.com </a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-tablet2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Phone</span>
                        <p>+ 457 789 789 65</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

<!-- START SECTION CONTACT -->
<div class="section pt-0">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-6">
            	<div class="heading_s1">
                	<h2>Get In touch</h2>
                </div>
                <p class="leads">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                <div class="field_form">
                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                @if(Auth::id())
                                <input value="{{ auth()->user()->name }}" placeholder="Enter Name *" class="form-control" name="name" type="text">
                                @else
                                <input value="{{ old('name') }}" placeholder="Enter Name *" class="form-control" name="name" type="text">
                                @endif
                                <small class="text-danger">@error ('name') {{ $message }} @enderror</small>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                @if(Auth::id())
                                <input value="{{ auth()->user()->email }}"  placeholder="Enter Email *" class="form-control" name="email" type="email">
                                @else
                                <input value="{{ old('email') }}"  placeholder="Enter Email *" class="form-control" name="email" type="email">
                                @endif
                                <small class="text-danger">@error ('email') {{ $message }} @enderror</small>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                               @if(Auth::id())
                                <input value="{{ auth()->user()->phone }}"  placeholder="Enter Phone No. *" class="form-control" name="phone">
                                @else
                                <input value="{{ old('phone') }}"  placeholder="Enter Phone No. *" class="form-control" name="phone">
                                @endif
                                <small class="text-danger">@error ('phone') {{ $message }} @enderror</small>
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <input value="{{ old('subject') }}"  placeholder="Enter Subject"  class="form-control" name="subject">
                                <small class="text-danger">@error ('subject') {{ $message }} @enderror</small>
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <label for="message">Message</label>
                                <textarea placeholder="Message *" class="form-control mt-2" name="message" rows="4"> {{ old('message') }} </textarea>
                                <small class="text-danger">@error ('message') {{ $message }} @enderror</small>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" title="Submit Your Message!" class="btn btn-fill-out">Send Message</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
                <img height="500px" src="{{ asset('assets/images/map.jpg') }}" alt="">
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

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
                        <input type="text" class="form-control rounded-0" placeholder="Enter Email Address">
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

