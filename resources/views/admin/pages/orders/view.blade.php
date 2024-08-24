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
                                <h2><b>Order Detail</b></h2>
                            </div>
                            <div class="col-md-3">
                                <a href="{{ route('admin.order.index') }}" class="btn btn-primary float-end"><b>BACK</b></a>
                            </div>
                            <hr>
                        </div>
                      <div class="row">
                        <div class="col-md-6">
                            <h4><b>Shipping Details</b></h4>
                            <hr>
                          <div class="row">
                            <div class="col-md-6">
                                <label for="first_name">First Name</label>
                                <div class="p-2 border">{{ $order->first_name }}</div>
                            </div>
                            <div class="col-md-6">
                                <label for="last_name">Last Name</label>
                                <div class="p-2 border">{{ $order->last_name }}</div>
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="email">Email</label>
                                <div class="p-2 border">{{ $order->email }}</div>
                            </div>
                            <div class="col-md-6">
                                <label for="phone">Contact No</label>
                                <div class="p-2 border">{{ $order->phone }}</div>
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="phone">Shipping Address</label>
                                <div class="p-2 border">{{ $order->address }} <br> {{ $order->address2 }}</div>
                            </div>
                          </div>
                          <div class="row mt-3">
                            <div class="col-md-12">
                                <label for="zipcode">Zip Code</label>
                                <div class="p-2 border">{{ $order->pincode }}</div>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                            <h4><b>Order Details</b></h4>
                            <hr>
                            <table class="table table-bordered">
                             <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Image</th>
                                </tr>
                             </thead>
                                @foreach ($order->orderitems as $item)
                                <tbody>
                                    <tr>
                                        <td>{{ $item->products->title }}</td>
                                        <td>{{ $item->qty }}</td>
                                        <td>{{ $item->price }}</td>
                                        <td><img width="50px" height="50px" src="{{ asset('upload/product_images/'.mainImage($item->products->id)) }}" alt=""></td>
                                    </tr>
                                </tbody>
                                @endforeach
                            </table>
                            <h4 class="mt-3"><b>Grand Total : ${{ $order->total_price }}</b></h4>
                        </div>
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

