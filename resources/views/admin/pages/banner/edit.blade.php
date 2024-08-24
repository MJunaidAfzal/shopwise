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
                            <h2><b>{{ $title ?? '' }}</b></h2>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.banner.index') }}"><button class="btn btn-primary w-100"><b>BACK</b></button></a>
                        </div>
                    </div>
                  {!! Form::model($banner, ['route'=> ['admin.banner.update', $banner->id],'class' =>'mt-5' , 'enctype' => 'multipart/form-data']) !!}
                    @method('PUT')
                     <div class="row">
                        <div class="col-md-6 mt-4">
                            <div class="form-floating">
                               {!! Form::text('name', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your name', 'aria-describedby' => 'floatingInputHelp' , 'required']) !!}
                               <label for="floatingInput">Name</label>
                               <small class="text-danger">@error ('name') {{ $message }} @enderror</small>
                            </div>
                         </div>
                         <div class="col-md-6 mt-4">
                            <input type="file" class="form-control  p-3 " name="image" >
                            @if(!empty($banner->image))
                            <img src="{{asset('upload/banner/'.$banner->image)}}" alt="" width="100px" class="img-thumbnail mt-3">
                        @endif
                        </div>
                        <div class="col-md-6 mt-4">
                            <div class="form-floating">
                               {!! Form::text('button_name', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Button Name', 'aria-describedby' => 'floatingInputHelp']) !!}
                               <label for="floatingInput">Button Name</label>
                               <small class="text-danger">@error ('button_name') {{ $message }} @enderror</small>
                            </div>
                         </div>
                         <div class="col-md-6 mt-4">
                            <div class="form-floating">
                               {!! Form::text('link', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Link', 'aria-describedby' => 'floatingInputHelp']) !!}
                               <label for="floatingInput">Link</label>
                               <small class="text-danger">@error ('link') {{ $message }} @enderror</small>
                            </div>
                         </div>
                         <div class="col-md-6 mt-4">
                            <div class="form-floating">
                               {!! Form::text('detail', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Detail', 'aria-describedby' => 'floatingInputHelp']) !!}
                               <label for="floatingInput">Detail</label>
                               <small class="text-danger">@error ('detail') {{ $message }} @enderror</small>
                            </div>
                         </div>
                         <div class="col-md-6 mt-4">
                           <div class="form-floating">
                              {!! Form::select('status', ['1' => 'Active', '0' => 'Deactive'], null, ['class' => 'form-control']) !!}
                              <label for="floatingInput">Status</label>
                              <small class="text-danger">@error ('status') {{ $message }} @enderror</small>
                           </div>
                        </div>
                        <div class="col-md-12">
                           <div style="float: right; " class="mt-4">
                              <button type="submit" class="btn  btn-primary waves-effect"><b>UPDATE</b></button>
                           </div>
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
