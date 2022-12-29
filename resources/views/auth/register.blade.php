@extends('frontend.layouts.auth.auth-master')
@section('content')
<div class="wrapper wrapper--w680">
    <div class="card card-4">
        <div class="card-body">
            <h2 class="title text-center">Registration Form</h2>
            <form method="POST" action="{{ route('register.perform') }}" enctype="multipart/form-data">
                @csrf
                <div class="row row-space">
                    <div class="col-6">
                        <div class="input-group">
                            <label class="label">first name</label>
                            <input class="input--style-4" type="text" name="firstname">
                            @error('firstname')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <label class="label">last name</label>
                            <input class="input--style-4" type="text" name="lastname">
                            @error('lastname')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <label class="label">Email</label>
                            <input class="input--style-4" type="email" name="email">
                            @error('email')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <label class="label">Phone Number</label>
                            <input class="input--style-4" type="text" name="phone">
                            @error('phone')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <hr>
                    <div class="col-6">
                        <div class="input-group">
                            <label class="label">Password</label>
                            <input class="input--style-4" type="password" name="password">
                            @error('password')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <label class="label">Password</label>
                            <input class="input--style-4" type="password" name="password_confirmation">
                            @error('password')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <label class="label">Gender</label>
                            <div class="p-t-10">
                                <label class="radio-container m-r-45">Male
                                    <input type="radio" name="gender" value="Male">
                                    <span class="checkmark"></span>
                                </label>
                                <label class="radio-container">Female
                                    <input type="radio" name="gender" value="Female">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            @error('gender')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <label class="label">Town/City</label>
                            <input class="input--style-4" type="text" name="city1">
                            @error('city1')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <label class="label">Post Code</label>
                            <input class="input--style-4" type="text" name="post_code">
                            @error('post_code')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="row row-space">
                    <div class="col-6">
                        <div class="form-group">
                            <label class="label">Constituency</label>
                            <input class="input--style-4" type="text" name="constituency">
                            @error('constituency')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <label class="label">Chapter</label>
                            <div class="rs-select2 js-select-simple select--no-search">
                                <select name="chapter">
                                    <option disabled="disabled" selected="selected">Choose option</option>
                                    <option value="Aachen">Aachen</option>
                                    <option value="Berlin">Berlin</option>
                                    <option value="Bielefeld">Bielefeld</option>
                                    <option value="Bonn">Bonn</option>
                                    <option value="Bremen">Bremen</option>
                                    <option value="Bremerhaven">Bremerhaven</option>
                                    <option value="Darmstadt">Darmstadt</option>
                                    <option value="Dortmund">Dortmund</option>
                                    <option value="Duisburg">Duisburg</option>
                                    <option value="Düsseldorf">Düsseldorf</option>
                                    <option value="Duisburg">Duisburg</option>
                                    <option value="Frankfurt">Frankfurt</option>
                                    <option value="Freiberg">Freiberg</option>
                                    <option value="Freising">Freising</option>
                                    <option value="Hamburg">Hamburg</option>
                                    <option value="Hannover">Hannover</option>
                                    <option value="Köln">Köln</option>
                                    <option value="Leipzig">Leipzig</option>
                                    <option value="Mühlheim">Mühlheim</option>
                                    <option value="München">München</option>
                                    <option value="Nürnber">Nürnber</option>
                                    <option value="Rhein-Neckar">Rhein-Neckar</option>
                                    <option value="Saarland">Saarland</option>
                                    <option value="Stuttgart">Stuttgart</option>
                                </select>
                                <div class="select-dropdown"></div>
                            </div>
                            @error('chapter')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                    </div>
                </div>
                <div class="row row-space mt-3">
                    <div class="col-6">
                        <div class="input-group">
                            <label class="label">Upload Your Image here</label>
                            <div class="file-drop-area">
                                <input type="file" name="image" value="{{ get_setting('image') }}" class="image">
                            </div>
                            <div id="divImageMediaPreview">
                                @if(!empty(get_setting('image')))
                                    <img style="width: 150px; height:100px; object-fit:cover; object-position:top" src="{{ get_setting('image') }}">
                                @endif
                            </div>
                            @error('image')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="input-group">
                            <label class="label">Upload CV</label>
                            <div class="file-drop-area">
                                <input type="file" name="cv" value="{{ get_setting('cv') }}" class="cv">
                            </div>
                            @error('cv')
                                <small class="text-danger text-small">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="p-t-15">
                    <button class="btn btn--radius-2 btn--blue" type="submit">Register</button>
                </div>
            </form>
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
            padding:0px;
            border: none;
            border-radius: 3px;
            transition: .2s;
        }
        .choose-file-button{
            display: none;
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
    $(document).on('change', '.image', function() {
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
                    img.attr("style", "width: 100px; height:100px; padding:5px; object-fit:cover; object-position:top; margin-top:10px; border-radius:50%;");
                    img.attr("src", e.target.result);
                    dvPreview.append(img);
                }
                reader.readAsDataURL(file[0]);
            });
        } else {
            alert("This browser does not support HTML5 FileReader.");
        }
    });
    </script>
@endpush
