@extends('layouts.scaffold')
@push('title')
{{ $page->title }}
@endpush
@section('content')

<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>{{ $page->title }}</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="{{ route('pages.index') }}">Home</a></li>
                    <li class="breadcrumb-item active">{{ $page->title }}</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            {!! $page->description !!}
        </div>
    </div>
</div>

@endsection

