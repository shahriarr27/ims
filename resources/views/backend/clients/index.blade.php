@extends('backend.layouts.app-master')

@section('content')

    <div class="row">
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 add_update_client_wrapper">
            <form action="{{ route('clients.store') }}" class="add_client_form" method="POST" enctype="multipart/form-data">
                @csrf
                <table class="table table-bordered client_add_table">
                    <thead>
                        <tr>
                            <th scope="col" colspan="2" style="text-align: center">Klant Invoeren</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td width="195px">Klantnummer</td>
                            <td width="230px"><input type="text" tabindex="1" name="clientnumber"></td>
                        </tr>
                        <tr>
                            <td>Pakket</td>
                            <td>
                                <div class="d-flex">
                                    <div class="custom-control custom-switch mr-2">
                                        <input type="checkbox" tabindex="2" name="package" class="custom-control-input" value="Particulier" id="Particulier">
                                        <label class="custom-control-label" for="Particulier">Particulier</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="package" class="custom-control-input" value="Zakelijk" id="Zakelijk">
                                        <label class="custom-control-label" for="Zakelijk">Zakelijk</label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Roepnaam</td>
                            <td><input type="text" tabindex="3" name="username"></td>
                        </tr>
                        <tr>
                            <td>Voornamen</td>
                            <td><input type="text" tabindex="4" name="first_name"></td>
                        </tr>
                        <tr>
                            <td>Voorletters</td>
                            <td><input type="text" tabindex="5" name="initials"></td>
                        </tr>
                        <tr>
                            <td>Voorvoegsels</td>
                            <td><input type="text" tabindex="6" name="prefix"></td>
                        </tr>
                        <tr>
                            <td>Achternaam</td>
                            <td><input type="text" tabindex="7" name="last_name" required></td>
                        </tr>
                        <tr>
                            <td>Geboortedatum</td>
                            <td>
                                <input type="text" tabindex="8" placeholder="dd/mm/yyyy" name="dob">
                            </td>
                        </tr>
                        <tr>
                            <td>Geboorteplaats</td>
                            <td><input type="text" tabindex="9" name="place_of_birth"></td>
                        </tr>
                        <tr>
                            <td>BSN</td>
                            <td><input type="text" tabindex="10" name="ssn"></td>
                        </tr>
                        <tr>
                            <td>Rijbewijs B</td>
                            <td>
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" tabindex="11" name="driving_license" class="custom-control-input" value="Yes" id="customSwitch1">
                                    <label class="custom-control-label" for="customSwitch1"></label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Geslacht</td>
                            <td>
                                <div class="d-flex">
                                    <div class="custom-control custom-switch mr-2">
                                        <input type="checkbox" tabindex="13" name="gender" class="custom-control-input" value="Man" id="customSwitch5">
                                        <label class="custom-control-label" for="customSwitch5">Man</label>
                                    </div>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" name="gender" class="custom-control-input" value="Vrouw" id="customSwitch6">
                                        <label class="custom-control-label" for="customSwitch6">Vrouw</label>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Burgerlijke staat</td>
                            <td>
								<select name="marital_status" tabindex="14">
									<option value="">Selecteren</option>
									<option value="Ongehuwd">Ongehuwd</option>
									<option value="Gehuwd">Gehuwd</option>
									<option value="Geregistreerd Partnerschap">Geregistreerd Partnerschap</option>
									<option value="Gescheiden">Gescheiden</option>
									<option value="Weduwe/Weduwnaar">Weduwe/Weduwnaar</option>
									<option value="Onbekend">Onbekend</option>
								</select>
                            </td>
                        </tr>
                        <tr>
                            <td>Woonsituatie</td>
                            <td>
                                <select name="livingsituation" tabindex="15" id="">
                                    <option value="">Selecteren</option>
                                    <option value="Alleenstaand">Alleenstaand</option>
                                    <option value="Alleenstaand met kinderen">Alleenstaand met kinderen</option>
                                    <option value="Verblijf in instelling">Verblijf in instelling</option>
                                    <option value="Zonder vaste verblijfplaats">Zonder vaste verblijfplaats</option>
                                    <option value="Samenwonend met kinderen">Samenwonend met kinderen</option>
                                    <option value="Kostganger">Kostganger</option>
                                    <option value="Onbekend">Onbekend</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Straatnaam</td>
                            <td><input type="text" tabindex="16" name="street"></td>
                        </tr>
                        <tr>
                            <td>Huisnummer</td>
                            <td><input type="text" tabindex="17" name="house"></td>
                        </tr>
                        <tr>
                            <td>Postcode</td>
                            <td><input type="text" tabindex="18" name="post_code"></td>
                        </tr>
                        <tr>
                            <td>Woonplaats</td>
                            <td><input type="text" tabindex="19" name="city"></td>
                        </tr>
                        <tr>
                            <td>Telefoon</td>
                            <td><input type="text" tabindex="20" name="phone"></td>
                        </tr>
                        <tr>
                            <td>E-mail</td>
                            <td><input type="email" tabindex="21" name="email"></td>
                        </tr>
                        <tr>
                            <td>Leefgeldrekening</td>
                            <td><input type="text" tabindex="22" name="private_account"></td>
                        </tr>
                        <tr>
                            <td>Beheerrekening Particulier</td>
                            <td><input type="text" tabindex="23" name="control_private_account"></td>
                        </tr>
                        <tr>
                            <td>Beheerrekening Zakelijk</td>
                            <td><input type="text" tabindex="24" name="control_business_bank_account"></td>
                        </tr>
                        <tr>
                            <td style="padding-top: 2px"><button type="button" class="btn btn-danger btn-sm btn-block btn-clear">Leegmaken</button></td>
                            <td><button type="submit" class="btn btn-primary btn-sm btn-block">Klantgegevens Opslaan</button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
        </div>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 position-relative display_client mb-4">
            <div class="row mb-3">
                <div class="col-6">Klantbestand</div>
                <div class="col-6">
                    <div class="custom-control custom-switch">
                        <input type="checkbox" name="display_clients" class="custom-control-input" value="0" id="display_clients" checked>
                        <label class="custom-control-label" for="display_clients"></label>
                    </div>
                </div>
            </div>
            <select name="select_active" class="display_by_switch" style="" id="select_active">
                <option value="active" selected>Actief</option>
                <option value="inactive">Inactief</option>
            </select>
            <div class="display_by_switch" style="">
                <table class="table table-bordered table-sm yajra-datatable">
                    <thead>
                    <tr>
                        <th scope="col" style="text-align: center">Klantbestand</th>
                        <th scope="col" class="text-center" width="60px">Opties</th>
                    </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    {{-- Delete Clients Modal  --}}
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Klantgegevens Verwijderen</h5>
                    <button type="button" class="close modal_close_btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="deleteForm" method="GET">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <input type="hidden" class="delete_id" value="">
                        <h2 class="text-center">Are you sure you want to delete?</h2>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary modal_close_btn" data-dismiss="modal">Nee</button>
                        <button type="submit" class="btn btn-primary delete_client">Ja</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- INactive Clients Modal  --}}
    <div class="modal fade" id="inactiveModal">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Klant Inactiveren</h5>
                    <button type="button" class="close modal_close_btn" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="inactiveForm" method="GET">
                    @csrf
                    <div class="modal-body">
                        <input type="hidden" class="inactive_id" value="">
                        <h2 class="text-center">Are you sure you want to inactive?</h2>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-secondary modal_close_btn" data-dismiss="modal">Nee</button>
                        <button type="submit" class="btn btn-primary inactive_client">Ja</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


