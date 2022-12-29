@extends('backend.layouts.app-master')

@section('content')
<div class="container-xl px-4 mt-4">
  <!-- Account page navigation-->
  <nav class="nav nav-borders">
      <a class="nav-link active ms-0" href="https://www.bootdey.com/snippets/view/bs5-edit-profile-account-details" target="__blank">Profile</a>
      <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-billing-page" target="__blank">Billing</a>
      <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-profile-security-page" target="__blank">Security</a>
      <a class="nav-link" href="https://www.bootdey.com/snippets/view/bs5-edit-notifications-page"  target="__blank">Notifications</a>
  </nav>
  <hr class="mt-0 mb-4">
  <div class="row">
      <div class="col-xl-4">
          <!-- Profile picture card-->
          <div class="card mb-4 mb-xl-0">
              <div class="card-header">Profile Picture</div>
              <div class="card-body text-center">
                  <!-- Profile picture image-->
                  <img class="img-account-profile img-fluid rounded-circle mb-2" src="{{ url('files/user_image/'.$user->image) }}" alt="profile_image" style="width: 150px">
              </div>
          </div>
          <div class="card mb-4 mt-4">
            <div class="card-header">ID Card</div>
            <div class="card-body">
              <div class="cv_preview">
                <a href="{{ url('files/cv/'.$user->cv) }}" target="_blank">
                  <p>Download CV</p>
                </a>
              </div>
            </div>
          </div>
      </div>
      <div class="col-xl-8">
          <!-- Account details card-->
          <div class="card mb-4">
              <div class="card-header">Account Details</div>
              <div class="card-body">
                  <form method="post" action="{{ route('users.update', $user->id) }}">
                    @csrf
                    @method('patch')
                    <div class="row gx-3 mb-3">
                      <!-- Form Group (username)-->
                      <div class="col-md-6">
                        <label class="small mb-1" for="inputUsername">Username</label>
                        <input name="name" class="form-control" id="inputUsername" type="text" placeholder="Enter your username" value="{{ $user->name }}">
                      </div>
                      <!-- Form Group (email address)-->
                      <div class="col-md-6">
                          <label class="small mb-1" for="inputEmailAddress">Email address</label>
                          <input name="email" class="form-control" id="inputEmailAddress" type="email" placeholder="Enter your email address" value="{{ $user->email }}" disabled>
                      </div>
                    </div>
                      <!-- Form Row-->
                      <div class="row gx-3 mb-3">
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
                      </div>
                      <!-- Form Row        -->
                      <div class="row gx-3 mb-3">
                          <!-- Form Group-->
                          <div class="col-md-6 mb-3">
                            <label class="small mb-1" for="gender">Gender</label><br>
                            <input type="radio" name="gender" {{ $user->gender == 'Male'? 'checked' : '' }} id="male"> <label for="male" class="fw-normal">Male</label>
                            <input type="radio" name="gender"  {{ $user->gender == 'Female'? 'checked' : '' }} id="female">
                            <label for="female" class="fw-normal">Female</label>
                          </div>
                          <!-- Form Group (organization name)-->
                          <div class="col-md-6 mb-3">
                              <label class="small mb-1" for="inputOrgName">Phone</label>
                              <input name="phone" class="form-control" id="inputOrgName" type="text" placeholder="Enter your organization name" value="{{ $user->phone }}">
                          </div>
                          <!-- Form Group (location)-->
                          <div class="col-md-6 mb-3">
                              <label class="small mb-1" for="city">Town/City</label>
                              <input name="city1" class="form-control" id="city" type="text" placeholder="Enter your location" value="{{ $user->address1['city1'] }}">
                          </div>
                          <!-- Form Group (location)-->
                          <div class="col-md-6 mb-3">
                              <label class="small mb-1" for="post-code">Post Code</label>
                              <input name="post_code" class="form-control" id="post-code" type="text" placeholder="Enter your location" value="{{ $user->address1['post_code'] }}">
                          </div>
                          <div class="col-md-6 mb-3">
                              <label class="small mb-1" for="Constituency">Constituency</label>
                              <input name="constituency" class="form-control" id="Constituency" type="text" placeholder="Enter your location" value="{{ $user->constituency }}">
                          </div>
                          <div class="col-md-6 mb-3">
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
                      </div>
                      <!-- Form Row-->
                      <div class="row gx-3 mb-3">
                          <!-- Form Group (phone number)-->
                          <b>Approve/Reject User Registration</b>
                          <!-- Form Group (birthday)-->
                          <div class="col-md-6 mb-3">
                              <div class="form-group">
                            <label class="small mb-1" for="status">Status</label><br>
                                <select name="status" id="status" class="form-select">
                                  <option value="0" {{ $user->status == '0'? 'selected':'' }}>Pending</option>
                                  <option value="1" {{ $user->status == '1'? 'selected':'' }}>Approved</option>
                                </select>
                              </div>
                          </div>
                      </div>
                      <!-- Save changes button-->
                      <button class="btn btn-primary" type="submit">Save changes</button>
                  </form>
              </div>
          </div>
        </div>

      </div>
  </div>
</div>
@endsection
@push('styles')
    <style>
      .card{
        box-shadow:0px 0px 20px rgba(0,0,0,0.2);
        border: none;
      }
      .form-control, .form-select{
        border-radius: 0px;
      }
      .form-control:focus, .form-select:focus{
        box-shadow: none;
        outline: none;

      }
    </style>
@endpush