@extends('admin.layouts.admin-scaffold')
@push('title')
    {{ $title ?? '' }}
@endpush
@push('styles')
    <style>
        body {
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
                            <h2><b>User Edit</b></h2>
                        </div>
                        <div class="col-md-2 mb-3">
                                <a href="{{ route('admin.user.index') }}" class="btn btn-primary waves-effect"> Go Back</a>
                        </div>
                      </div>
                        <hr>

                        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
                            @csrf
                            <div class="col-md-12">
                                <h5>
                                    isBan Status: @if ($user->isban == '0')
                                        <label class="py-2 px-3 badge btn-primary">Not Banned </label>
                                    @elseif($user->isban == '1')
                                        <label class="py-2 px-3 badge btn-danger">Banned</label>
                                    @endif
                                </h5>

                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <select name="isban" class="form-control mt-3">
                                        <option value="">Please Select</option>
                                        <option value="0">UnBanned</option>
                                        <option value="1">Banned</option>
                                    </select>
                                    <label for="floatingInput">IsBan/UnBan</label>
                                    <small class="text-danger">
                                        @error('isban')
                                            {{ $message }}
                                        @enderror
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div style="float: right; " class="mt-4">
                                    <button type="submit" class="btn  btn-primary waves-effect">Update</button>
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
