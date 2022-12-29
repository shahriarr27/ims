@push('styles')
<link rel="stylesheet" href="{{ asset("backend/plugins/datatables/datatables.min.css") }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('backend/plugins/datatables/Buttons/css/buttons.bootstrap.css') }}">
{{-- <link rel="stylesheet" href="{{ asset('backend/plugins/jquery-datatables-checkboxes/css/dataTables.checkboxes.css') }}"> --}}
@endpush

@push('scripts')
<script src="{{ asset('backend/plugins/datatables/js/datatables.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('backend/plugins/datatables/Buttons/js/buttons.bootstrap.js') }}"></script>
{{-- <script src="{{ asset('backend/plugins/jquery-datatables-checkboxes/js/dataTables.checkboxes.min.js') }}"></script> --}}
@endpush
