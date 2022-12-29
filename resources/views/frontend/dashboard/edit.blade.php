@extends('backend.layouts.app-frontend')

@section('content')
    <div class="bg-light p-4 rounded">
        <h3>Update Profile</h3>
        <div class="container mt-4">
            
          <form method="post" action="{{ route('user.profile.update', $user->id) }}" enctype="multipart/form-data">
            @csrf
            @method('patch')
            <div class="row ">
              <!-- Form Group (username)-->
              <div class="col-md-6">
                <label class="small mb-1" for="inputUsername">Username</label>
                <input name="name" class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="{{ $user->name }}" disabled>
              </div>
              <!-- Form Group (email address)-->
              <div class="col-md-6">
                  <label class="small mb-1" for="inputEmailAddress">Email address</label>
                  <input name="email" class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="{{ $user->email }}" disabled>
              </div>
            </div>
              <!-- Form Row-->
              <div class="row ">
                  <!-- Form Group (first name)-->
                  <div class="col-md-6">
                      <label class="small mb-1" for="inputFirstName">First name</label>
                      <input name="firstname" class="form-control" id="inputFirstName" type="text" placeholder="Enter your first name" value="{{ $user->firstname }}">
                  </div>
                  <!-- Form Group (last name)-->
                  <div class="col-md-6">
                      <label class="small mb-1" for="inputLastName">Last name</label>
                      <input name="lastname" class="form-control" id="inputLastName" type="text" placeholder="Enter your last name" value="{{ $user->lastname }}">
                  </div>
                  <div class="col-md-6">
                      <label class="small mb-1" for="inputLastName">Profession</label>
                      <input name="profession" class="form-control" id="inputLastName" type="text" placeholder="your profession" value="{{ $user->profession }}">
                  </div>
                  <div class="col-md-6">
                    <label class="small mb-1" for="gender">Gender</label><br>
                    <input type="radio" name="gender" value="Male" {{ $user->gender == 'Male'? 'checked' : '' }} id="male"> <label for="male" class="fw-normal">Male</label>
                    <input type="radio" name="gender" value="Female" {{ $user->gender == 'Female'? 'checked' : '' }} id="female">
                    <label for="female" class="fw-normal">Female</label>
                  </div>
              </div>
              <!-- Form Row        -->
              <div class="row ">
                  <!-- Form Group-->
                  <!-- Form Group (organization name)-->
                  <div class="col-md-6">
                      <label class="small mb-1" for="inputOrgName">Phone</label>
                      <input name="phone" class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="{{ $user->phone }}">
                  </div>
                  <!-- Form Group (location)-->
                  <div class="col-md-6">
                      <label class="small mb-1" for="city">Town/City</label>
                      <input name="city1" class="form-control" id="city" type="text" placeholder="Enter your location" value="{{ $user->address1['city1'] }}">
                  </div>
                  <!-- Form Group (location)-->
                  <div class="col-md-6">
                      <label class="small mb-1" for="post-code">Post Code</label>
                      <input name="post_code" class="form-control" id="post-code" type="text" placeholder="Enter your location" value="{{ $user->address1['post_code'] }}">
                  </div>
                  <div class="col-md-6">
                      <label class="small mb-1" for="Constituency">Constituency</label>
                      <input name="constituency" class="form-control" id="Constituency" type="text" placeholder="Enter your location" value="{{ $user->constituency }}">
                  </div>
                  <div class="col-md-6">
                    <label class="small mb-1" for="chapter">Chapter</label><br>
                    <select name="chapter" id="chapter" class="form-select">
                      <option disabled="disabled" selected="selected">Choose option</option>
                      <option value="Aachen" {{ $user->chapter == 'Aachen'? 'selected':'' }}>Aachen</option>
                      <option value="Berlin" {{ $user->chapter == 'Berlin'? 'selected':'' }}>Berlin</option>
                      <option value="Bielefeld" {{ $user->chapter == 'Bielefeld'? 'selected':'' }}>Bielefeld</option>
                      <option value="Bonn" {{ $user->chapter == 'Bonn'? 'selected':'' }}>Bonn</option>
                      <option value="Bremen" {{ $user->chapter == 'Bremen'? 'selected':'' }}>Bremen</option>
                      <option value="Bremerhaven" {{ $user->chapter == 'Bremerhaven'? 'selected':'' }}>Bremerhaven</option>
                      <option value="Darmstadt" {{ $user->chapter == 'Darmstadt'? 'selected':'' }}>Darmstadt</option>
                      <option value="Dortmund" {{ $user->chapter == 'Dortmund'? 'selected':'' }}>Dortmund</option>
                      <option value="Duisburg" {{ $user->chapter == 'Duisburg'? 'selected':'' }}>Duisburg</option>
                      <option value="Düsseldorf" {{ $user->chapter == 'Düsseldorf'? 'selected':'' }}>Düsseldorf</option>
                      <option value="Duisburg" {{ $user->chapter == 'Duisburg'? 'selected':'' }}>Duisburg</option>
                      <option value="Frankfurt" {{ $user->chapter == 'Frankfurt'? 'selected':'' }}>Frankfurt</option>
                      <option value="Freiberg" {{ $user->chapter == 'Freiberg'? 'selected':'' }}>Freiberg</option>
                      <option value="Freising" {{ $user->chapter == 'Freising'? 'selected':'' }}>Freising</option>
                      <option value="Hamburg" {{ $user->chapter == 'Hamburg'? 'selected':'' }}>Hamburg</option>
                      <option value="Hannover" {{ $user->chapter == 'Hannover'? 'selected':'' }}>Hannover</option>
                      <option value="Köln" {{ $user->chapter == 'Köln'? 'selected':'' }}>Köln</option>
                      <option value="Leipzig" {{ $user->chapter == 'Leipzig'? 'selected':'' }}>Leipzig</option>
                      <option value="Mühlheim" {{ $user->chapter == 'Mühlheim'? 'selected':'' }}>Mühlheim</option>
                      <option value="München" {{ $user->chapter == 'München'? 'selected':'' }}>München</option>
                      <option value="Nürnber" {{ $user->chapter == 'Nürnber'? 'selected':'' }}>Nürnber</option>
                      <option value="Rhein-Neckar" {{ $user->chapter == 'Rhein-Neckar'? 'selected':'' }}>Rhein-Neckar</option>
                      <option value="Saarland" {{ $user->chapter == 'Saarland'? 'selected':'' }}>Saarland</option>
                      <option value="Stuttgart" {{ $user->chapter == 'Stuttgart'? 'selected':'' }}>Stuttgart</option>
                    </select>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="label">Change Your Image</label>
                        <div class="file-drop-area">
                            <input type="file" name="image"
                                class="form-control">
                        </div>
                        @error('image')
                            <small class="text-danger text-small">{{ $message }}</small>
                        @enderror
                    </div>

                  </div>
              </div>
              <!-- Save changes button-->
              <button class="btn btn-primary" type="submit">Save changes</button>
              <button class="btn btn-warning" type="button"><a class="text-dark" href="{{ URL::previous() }}">Cancel</a></button>
          </form>
        </div>
    </div>
@endsection
