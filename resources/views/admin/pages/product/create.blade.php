@extends('admin.layouts.admin-scaffold')
@push('title')
{{ $title ?? '' }}
@endpush
@push('styles')
<link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css">
<style>
    body{
        font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
    }
    .multiple-uploader {
        width: 100%;
    }
    .image-container {
        margin: 10px;
        width: 100px;
        height: 100px;
        position: relative;
        cursor: auto;
        pointer-events: unset;
    }
    .image-preview {
        height: 100px;
        width : 100px
    }
    .multiple-uploader {
        border: 2px dashed lightgrey;
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
                        <a href="{{ route('admin.product.index') }}"><button style="float: right" class="btn btn-primary"><b>BACK</b></button></a>
                    </div>
                </div>
                     {!! Form::open(['route' => 'admin.product.store' , 'enctype' => 'multipart/form-data' , 'id' => 'my-form']) !!}
                        <div class="row">
                            <div class="col-md-4 mt-5">
                                <label for="category_id"><b>Category</b></label>
                                {!! Form::select('category_id', $categories, null, ['class' => 'form-control mt-2 p-3']) !!}
                                <small class="text-danger">@error ('category_id') {{ $message }} @enderror</small>
                        </div>
                        <div class="col-md-4 mt-5">
                            <label for="brand_id"><b>Brand</b></label>
                            {!! Form::select('brand_id', $brands, null, ['class' => 'form-control mt-2 p-3']) !!}
                            <small class="text-danger">@error ('brand_id') {{ $message }} @enderror</small>
                    </div>
                    <div class="col-md-4 mt-5">
                        <label for="size_id"><b>Size</b></label>
                        {!! Form::select('size_id', $sizes, null, ['class' => 'form-control mt-2 p-3']) !!}
                        <small class="text-danger">@error ('size_id') {{ $message }} @enderror</small>
                </div>
                        <div class="col-md-4 mt-4">
                           <div class="form-floating">
                              {!! Form::text('title', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Title', 'aria-describedby' => 'floatingInputHelp']) !!}
                              <label for="floatingInput">Title</label>
                              <small class="text-danger">@error ('title') {{ $message }} @enderror</small>
                           </div>
                        </div>
                        <div class="col-md-4 mt-4">
                            <div class="form-floating">
                               {!! Form::number('price', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Price', 'aria-describedby' => 'floatingInputHelp']) !!}
                               <label for="floatingInput">Price</label>
                               <small class="text-danger">@error ('price') {{ $message }} @enderror</small>
                            </div>
                         </div>
                         <div class="col-md-4 mt-4">
                            <div class="form-floating">
                               {!! Form::text('del_price', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Delete Price', 'aria-describedby' => 'floatingInputHelp']) !!}
                               <label for="floatingInput">Delete Price</label>
                               <small class="text-danger">@error ('del_price') {{ $message }} @enderror</small>
                            </div>
                         </div>

                         <div class="col-md-4 mt-4">
                            <div class="form-floating">
                               {!! Form::text('discount', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Discount', 'aria-describedby' => 'floatingInputHelp']) !!}
                               <label for="floatingInput">Discount</label>
                               <small class="text-danger">@error ('discount') {{ $message }} @enderror</small>
                            </div>
                         </div>
                         <div class="col-md-4 mt-4">
                             <div class="form-floating">
                                {!! Form::text('color', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Color', 'aria-describedby' => 'floatingInputHelp']) !!}
                                <label for="floatingInput">Color</label>
                                <small class="text-danger">@error ('color') {{ $message }} @enderror</small>
                             </div>
                          </div>
                          <div class="col-md-4 mt-4">
                             <div class="form-floating">
                                {!! Form::text('capacity', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Delete Price', 'aria-describedby' => 'floatingInputHelp']) !!}
                                <label for="floatingInput">Capacity</label>
                                <small class="text-danger">@error ('capacity') {{ $message }} @enderror</small>
                             </div>
                          </div>

                          <div class="col-md-4 mt-4">
                            <div class="form-floating">
                               {!! Form::text('material', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Material', 'aria-describedby' => 'floatingInputHelp']) !!}
                               <label for="floatingInput">Material</label>
                               <small class="text-danger">@error ('material') {{ $message }} @enderror</small>
                            </div>
                         </div>
                         <div class="col-md-4 mt-4">
                             <div class="form-floating">
                              {!! Form::select('water_resistant', ['yes' => 'Yes', 'no' => 'No'], null, ['class' => 'form-control']) !!}
                                <label for="floatingInput">Water Resistant</label>
                                <small class="text-danger">@error ('water_resistant') {{ $message }} @enderror</small>
                             </div>
                          </div>
                          <div class="col-md-4 mt-4">
                             <div class="form-floating">
                                {!! Form::text('sku', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your SKU', 'aria-describedby' => 'floatingInputHelp']) !!}
                                <label for="floatingInput">SKU</label>
                                <small class="text-danger">@error ('sku') {{ $message }} @enderror</small>
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


                        <div class="col-md-12 mt-4">
                            <div class="multiple-uploader" id="multiple-uploader">
                                <div class="mup-msg">
                                    <i class="display-4 text-muted ri-upload-cloud-2-fill"></i>
                                    <span class="mup-main-msg">Click to upload images.</span>
                                    <label for="" style="display: none">
                                    <input type="file" name="images[]" id="" accept="image/*" class="form-control" multiple>
                                    </label>
                              <small class="text-danger">@error ('images') {{ $message }} @enderror</small>
                                </div>
                         </div>
                         </div>

                        <div class="col-md-12 mt-4">
                            <label for="description" class="form-label"><b>Description</b></label>
                            <textarea name="description" id="description" class="form-control" cols="30" rows="3" >{{ old('description') }}</textarea>
                            <small class="text-danger">@error ('description') {{$message}} @enderror</small>
                         </div>
                        <div class="col-md-12">
                           <div style="float: right; " class="mt-4">
                              <button type="submit" class="btn  btn-primary waves-effect"><b>CREATE</b></button>
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
@push('scripts')
<script src="//cdnjs.cloudflare.com/ajax/libs/tinymce/4.5.1/tinymce.min.js"></script>
<script>
   tinymce.init({ selector:'#description' });
</script>
<script src="{{ asset('assets/js/multiple-uploader.js') }}"></script>
<script>

    let multipleUploader = new MultipleUploader('#multiple-uploader').init({
        maxUpload : 20, // maximum number of uploaded images
        maxSize:2, // in size in mb
        filesInpName:'images', // input name sent to backend
        formSelector: '#my-form', // form selector
    });
</script>
@endpush
