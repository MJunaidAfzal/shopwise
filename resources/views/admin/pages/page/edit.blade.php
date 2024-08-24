@extends('admin.layouts.admin-scaffold')
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
                                <h2><b>Page Edit</b></h2>
                            </div>
                            <div class="col-md-2">
                                <a href="{{ route('admin.page.index') }}"><button class="btn btn-primary w-100"><b>BACK</b></button></a>
                            </div>
                        </div>
                  {!! Form::model($page, ['route'=> ['admin.page.update', $page->slug]]) !!}
                  @method('PUT')
                  <div class="row">
                    <div class="col-md-6 mt-5">
                        <label for="title" class="form-label"><b>Title</b></label>
                        {!! Form::text('title', null, ['class' => 'form-control mt-2 p-3', 'placeholder' => 'Enter Title',]) !!}
                        <small class="text-danger">@error ('title') {{ $message }} @enderror</small>
                    </div>
                    <div class="col-md-6 mt-5">
                        <label for="status" class="form-label"><b>Status</b></label>
                        {!! Form::select('status', ['1' => 'Active', '0' => 'Deactive'], null, ['class' => 'form-control mt-2 p-3']) !!}
                        <small class="text-danger">@error ('status') {{ $message }} @enderror</small>
                    </div>
                    <div class="col-md-12 mt-3">
                        <label for="description" class="form-label"><b>Description</b></label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="3" >{{ $page->description }}</textarea>
                        <small class="text-danger">@error ('description') {{$message}} @enderror</small>
                     </div>
                     <div class="col-md-12 mt-3">
                        <button style="float: right" class="btn btn-primary"><b>UPDATE</b></button>
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
   tinymce.init({ selector:'#description' });
</script>
@endpush