@endsection

@include('backend.layouts.datatable_libraries')

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            $('input,select').on('keypress', function (e) {
                if (e.which == 13) {
                    e.preventDefault();
                    var $next = $('[tabIndex=' + (+this.tabIndex + 1) + ']');
                    console.log($next.length);
                    if (!$next.length) {
                        $next = $('[tabIndex=1]');
                    }
                    $next.focus();
                }
            });

            $("#display_clients").on("change", function() {
                $(".display_by_switch").toggle();
                // if($(".display_by_switch").hasClass("d-block")) {
                //     $(".display_by_switch").rmeoveClass("d-block")
                //     $(".display_by_switch").addClass("d-none")
                // } else {
                //     $(".display_by_switch").rmeoveClass("d-none")
                //     $(".display_by_switch").addClass("d-block")
                // }
                // $(".display_by_switch").hasClass("d-block").addClass("d-none");
                // $(".display_by_switch").hasClass("d-block").removeClass("d-block");
            })
        })
        $("body").on('change','input[name="gender"]', function() {
            $('input[name="gender"]').not(this).prop('checked', false);
        });

        $("body").on('change', 'input[name="package"]', function() {
            $('input[name="package"]').not(this).prop('checked', false);
        });
        $(function () {
            var selection = $("#select_active").val();
            if(selection == 'active') {
                var url = "{{ route('clients.index') }}";
            } else {
                var url = "{{ route('clients.allinactive') }}";
            }
            var table = $('.yajra-datatable').DataTable({
                processing: true,
                serverSide: true,
                ajax: url,
                pageLength: 13,
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ],
                "bLengthChange" : false,
                "bInfo":false,
                "language": {
                    "search": "",
                    "searchPlaceholder": "Zoeken",
                    'paginate': {
                        'previous': 'Vorige',
                        'next': 'Volgende'
                    },
                    "emptyTable": "Geen data.",
                    "infoEmpty": "Geen data."
                },
            });

            $("#select_active").on("change", function() {
                var selection = $(this).val();
                if(selection == "active") {
                    table.ajax.url("{{ route('clients.index') }}").load();
                } else {
                    table.ajax.url("{{ route('clients.allinactive') }}").load();
                }
            })

            $("form.add_client_form").on("submit", function(e) {
                e.preventDefault();
                var data = $("form.add_client_form").serialize();
                var url = $(this).attr('action');
                $.ajax({
                    type : "POST",
                    data : data,
                    url  : url,
                    success: function(data) {
                        if(data.status == 200) {
                            successNotify(data.message);
                            table.ajax.url("{{ route('clients.index') }}").load();
                            $("form.add_client_form input").not(("input[name='_token']")).val("");
                            $("form.add_client_form textarea").val("");
                            $("form.add_client_form select").val("");
                            $('form.add_client_form input:checkbox').each(function () { $(this).prop('checked', false); });
                        }
                    }
                });
            })

            $("body").on("click", ".btn-update", function(e) {
                e.preventDefault();
                var data = $("form.edit_client_form").serialize();
                var url = "{{ route('client.update') }}";
                $.ajax({
                    type : "POST",
                    data : data,
                    url  : url,
                    success: function(data) {
                        if(data.status == 200) {
                            var selection = $("#select_active").val();
                            if(selection == "active") {
                                table.ajax.url("{{ route('clients.index') }}").load();
                            } else {
                                table.ajax.url("{{ route('clients.allinactive') }}").load();
                            }
                            successNotify(data.message);
                            $(".add_update_client_wrapper .edit_client_form").remove();
                            $(".add_update_client_wrapper form").removeClass('d-none');
                        }
                    }
                });
            })

            $("body").on("click", '.inactive_client', function(e) {
                e.preventDefault();
                var id = $('input.inactive_id').val();
                var url = "{{ route('clients.status', ":id") }}";
                url = url.replace(":id", id);
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(data) {
                        if(data.success == true) {
                            $(".modal_close_btn").trigger('click');
                            var selected = $("#select_active").val();
                            if(selected == "inactive") {
                                table.ajax.url("{{ route('clients.allinactive') }}").load();
                            } else if(selected == "active") {
                                table.ajax.url("{{ route('clients.index') }}").load();
                            }
                            successNotify(data.message);
                        }
                    }
                });
            })
            // change_status_btn
            $('body').on("click", '.delete_btn', function() {
                var id = $(this).attr('client-id');
                $(".delete_id").val(id);
                var client = $(this).attr("client");
                $(".deleteForm h2").text("Wilt u de volgende klant verwijderen? " + client);
            })

            $('body').on("click", '.inactive_btn', function() {
                var id = $(this).attr('client-id');
                $(".inactive_id").val(id);
                var client = $(this).attr("client");
                $("#inactiveModal h5.modal-title").text("Klant Inactiveren");
                $(".inactiveForm h2").text("Wilt u " + client + " inactiveren?");
            })

            $('body').on("click", '.activate_client', function() {
                var id = $(this).attr('client-id');
                $(".inactive_id").val(id);
                var client = $(this).attr("client");
                $("#inactiveModal h5.modal-title").text("Klant Activeren");
                $(".inactiveForm h2").text("Wilt u " + client + " activeren?");
            })

            $("body").on("click", ".delete_client", function(e) {
                e.preventDefault();
                var id = $(".delete_id").val();
                var url = "{{ route('clients.destroy', ":id") }}";
                url = url.replace(":id", id);
                var client = $(this).attr("client");
                $.ajax({
                    type: "GET",
                    url: url,
                    success: function(data) {
                        if(data.status == 200) {
                            $(".modal_close_btn").trigger('click');
                            table.ajax.url("{{ route('clients.allinactive') }}").load();
                            successNotify(data.message);
                        }
                    }
                });
            })

            $('body').on("click", ".edit_btn", function() {
                $(".add_update_client_wrapper .edit_client_form").remove();
                $(".add_update_client_wrapper form").removeClass('d-none');
                var id = $(this).attr('client-id');
                var url = "{{ route('clients.edit', ":id") }}";
                url = url.replace(':id', id);
                $.ajax({
                    type: 'GET',
                    url: url,
                    success: function(data) {
                        $(".add_update_client_wrapper form").addClass('d-none');
                        $(".add_update_client_wrapper").append(data);
                    }
                })
            })

            $("body").on("click", ".btn-cancel", function() {
                $(".add_update_client_wrapper .edit_client_form").remove();
                $(".add_update_client_wrapper form").removeClass('d-none');
            })
            $("body").on("click", ".btn-clear", function() {
                $("form.add_client_form input").not(("input[name='_token']")).val("");
                $("form.add_client_form textarea").val("");
                $("form.add_client_form select").val("");
                $('form.add_client_form input[type="checkbox"]').removeAttr('checked');
                $('form.add_client_form input[type="checkbox"]').attr('checked', false);
                $('form.add_client_form input[type="checkbox"]').prop('checked', false);
                $('#Particulier').prop('checked', false);

            })
        });

    </script>
