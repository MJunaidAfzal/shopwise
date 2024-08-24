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
                            <h2><b>User List</b></h2>
                        </div>
                        <div class="col-md-2">
                            <a href="{{ route('admin.user.create') }}"> <button class="btn btn-primary"> <b>CREATE USER</b></button></a>
                            <a href="{{ route('admin.user.import') }}"> <button class="btn btn-info mt-2"> <b><i style="margin-right:5px"   class="fa fa-upload w-40"></i> IMPORT</b></button></a>
                            <a href="{{ route('admin.user.export') }}"> <button class="btn btn-success mt-2"> <b><i style="margin-right:5px" class="fa fa-download w-40"></i>EXPORT</b></button></a>
                        </div>
                       </div>
                       <table class="table table-striped table-bordered mt-5" id="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NAME</th>
                                <th>EMAIL</th>
                                <th>ISBAN/UNBAN</th>
                                <th>ONLINE/OFFLINE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        @forelse ($users as $index=>$user)
                        <tbody>
                            <tr>
                                <td>{{ ++ $index }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                @if($user->isban == 0)
                                <label class="py-2 px-3 badge btn-primary">Not Banned  </label><a href="{{ route('admin.user.edit',$user->name) }}"><i style="margin-left:10px" class="fa fa-edit text-info"></i></a>
                                @elseif($user->isban == '1')
                                <label class="py-2 px-3 badge btn-dark">Banned</label> <a href="{{ route('admin.user.edit',$user->name) }}"><i style="margin-left:10px" class="fa fa-edit text-info"></i></a>
                                @endif
                                </td>
                                <td>
                                    @if($user->isUserOnline())
                                      <label class="py-2 px-3 badge btn-info">Online</label>
                                    @else
                                    <label class="py-2 px-3 badge btn-warning">Offline</label>
                                    @endif
                                   </td>
                                <td>
                                    <a href="{{ route('admin.user.view',$user->id) }}"><i class="fa fa-eye text-info"></i></a>&nbsp;|&nbsp;
                                    <a href="javascript:;" onClick="changePasswordModal({{ $user->id }})"><i class="fa fa-key text-success"></i></a>&nbsp;|&nbsp;
                                    <form action="{{ route('admin.user.destroy',$user->id) }}" method="POST" style="display:inline;">
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

    {{-- Change Password --}}
    <div class="modal fade" id="changePasswordModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Change Password</h5>
            </div>
            <div class="modal-body">
              <form action="{{ route('admin.user.changePassword') }}" method="GET">
                <input type="hidden" name="user_id" id="user_id">
                <div class="row">
                    <div class="col-md-12">
                        <label for="">Password</label>
                        <input type="text" name="password" id="password" class="form-control" >
                    </div>
                    <div class="col-md-12 mt-2">
                        <button type="submit" class="btn btn-primary w-100"><b>CHANGE PASSWORD</b></button>
                    </div>
                  </div>
              </form>

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

   function changePasswordModal(user_id){
        $("#user_id").val('');
        $("#password").val('');
        $("#user_id").val(user_id);
        $('#changePasswordModal').modal('show');
   }
   </script>
@endpush

