@extends('backend.layouts.app-master')
@section('content')
<div class="container-xl">
    <div class="table-title">
        <div class="row">
            <div class="header d-flex justify-content-between align-items-center">
                <h2>All Users</h2>
                @if (Auth::user()->role == 'admin' || Auth::user()->role == 'superadmin')
                    <a href="{{ route('users.create') }}" class="btn btn-sm btn-info text-light">Add User</a>
                @endif
            </div>
        </div>
    </div>
    <div class="table-wrapper">
        <table class="table table-striped table-hover yajra-datatable" width="100%">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Image</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Chapter</th>
                    <th>Constituence</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>
@endsection
@include('backend.layouts.datatable_libraries')
@push('scripts')

    <script type="text/javascript">
        $(function () {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('users.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'image', name: 'image'},
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'chapter', name: 'chapter'},
                    {data: 'constituency', name: 'constituency'},
                    {data: 'status', name: 'status'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });

        });
        $('body').on('click', '.deleteItem', function () {
            var $id = $(this).data("id");
            confirm("Are You sure want to delete !");
            $.ajax({
                type: "DELETE",
                url: "{{ url('users/".$id ."/delete') }}",
                success: function (data) {
                    table.draw();
                },
                error: function (data) {
                    console.log('Error:', data);
                }
            });
        });
    </script>
@endpush