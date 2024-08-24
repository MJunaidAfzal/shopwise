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
                            <a href="{{ route('admin.product.index') }}"><button class="btn btn-primary w-100"><b>BACK</b></button></a>
                        </div>
                    </div>
                  {!! Form::model($product, ['route'=> ['admin.product.update', $product->slug],'class' =>'mt-5' , 'enctype' => 'multipart/form-data', 'id' => 'my-form']) !!}
                    @method('PUT')
                     <div class="row">
                        <div class="col-md-4 mt-4">
                            <div class="form-floating">
                               {!! Form::select('category_id', $categories, isset($category->category_id) ? $category->category_id : null, ['class' =>'form-control form-control-xl form-control-outlined', 'placeholder' => 'Please Select' , 'id' => 'customer']) !!}
                               <label for="floatingInput">Category</label>
                               <small class="text-danger">@error ('category_id') {{ $message }} @enderror</small>
                            </div>
                         </div>
                         <div class="col-md-4 mt-4">
                            <div class="form-floating">
                               {!! Form::select('brand_id', $brands, isset($brand->brand_id) ? $brand->brand_id : null, ['class' =>'form-control form-control-xl form-control-outlined', 'placeholder' => 'Please Select' , 'id' => 'customer']) !!}
                               <label for="floatingInput">Brand</label>
                               <small class="text-danger">@error ('brand_id') {{ $message }} @enderror</small>
                            </div>
                         </div>
                         <div class="col-md-4 mt-4">
                            <div class="form-floating">
                               {!! Form::select('size_id', $sizes, isset($size->size_id) ? $size->size_id : null, ['class' =>'form-control form-control-xl form-control-outlined', 'placeholder' => 'Please Select' , 'id' => 'customer']) !!}
                               <label for="floatingInput">Size</label>
                               <small class="text-danger">@error ('size_id') {{ $message }} @enderror</small>
                            </div>
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
                                <label for="" style="display: none;">
                                <input type="file" name="images[]" id="" accept="image/*" class="form-control" multiple>
                                </label>
                            </div>
                        </div>
                       <div class="row">
                       @forelse ($galleries as $index=>$gallery)
                        <div class="col-md-2">
                            <div style="border: 1px solid lightgrey; padding: 5px; text-align: center;" class="mt-3">
                            <img src="{{ asset('upload/product_images/'.$gallery->image) }}" style="height: 90px; width: 100%;" alt="">
                            <a href="{{ route('admin.remove.gallery',$gallery->id) }}" class="remove_gallery"><small>Remove Image</small></a><br>
                            <input type="radio" name="is_main" class="mt-3"  @if($gallery->is_main == 1)  checked @endif value="{{$gallery->id}}">
                        </div>
                       </div>
                       @empty
                       No Images Added
                       @endforelse
                    </div>
                       <small class="text-danger">@error ('images[]') {{ $message }} @enderror</small>
                    </div>

                    <div class="col-md-12 mt-4">
                        <label for="description" class="form-label"><b>Description</b></label>
                        <textarea name="description" id="description" class="form-control" cols="30" rows="3" >{{ $product->description }}</textarea>
                        <small class="text-danger">@error ('description') {{$message}} @enderror</small>
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
