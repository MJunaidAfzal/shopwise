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
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-9">
                                    <h3><b>View Your Profile</b></h3>
                                </div>
                                <div class="col-md-2">
                                    <a href="{{ route('user.profile') }}"><button class="btn btn-primary"><b><i style="margin-right:5px" class="fa fa-edit"></i> EDIT</b></button></a>
                                </div>
                                <div class="col-md-1">
                                    <a href="{{ route('user.dashboard') }}"><button class="btn btn-primary"><b>BACK</b></button></a>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-6 text-center">
                                    <img class="rounded-circle" style="height: 300px" src="{{ asset('upload/image/'.auth()->user()->image) }}" alt="">
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3 mt-5 text-center">
                                    <i><b>FIRST NAME</b></i><br>
                                    <b style="color: black">{{ auth()->user()->first_name }}</b>
                                </div>
                                <div class="col-md-3 mt-5 text-center">
                                    <i><b>LAST NAME</b></i><br>
                                    <b style="color: black">{{ auth()->user()->last_name }}</b>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3 mt-4 text-center">
                                    <i><b>USER NAME</b></i><br>
                                    <b style="color: black">{{ auth()->user()->name }}</b>
                                </div>
                                <div class="col-md-3 mt-4 text-center">
                                    <i><b>PHONE</b></i><br>
                                    <b style="color: black">{{ auth()->user()->phone }}</b>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3 mt-4 text-center">
                                    <i><b>DATE OF BIRTH</b></i><br>
                                    <b style="color: black">{{ auth()->user()->dob }}</b>
                                </div>
                                <div class="col-md-3 mt-4 text-center">
                                    <i><b>YOUR TYPE</b></i><br>
                                    <b style="color: black">{{ auth()->user()->type }}</b>
                                </div>
                                <div class="col-md-3"></div>
                                <div class="col-md-3"></div>
                                <div class="col-md-6 mt-4 text-center">
                                    <i><b>ADDRESS</b></i><br>
                                    <b style="color: black">{{ auth()->user()->address }}</b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
