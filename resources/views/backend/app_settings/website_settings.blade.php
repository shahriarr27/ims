@extends('backend.layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <div class="container mt-4">

            <div class="row">
                <div class="col-md-12">
                    <form action="{{ route('websitesettings.store') }}" class="settingsForm" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card">
                            <div class="card-header">
                                <h3>Footer</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <label for="footer_social" class="col-sm-3">Footer Social</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" value="facebook_url" name="type[]">
                                        <div class="input-group mb-3">
                                            <input type="text" class="form-control" value="{{ echo_setting('facebook_url') }}" name="facebook_url" placeholder="Facebook URL" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">Facebook</span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                            <input type="hidden" value="twitter_url" name="type[]">
                                            <input type="text" class="form-control" value="{{ echo_setting('twitter_url') }}" name="twitter_url" placeholder="Twitter URL" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <span class="input-group-text" id="basic-addon2">Twitter</span>
                                            </div>
                                        </div>
                                        <div class="input-group mb-3">
                                             <input type="hidden" value="linkedin_url" name="type[]">
                                             <input type="text" class="form-control" value="{{ echo_setting('linkedin_url') }}" name="linkedin_url" placeholder="linkedin URL" aria-describedby="basic-addon2">
                                             <div class="input-group-append">
                                                 <span class="input-group-text" id="basic-addon2">Linkedin</span>
                                                </div>
                                            </div>
                                            <div class="input-group mb-3">
                                             <input type="hidden" value="instagram_url" name="type[]">
                                             <input type="text" class="form-control" value="{{ echo_setting('instagram_url') }}" name="instagram_url" placeholder="Instagram URL" aria-describedby="basic-addon2">
                                             <div class="input-group-append">
                                               <span class="input-group-text" id="basic-addon2">Instagram</span>
                                             </div>
                                          </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="row mt-3"">
                                    <label for="footer_description" class="col-sm-3">Footer Description</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" value="footer_description" name="type[]">
                                        <textarea name="footer_description" id="footer_description" rows="8" class="form-control form-control-sm">{{ echo_setting('footer_description') }}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <label for="footer_copyright" class="col-sm-3">Footer Copyright</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" value="footer_copyright" name="type[]">
                                        <input type="text" name="footer_copyright" id="footer_copyright" value="{{ echo_setting('footer_copyright') }}" class="form-control form-control-sm">
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
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-bs4.min.js"></script>
@endpush

@push('scripts')
<script>
</script>
@endpush
