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
                                <h2><b>Orders List</b></h2>
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <table class="table table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>TRACKING NO</th>
                                        <th>TOTAL PRICE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                         @forelse ($orders as $index=>$item)
                         <tbody>
                            <tr>
                                <td>{{ ++$index }}</td>
                                <td>{{ $item->tracking_no }}</td>
                                <td>${{ $item->total_price }}</td>
                                <td>
                                   <a href="{{ route('admin.order.view',$item->id) }}" class="btn btn-primary">View</a>
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

