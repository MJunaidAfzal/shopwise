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
                                    <h3>User Create</h3>
                                </div>
                                <div class="col-md-2">
                                    <a type="button" class="btn btn-primary" href="{{ route('admin.user.index') }}"><b>BACK</b></a>
                                </div>

                            </div>

                            <form action="{{ route('admin.user.store') }}" method="POST">
                                @csrf
                                <div class="row mt-5">
                                    <div class="col-md-6">
                                        <label for="name"><small>Name</small></label>
                                        <input type="text" name="name" class="form-control mt-2" placeholder="Enter Name">
                                        <small class="text-danger">@error ('name') {{ $message }} @enderror</small>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="email"><small>Email</small></label>
                                        <input type="text" name="email" class="form-control mt-2" placeholder="Enter Email">
                                        <small class="text-danger">@error ('email') {{ $message }} @enderror</small>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="type"><small>Type</small></label>
                                        <select name="type" class="form-control mt-2">
                                            <option value="">Please Select</option>
                                            <option value="user">User</option>
                                            <option value="reader">Reader</option>
                                        </select>
                                        <small class="text-danger">@error ('type') {{ $message }} @enderror</small>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label for="password"><small>Password</small></label>
                                        <input type="password" name="password" class="form-control mt-2" placeholder="Enter Password">
                                        <small class="text-danger">@error ('password') {{ $message }} @enderror</small>
                                    </div>

                                    <div class="col-md-12 mt-4">
                                        <button style="float: right" class="btn btn-primary" type="submit"><b>CREATE</b></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
