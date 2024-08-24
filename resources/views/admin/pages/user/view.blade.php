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
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3><b>User Profile</b></h3>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('admin.user.index') }}"><button class="btn btn-primary"><b>BACK</b></button></a>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-6 text-center">
                                    @if(!empty($user->image))
                                    <img class="rounded-circle" style="height: 300px" src="{{ asset('upload/image/'.$user->image) }}" alt="">
                                    @else
                                    <img class="rounded-circle" style="height: 300px"  src="{{ asset('admin/assets/img/logo.jpg') }}" alt="">
                                    @endif
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3 mt-5 text-center">
                                    <i><b>FIRST NAME</b></i><br>
                                    @if(!empty($user->first_name))
                                    <b style="color: black">{{ $user->first_name }}</b>
                                    @else
                                    <b>--</b>
                                    @endif
                                </div>
                                <div class="col-md-3 mt-5 text-center">
                                    <i><b>LAST NAME</b></i><br>
                                    @if(!empty($user->last_name))
                                    <b style="color: black">{{ $user->last_name }}</b>
                                    @else
                                    <b>--</b>
                                    @endif
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3 mt-4 text-center">
                                    <i><b>USER NAME</b></i><br>
                                    <b style="color: black">{{ $user->name }}</b>
                                </div>
                                <div class="col-md-3 mt-4 text-center">
                                    <i><b>PHONE</b></i><br>
                                    @if(!empty($user->phone))
                                    <b style="color: black">{{ $user->phone }}</b>
                                    @else
                                    <b>--</b>
                                    @endif
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3 mt-4 text-center">
                                    <i><b>DATE OF BIRTH</b></i><br>
                                    @if(!empty($user->dob))
                                    <b style="color: black">{{ $user->dob }}</b>
                                    @else
                                    <b>--</b>
                                    @endif
                                </div>
                                <div class="col-md-3 mt-4 text-center">
                                    <i><b>USER TYPE</b></i><br>
                                    <b style="color: black">{{ $user->type }}</b>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-6 mt-4 text-center">
                                    <i><b>ADDRESS</b></i><br>
                                    @if(!empty($user->dob))
                                    <b style="color: black">{{ $user->address }}</b>
                                    @else
                                    <b>--</b>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