@endpush

@push('styles')
    <style>
        table.dataTable {
            width: 100% !important;
        }
        .client_add_table th, .client_add_table td,
        .client_edit_table th, .client_edit_table td {
            font-size: 13px;
            padding: 2px;
            padding-left: 5px;
        }

        .btn.btn-group.action-btn {
            padding: 0px;
        }
        .client_add_table tr td:first-child,
        .client_edit_table tr td:first-child {
            padding-top: 5px;
        }
        .client_add_table label,
        .client_edit_table label {
            margin-bottom: 0px;
        }
        .yajra-datatable td {
            padding: 3px;
            padding-left: 6px;
            line-height: 16px;
        }
        .client_add_table input,
        .client_add_table select,
        .client_add_table textarea,
        .client_edit_table input,
        .client_edit_table select,
        .client_edit_table textarea {
            border: 1px solid #ddd;
            width: 100%;
        }
        input[type=radio] {
            display: inline-block;
            width: 16px;
        }
        .modal-title {
            font-size: 17px;
        }
        .modal-header {
            padding-top: 10px;
            padding-bottom: 7px;
        }
        .form-group {
            margin-bottom: 5px;
        }
        .yajra-datatable p.description {
            line-height: 16px;
        }
        @media (min-width: 576px) {
            /* .modal-dialog {
                max-width: 650px;
                margin: 1.75rem auto;
            } */
        }
        #deleteQuestion .modal-dialog {
            max-width: 330px;
        }
        .work_sm_image {
            width: 131px;
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-top: 3px;
        }
        select#select_active {
            width: 100px;
            border: 1px solid #ddd;
            padding: 4px 5px;
            border-radius: 4px;
            position: absolute;
            z-index: 9;
        }
        input.custom-control-input {
            z-index: 99;
        }
        .page-item .page-link {
            padding: 3px 9px;
            font-size: 14px;
        }
        @media (min-width: 1200px) {
            .display_client.col-xl-3 {
                max-width: 256px !important;
                width: 256px !important;
            }
        }
        @media screen and (max-width: 1800px) and (min-width: 834px) {
            .add_update_client_wrapper {
                min-width: 409px!important;
                width: 409px ;
            }
        }
        @media(max-width: 576px) {
            table.dataTable {
                width: 100%;
            }
            .display_client {
                margin-top: 30px;
            }
            .add_update_client_wrapper .table {
                width: 100% !important;
            }
        }
    </style>
@endpush
