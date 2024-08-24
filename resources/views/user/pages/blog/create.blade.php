@extends('user.layouts.user-scaffold')
@push('title')
{{ $title ?? '' }}
@endpush
@push('styles')
<style>
    body{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
</style>
@endpush
@section('content')
<div class="layout-page">
    <div class="content-wrapper">
       <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-10">
                                <h2><b>Blog Create</b></h2>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('user.blog.index') }}"><button class="btn btn-primary w-100"><b>BACK</b></button></a>
                            </div>
                        </div>
                     {!! Form::open(['route' => 'user.blog.store', 'enctype' => 'multipart/form-data']) !!}
                     <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                      <div class="row">

                        <div class="col-md-6 mt-5">
                            <label for="title" class="form-label"><b>Title</b></label>
                            {!! Form::text('title', null, ['class' => 'form-control mt-2 p-3', 'placeholder' => 'Enter Title',]) !!}
                            <small class="text-danger">@error ('title') {{ $message }} @enderror</small>
                        </div>



                        <div class="col-md-6 mt-5">
                            <label for="image" class="form-label"><b>Image</b></label>
                            <input type="file" class="form-control mt-2 p-3 " name="image">
                            <small class="text-danger">@error ('image') {{ $message }} @enderror</small>
                        </div>
                        <div class="col-md-6 mt-5">
                                <label for="category_id"><b>Category</b></label>
                                {!! Form::select('category_id', $categories, null, ['class' => 'form-control mt-2 p-3']) !!}
                                <small class="text-danger">@error ('category_id') {{ $message }} @enderror</small>
                        </div>

                        <div class="col-md-6 mt-5">
                            <label for="month_id"><b>Month</b></label>
                            {!! Form::select('month_id', $months, null, ['class' => 'form-control mt-2 p-3']) !!}
                            <small class="text-danger">@error ('month_id') {{ $message }} @enderror</small>
                    </div>


                        <div class="col-md-12 mt-3">
                            <label for="short_description" class="form-label"><b>Short Description</b></label>
                            <textarea name="short_description" id="short_description" class="form-control" cols="30" rows="3" >{{ old('short_description') }}</textarea>
                            <small class="text-danger">@error ('short_description') {{$message}} @enderror</small>
                         </div>
                         <div class="col-md-12 mt-3">
                            <label for="long_description" class="form-label"><b>Long Description</b></label>
                            <textarea name="long_description" id="long_description" class="form-control" cols="30" rows="3" >{{ old('long_description') }}</textarea>
                            <small class="text-danger">@error ('long_description') {{$message}} @enderror</small>
                         </div>
                         <div class="col-md-12 mt-3">
                            <label for="status" class="form-label"><b>Status</b></label>
                            {!! Form::select('status', ['1' => 'Active', '0' => 'Deactive'], null, ['class' => 'form-control mt-2 p-3']) !!}
                            <small class="text-danger">@error ('status') {{ $message }} @enderror</small>

                        </div>
                         <div class="col-md-12 mt-3">
                            <button style="float: right" class="btn btn-primary"><b>CREATE</b></button>
                         </div>
                      </div>
                     {!! Form::close() !!}
                    </div>
                </div>
            </div>
          </div>
       </div>
    </div>
    </div>


@endsection
@push('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.1/tinymce.min.js"></script>
<script>
   tinymce.init({ selector:'#short_description' });
   tinymce.init({ selector:'#long_description' });
</script>
@endpush
