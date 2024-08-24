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
                            <h2><b>Social Handles</b></h2>
                        </div>
                    </div>
                    @if(!empty($setting))
                    {!! Form::model($setting, ['route'=> ['admin.setting.update', $setting->id],'enctype' => 'multipart/form-data']) !!}
                    @method('PUT')
                    @else
                    <form action="{{ route('admin.setting.store') }}" method="POST" enctype="multipart/form-data">
                    @endif
                    @csrf
                     <div class="row">
                        <div class="col-md-4 mt-4">
                            <div class="form-floating">
                               {!! Form::text('facebook', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Facebook', 'aria-describedby' => 'floatingInputHelp' , 'required']) !!}
                               <label for="floatingInput">Facebook</label>
                               <small class="text-danger">@error ('facebook') {{ $message }} @enderror</small>
                            </div>
                         </div>
                         <div class="col-md-4 mt-4">
                            <div class="form-floating">
                               {!! Form::text('twitter', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Twitter', 'aria-describedby' => 'floatingInputHelp' , 'required']) !!}
                               <label for="floatingInput">Twitter</label>
                               <small class="text-danger">@error ('twitter') {{ $message }} @enderror</small>
                            </div>
                         </div>
                         <div class="col-md-4 mt-4">
                            <div class="form-floating">
                               {!! Form::text('instagram', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Instagram', 'aria-describedby' => 'floatingInputHelp' , 'required']) !!}
                               <label for="floatingInput">Instagram</label>
                               <small class="text-danger">@error ('instagram') {{ $message }} @enderror</small>
                            </div>
                         </div>
                         <div class="col-md-4 mt-4">
                            <div class="form-floating">
                               {!! Form::text('google', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Google', 'aria-describedby' => 'floatingInputHelp' , 'required']) !!}
                               <label for="floatingInput">Google</label>
                               <small class="text-danger">@error ('google') {{ $message }} @enderror</small>
                            </div>
                         </div>
                         <div class="col-md-4 mt-4">
                            <div class="form-floating">
                               {!! Form::text('youtube', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Youtube', 'aria-describedby' => 'floatingInputHelp' , 'required']) !!}
                               <label for="floatingInput">Youtube</label>
                               <small class="text-danger">@error ('youtube') {{ $message }} @enderror</small>
                            </div>
                         </div>

                         <div class="col-md-12 mt-5">
                            <h2><b>Logos</b></h2>
                        </div>
                         <div class="col-md-4 mt-4">
                            <label for="header">Header</label>
                            <input type="file" class="form-control mt-3  p-3 " name="header" >
                            @if(!empty($setting->header))
                            <img src="{{asset('upload/setting/'.$setting->header)}}" alt="" width="100px" class="img-thumbnail mt-3">
                        @endif
                        </div>

                        <div class="col-md-4 mt-4">
                            <label for="footer">Footer</label>
                            <input type="file" class="form-control mt-3  p-3 " name="footer" >
                            @if(!empty($setting->footer))
                            <img src="{{asset('upload/setting/'.$setting->footer)}}" alt="" width="100px" class="img-thumbnail mt-3">
                        @endif
                        </div>

                        <div class="col-md-4 mt-4">
                            <label for="favico">Favico</label>
                            <input type="file" class="form-control mt-3  p-3 " name="favico" >
                            @if(!empty($setting->favico))
                            <img src="{{asset('upload/setting/'.$setting->favico)}}" alt="" width="100px" class="img-thumbnail mt-3">
                        @endif
                        </div>


                        <div class="col-md-12 mt-5">
                            <h2><b>Address Details</b></h2>
                        </div>

                        <div class="col-md-4 mt-4">
                            <div class="form-floating">
                               {!! Form::number('phone', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Phone', 'aria-describedby' => 'floatingInputHelp' , 'required']) !!}
                               <label for="floatingInput">Phone</label>
                               <small class="text-danger">@error ('phone') {{ $message }} @enderror</small>
                            </div>
                         </div>
                         <div class="col-md-4 mt-4">
                            <div class="form-floating">
                               {!! Form::email('email', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Email', 'aria-describedby' => 'floatingInputHelp' , 'required']) !!}
                               <label for="floatingInput">Email</label>
                               <small class="text-danger">@error ('email') {{ $message }} @enderror</small>
                            </div>
                         </div>
                         <div class="col-md-4 mt-4">
                            <div class="form-floating">
                               {!! Form::text('address', null, ['class' => 'form-control', 'id' => 'floatingInput', 'placeholder' => 'Enter your Address', 'aria-describedby' => 'floatingInputHelp' , 'required']) !!}
                               <label for="floatingInput">Address</label>
                               <small class="text-danger">@error ('address') {{ $message }} @enderror</small>
                            </div>
                         </div>
                        <div class="col-md-12">
                           <div style="float: right; " class="mt-4">
                              <button type="submit" class="btn  btn-primary waves-effect"><b>UPDATE</b></button>
                           </div>
                        </div>
                     </div>
                     @if(!empty($setting))
                     {!! Form::close() !!}
                     @else
                     </form>
                     @endif
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
