@extends('backend.layouts.app-master')

@section('content')

    <div class="bg-light p-4 rounded">
        <table class="table table-bordered table-sm yajra-datatable">
            <thead>
            <tr>
                <th scope="col" width="1%">#</th>
                <th scope="col" width="15%">Name</th>
                <th scope="col" width="15%">Guard</th>
                <th scope="col" width="1%">Action</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>

    </div>
@endsection

@include('backend.layouts.datatable_libraries')

@push('scripts')

    <script type="text/javascript">
        $(function () {

            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('permissions.index') }}",
                columns: [
                    {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                    {data: 'name', name: 'name'},
                    {data: 'guard_name', name: 'guard_name'},
                    {
                        data: 'action',
                        name: 'action',
                        orderable: false,
                        searchable: false
                    },
                ],
            });

        });
    </script>
@endpush
