@extends('backend.layouts.app-master')

@section('content')
<div class="bg-light p-4 rounded my-3">
    <div class="container my-2">
        <h1>Add new user</h1>
        <form method="POST" action="{{ route('users.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row row-space">
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">first name</label>
                        <input class="form-control" type="text" name="firstname">
                        @error('firstname')
                            <small class="text-danger text-small">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">last name</label>
                        <input class="form-control" type="text" name="lastname">
                        @error('lastname')
                            <small class="text-danger text-small">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Email</label>
                        <input class="form-control" type="email" name="email">
                        @error('email')
                            <small class="text-danger text-small">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Password</label>
                        <input class="form-control" type="password" name="password">
                        @error('password')
                            <small class="text-danger text-small">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Phone Number</label>
                        <input class="form-control" type="text" name="phone">
                        @error('phone')
                            <small class="text-danger text-small">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Gender</label>
                        <div class="p-t-10">
                            <input type="radio" name="gender" value="Male" id="male">
                            <label class="radio-container m-r-45" for="male">Male
                            </label>
                            <input type="radio" name="gender" value="Female" id="female">
                            <label class="radio-container" for="female">Female
                            </label>
                        </div>
                        @error('gender')
                            <small class="text-danger text-small">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Town/City</label>
                        <input class="form-control" type="text" name="city1">
                        @error('city1')
                            <small class="text-danger text-small">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Post Code</label>
                        <input class="form-control" type="text" name="post_code">
                        @error('post_code')
                            <small class="text-danger text-small">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="row row-space">
                <div class="col-6">
                    <label class="label">Chapter</label>
                    <div class="rs-select2 js-select-simple select--no-search">
                        <select name="chapter" class="form-select">
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
                    </div>
                    @error('chapter')
                        <small class="text-danger text-small">{{ $message }}</small>
                    @enderror
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Constituency</label>
                        <input class="form-control" type="text" name="constituency">
                        @error('constituency')
                            <small class="text-danger text-small">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
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
            <div class="row row-space mt-3">
                <div class="col-6">
                    <div class="form-group">
                        <label class="label">Upload Your Image here</label>
                        <div class="file-drop-area">
                            <input type="file" name="image" value="{{ get_setting('image') }}"
                                class="image">
                        </div>
                        <div id="divImageMediaPreview">
                            @if(!empty(get_setting('image')))
                                <img style="width: 150px; height:100px; object-fit:cover; object-position:top"
                                    src="{{ get_setting('image') }}">
                            @endif
                        </div>
                        @error('image')
                            <small class="text-danger text-small">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="status">Status</label><br>
                        <select name="status" id="status" class="form-select">
                            <option value="0">
                                Pending</option>
                            <option value="1">
                                Approved</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="pt-4">
                <button class="btn btn-md btn-success" type="submit">Add User</button>
            </div>
        </form>
    </div>

</div>
@endsection
@push('scripts')
    <script>
        $(document).on('change', '.image', function () {
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
                        img.attr("style",
                            "width: 100px; height:100px; padding:5px; object-fit:cover; object-position:top; margin-top:10px; border-radius:50%;"
                        );
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
