@extends('backend.layouts.app-master')

@section('content')
    <div class=" p-4 rounded">
        <div class="container mt-4">

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('settingsStore') }}" class="settingsForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-body">

                                <div class="row">
                                    <label for="" class="col-sm-3">Maintainance Image</label>
                                    <div class="col-sm-8">
                                        <div class="file-drop-area">
                                            <span class="choose-file-button">Add maintainance image</span>
                                            <span class="file-message">or drag and drop files here</span>
                                            <input type="hidden" value="site_maintainance_image" name="type[]">
                                            <input type="file" name="site_maintainance_image" value="{{ echo_setting('site_maintainance_image') }}" class="site_maintainance_image" accept=".jpg,.jpeg,.png">
                                        </div>
                                        <div id="divImageMediaPreview">
                                            @if(!empty(get_setting('site_maintainance_image')))
                                                <img style="width: 150px; height:100px; padding: 10px" src="{{ echo_setting('site_maintainance_image') }}">
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="maintainance_message" class="col-sm-3">Maintainance Message</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" value="maintainance_message" name="type[]">
                                        <textarea name="maintainance_message" class="form-control form-control-sm" id="maintainance_message" rows="10">{{ echo_setting('maintainance_message') }}</textarea>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <label for="" class="col-sm-3">Enable/Disable Maintainance</label>
                                    <div class="col-sm-8">
                                        <div class="custom-control custom-switch">
                                            <input type="hidden" value="maintainance_activance" name="type[]">
                                            <input type="checkbox" class="custom-control-input" name="maintainance_activance" {{ get_setting('maintainance_activance') == 'on' ? 'checked' : '' }} id="maintainance_activance">
                                            <label class="custom-control-label" for="maintainance_activance">Enable / Disable</label>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-sm-11 text-right">
                                        <input type="submit" class="btn btn-primary" value="Save">
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
    .site_maintainance_image{
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
        $(document).on('change', '.site_maintainance_image', function() {
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
    })
</script>
@endpush
