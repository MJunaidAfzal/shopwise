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
                  <div class="col-md-2"></div>
                  <div class="col-md-8">
                    <div class="card mt-5">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-10">
                                    <h3>User Import</h3>
                                </div>
                                <div class="col-md-2">
                                    <a type="button" class="btn btn-primary" href="{{ route('admin.user.index') }}"><b>BACK</b></a>
                                </div>

                            </div>

                            <form action="{{ route('admin.user.importData') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8">
                                        <label for="import">Select File</label>
                                        <input type="file"  name="file" class="form-control mt-3 p-3">
                                       <div class="mt-4">
                                        <b class="text-dark">Required</b><br>
                                        <small class="text-danger"> You should import your excel file like this! </small><br>
                                        <i class="fa fa-arrow-down	"></i>
                                       </div>
                                       <a class="btn btn-success mt-3 " href="{{ asset('admin/assets/excel/import.xlsx') }}">
                                        <b>EXCEL FILE</b>
                                       </a>
                                        <button type="submit" class="btn btn-primary mt-3 " style="float: right"><b>IMPORT FILE</b></button>
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
