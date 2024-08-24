@extends('reader.layouts.reader-scaffold')
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
                                <div class="col-md-9">
                                    <h3>Profile Edit</h3>
                                </div>
                                <div class="col-md-1">
                                    <a type="button" class="btn btn-primary" href="{{ route('reader.dashboard') }}"><b>BACK</b></a>
                                </div>
                                <div class="col-md-2">
                                    <a type="button" class="btn btn-primary" href="{{ route('reader.profile.view') }}"><i style="margin-right: 5px" class="fa fa-eye"></i> <b>VIEW</b></a>
                                </div>
                            </div>
                            <form action="{{ route('reader.profile.update',$profile->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row mt-5">
                                    <div class="col-md-4">
                                        <label for="first_name"><small>First Name</small></label>
                                        <input type="text" value="{{ auth()->user()->first_name }}" name="first_name" class="form-control mt-2" placeholder="Enter First Name">
                                        <small class="text-danger">@error ('first_name') {{ $message }} @enderror</small>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="last_name"><small>Last Name</small></label>
                                        <input type="text" value="{{ auth()->user()->last_name }}" name="last_name" class="form-control mt-2" placeholder="Enter Last Name">
                                        <small class="text-danger">@error ('last_name') {{ $message }} @enderror</small>
                                    </div>
                                    <div class="col-md-4">
                                        <label for="name"><small>User Name</small></label>
                                        <input type="text" value="{{ auth()->user()->name }}" name="name" class="form-control mt-2" placeholder="Enter User Name">
                                        <small class="text-danger">@error ('name') {{ $message }} @enderror</small>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="country"><small>Country</small></label>
                                        <input type="text" value="{{ auth()->user()->country }}" name="country" class="form-control mt-2" placeholder="Enter Your Country">
                                        <small class="text-danger">@error ('name') {{ $message }} @enderror</small>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="state"><small>State</small></label>
                                        <input type="text" value="{{ auth()->user()->state }}" name="state" class="form-control mt-2" placeholder="Enter Your State">
                                        <small class="text-danger">@error ('state') {{ $message }} @enderror</small>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="city"><small>City</small></label>
                                        <input type="text" value="{{ auth()->user()->city }}" name="city" class="form-control mt-2" placeholder="Enter Your City">
                                        <small class="text-danger">@error ('city') {{ $message }} @enderror</small>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="phone"><small>Phone Number</small></label>
                                        <input type="number" value="{{ auth()->user()->phone }}" name="phone" class="form-control mt-2" placeholder="Enter Phone Number">
                                        <small class="text-danger">@error ('phone') {{ $message }} @enderror</small>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="dob"><small>Date of Birth</small></label>
                                        <input type="date" value="{{ auth()->user()->dob }}" name="dob" class="form-control mt-2" placeholder="Enter DOB">
                                        <small class="text-danger">@error ('dob') {{ $message }} @enderror</small>
                                    </div>
                                    <div class="col-md-4 mt-4">
                                        <label for="image"><small>Image</small></label>
                                        <input type="file" name="image" class="form-control mt-2">
                                        @if(!empty(auth()->user()->image))
                                        <img src="{{asset('upload/image/'.$profile->image)}}" alt="" width="70px" class="img-thumbnail mt-3">
                                        @endif
                                        <small class="text-danger">@error ('image') {{ $message }} @enderror</small>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label for="address">Address</label>
                                        <textarea  name="address" class="form-control mt-3" cols="30" rows="4" placeholder="Enter Your Address">{{ auth()->user()->address }}</textarea>
                                        <small class="text-danger">@error ('address') {{ $message }} @enderror</small>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <label for="address2">Address 2</label>
                                        <textarea  name="address2" class="form-control mt-3" cols="30" rows="4" placeholder="Enter Your Address">{{ auth()->user()->address2 }}</textarea>
                                        <small class="text-danger">@error ('address2') {{ $message }} @enderror</small>
                                    </div>
                                    <div class="col-md-12 mt-4">
                                        <button style="float: right" class="btn btn-primary" type="submit"><b>UPDATE</b></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
@endsection
