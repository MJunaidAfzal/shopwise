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
                                <h2><b>Contact List</b></h2>
                            </div>
                        </div>
                        <div class="col-md-12 mt-5">
                            <table class="table table-striped" id="table">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>NAME</th>
                                        <th>EMAIL</th>
                                        <th>PHONE</th>
                                        <th>SUBJECT</th>
                                        <th>MESSAGE</th>
                                        <th>ACTION</th>
                                    </tr>
                                </thead>
                             @forelse ($contacts as $index=>$contact)
                             <tbody>
                                <tr>
                                    <td>{{ ++$index }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ $contact->message }}</td>
                                    <td>
                                        <form action="{{ route('admin.contact.destroy',$contact->id) }}" method="POST" style="display:inline;">
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

