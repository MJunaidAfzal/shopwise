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
                            <div class="col-md-9">
                                <h2><b>Category List</b></h2>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('admin.category.create') }}"><button style="float: right" class="btn btn-primary"><b>CREATE CATEGORY</b></button></a>
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <table class="table table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>IMAGE</th>
                                        <th>STATUS</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                             @forelse ($categories as $index=>$category)
                             <tbody>
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $category->name }}</td>
                                    <td class="text-center" style="width: 10%;"><a  href="{{ url('/').'/upload/category/'. $category->icon }}" target="_blank"><i class="fa fa-image"></i></a></td>
                                    <td>
                                        @if($category->status == 1)
                                        <span class="badge bg-label-success me-1">Active</span>
                                        @else
                                        <span class="badge bg-label-danger me-1">Deactive</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.category.edit',$category->slug) }}"><i class="text-info fa fa-edit"></i> </a>&nbsp;|&nbsp;
                                        <form action="{{ route('admin.category.destroy',$category->id) }}" method="POST" style="display:inline;">
                                         @csrf
                                             @method('DELETE')
                                             <button type="submit" style="border: none; background-color: transparent;" onclick="return confirm('Are you sure you want to delete this data?')"><i class="text-danger fa fa-trash"></i></button>
                                     </form>
                                     </td>
                                </tr>
                            </tbody>
                             @empty

                             @endforelse
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          </div>
       </div>
    </div>
    </div>


@endsection
@push('scripts')
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap4.min.js"></script>
<script>
   $(document).ready(function () {
       $('#table').DataTable();
   });

   </script>
@endpush
