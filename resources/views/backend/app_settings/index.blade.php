@extends('backend.layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <div class="container mt-4">

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form action="{{ route('settingsStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <label for="" class="col-sm-4">App Name</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" name="type[]" value="company_name" >
                                        <input type="text" class="form-control" value="{{ get_setting('company_name') }}" name="company_name">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-sm-4">Favicon</label>
                                    <div class="col-sm-8">
                                        <div class="file-drop-area">
                                            <span class="choose-file-button">Choose Files</span>
                                            <span class="file-message">or drag and drop files here</span>
                                            <input type="hidden" name="type[]" value="favicon">
                                            <input type="file" name="favicon" value="{{ get_setting('favicon') }}" class="favicon" accept=".jpg,.jpeg,.png">
                                        </div>
                                        <div id="divImageMediaPreview">
                                            @if(!empty(get_setting('favicon')))
                                                <img style="width: 150px; height:100px; padding: 10px" src="{{ get_setting('favicon') }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-sm-4">Logo</label>
                                    <div class="col-sm-8">
                                        <div class="file-drop-area">
                                            <span class="choose-file-button">Choose Files</span>
                                            <span class="file-message">or drag and drop files here</span>
                                            <input type="hidden" name="type[]" value="logo">
                                            <input type="file" name="logo" value="{{ get_setting('logo') }}" class="logo" accept=".jpg,.jpeg,.png">
                                        </div>
                                        <div id="logoImageMediaPreview">
                                            @if(!empty(get_setting('logo')))
                                                <img style="width: 150px; height:100px; padding: 10px" src="{{ get_setting('logo') }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col text-right">
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <form action="{{ route('envSettingStore') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header h3">
                                Paypal Payment Settings
                            </div>
                            <div class="card-body">
                                <div class="row mt-3">
                                    <label for="" class="col-sm-4">Payment Mode</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" name="type[]" value="PAYPAL_MODE" >
                                        <select name="PAYPAL_MODE" id="" class="form-control">
                                            <option value="sandbox" {{ get_setting('PAYPAL_MODE') == 'Sandbox' ? 'selected' : "" }}>Sandbox</option>
                                            <option value="live" {{ get_setting('PAYPAL_MODE') == 'Live' ? 'selected' : "" }}>Live</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-sm-4">App ID</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" name="type[]" value="PAYPAL_LIVE_APP_ID">
                                        <input type="text" name="PAYPAL_LIVE_APP_ID" class="form-control" placeholder="Paypal app ID" value="{{ get_setting('PAYPAL_LIVE_APP_ID') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-sm-4">Client ID</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" name="type[]" value="PAYPAL_LIVE_CLIENT_ID">
                                        <input type="text" name="PAYPAL_LIVE_CLIENT_ID" class="form-control" placeholder="Paypal Client ID" value="{{ get_setting('PAYPAL_LIVE_CLIENT_ID') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-sm-4">Client Secret</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" name="type[]" value="PAYPAL_LIVE_CLIENT_SECRET">
                                        <input type="text" name="PAYPAL_LIVE_CLIENT_SECRET" class="form-control" placeholder="Paypal Client Secret" value="{{ get_setting('PAYPAL_LIVE_CLIENT_SECRET') }}">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="" class="col-sm-4">Currency</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" name="type[]" value="PAYPAL_CURRENCY">
                                        <input type="text" name="PAYPAL_CURRENCY" class="form-control" placeholder="Enter Currecny" value="{{ get_setting('PAYPAL_CURRENCY') }}">
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col text-right">
                                        <input type="submit" class="btn btn-primary" value="Update">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

    </div>
@endsection

@push('styles')
    <style>
        .file-drop-area{
            position: relative;
            display: flex;
            align-items: center;
            /*width: 450px;*/
            max-width: 100%;
            padding:25px;
            border: 1px dashed rgb(0 0 0 / 40%);
            border-radius: 3px;
            transition: .2s;
        }
        .choose-file-button{
            flex-shrink: 0;
            background-color: rgb(0 0 0 / 10%);
            border: 1px solid rgb(0 0 0 / 10%);
            border-radius: 3px;
            padding: 8px 15px;
            margin-right: 10px;
            font-size: 12px;
            text-transform: uppercase;
        }
        .file-message{
            font-size: small;
            font-weight: 300;
            line-height: 1.4;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .favicon, .logo{
            position: absolute;
            left: 0;
            top:0;
            height: 100%;
            widows: 100%;
            cursor: pointer;
            opacity: 0;
        }
    </style>
@endpush

@push('scripts')
<script>

    $(function() {
        $(document).on('change', '.favicon', function() {
            var filesCount = $(this)[0].files.length;
            var textbox = $(this).prev();
            if (filesCount === 1) {
                var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
            } else {
                textbox.text(filesCount + ' files selected');
            }

            if (typeof (FileReader) != "undefined") {
                var dvPreview = $("#divImageMediaPreview");
                dvPreview.html("");
                $($(this)[0].files).each(function () {
                    var file = $(this);
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = $("<img />");
                        img.attr("style", "width: 150px; height:100px; padding: 10px");
                        img.attr("src", e.target.result);
                        dvPreview.append(img);
                    }
                    reader.readAsDataURL(file[0]);
                });
            } else {
                alert("This browser does not support HTML5 FileReader.");
            }
        });

        $(document).on('change', '.logo', function() {
            var filesCount = $(this)[0].files.length;
            var textbox = $(this).prev();
            if (filesCount === 1) {
                var fileName = $(this).val().split('\\').pop();
            textbox.text(fileName);
            } else {
                textbox.text(filesCount + ' files selected');
            }

            if (typeof (FileReader) != "undefined") {
                var dvPreview = $("#logoImageMediaPreview");
                dvPreview.html("");
                $($(this)[0].files).each(function () {
                    var file = $(this);
                    var reader = new FileReader();
                    reader.onload = function (e) {
                        var img = $("<img />");
                        img.attr("style", "width: 150px; height:100px; padding: 10px");
                        img.attr("src", e.target.result);
                        dvPreview.append(img);
                    }
                    reader.readAsDataURL(file[0]);
                });
            } else {
                alert("This browser does not support HTML5 FileReader.");
            }
        });
    })
</script>
@endpush
