@extends('admin.layouts.admin-scaffold')
@push('title')
   {{ $title ?? ''}}
@endpush
@section('content')
    <div class="layout-page">
        <div class="content-wrapper">
            <div class="container-xxl flex-grow-1 container-p-y">
                <div class="card">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="card-header"><b>Search Blogs</b></h2>
                        </div>
                        <div class="col-md-6">
                            <a href="{{ route('admin.blog.index') }}">
                                <div style="float: right; margin-right: 15px;" class="mt-4">
                                <button class="btn btn-primary"><b>BACK</b></button>
                            </div></a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mt-5">
                            <select name="search" id="search" class="form-control mt-2 p-3">
                                <option value="">Please Select</option>
                                @foreach ($blogs as $blog)
                                    <option value="{{ $blog->id }}">{{ $blog->title }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="mt-5">
                            <div id="blogs">



                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script>

        $(document).ready(function() {
            $('#search').change(function() {
                var selectedId = $(this).val();
                if (selectedId) {
                    routetoBlog(selectedId);
                }
            });
        });

        function routetoBlog(id) {
            $.ajax({
                url: '{{ route('admin.blog.blogSearch', ['id' => ':id']) }}'.replace(':id', id),
                type: 'get',
                data: {},
                success: function(res) {
                    $('#blogs').html(res.data);

                },
                error: function(res) {
                    toastr.error('Something went wrong');
                }
            });
        }
    </script>
@endpush
