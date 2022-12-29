@extends('backend.layouts.app-frontend')

@section('content')
    <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#home" role="tab" aria-controls="home"
                aria-selected="true">Profile</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#subscriptions" role="tab"
                aria-controls="profile" aria-selected="false">Membership/Payment</a>
        </li>
        <li class="nav-item dropdown ml-2">
            <a class="nav-link dropdown-toggle" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                <i class="far fa-user me-2"></i>{{ auth()->user()->name }}
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                <a href="{{ route('logout.perform') }}" class="dropdown-item">
                    <i class="fas fa-sign-out-alt mr-2"></i> Logout
                </a>
            </ul>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row no-margin text-left">
                <div class="col-md-4 big-img">

                    <div class="refer-cov">
                        <div class="mb-4 edit-profile-wrapper d-flex justify-content-between align-items-center">
                            <h4 class="ltitle m-0">Personal Info</h4>
                            <a href="{{ route('user.profile.edit', $user->id) }}" class="btn btn-sm btn-info text-light"><i class="fa fa-pen"></i></a>
                        </div>
                        @if (session('message'))
                            <div class="alert alert-success text-small">{{ session('message') }}</div>
                        @endif
                        <p><b>Name:</b> {{ $user->firstname }} {{ $user->lastname }} </p>
                        <p><b>Profession:</b> {{ $user->profession }}</p>
                        <p><b>Phone:</b> {{ $user->phone }}</p>
                        <p><b>Email:</b> {{ $user->email }}</p>
                        <p><b>City/Town:</b> {{ $user->address1['city1'] }}</p>
                        <p><b>Post Code:</b> {{ $user->address1['post_code'] }}</p>
                    </div>
                    <div class="refer-cov">
                        <p><b>Chapter:</b> {{ $user->chapter }}</p>
                        <p><b>Constituency:</b> {{ $user->constituency }}</p>
                        <p><b>Membership:</b> {{ $user->membership_number == null? 'Free' : 'Plan name' }}</p>
                    </div>
                </div>
                <div class="col-md-8 home-dat">
                    <div class="refer-cov">
                        <h4 class="ltitle">Documents</h4>
                    </div>
                    <div class="profess-cover row no-margin">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>ID Card</h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if($user->id_card_number == null)
                                        <p>No ID Card</p>
                                    @else
                                        <a href="{{ url('files/id_card/'.$user->id_card_number) }}">Download Id Card</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">
                                        <h2>Your CV</h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    @if($user->cv == null)
                                        <p>No CV found</p>
                                    @else
                                        <a href="{{ url('files/id_card/'.$user->cv) }}">Download your CV</a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="tab-pane fade exp-cover" id="subscriptions" role="tabpanel" aria-labelledby="contact-tab">
            <div class="sec-title">
                <h2>Membership Details</h2>
            </div> 
            <div class="pay-btn text-center">
                <a href="#" class="btn btn-md btn-success">Make Payment</a>
            </div>
        </div>
        <div class="tab-pane fade gallcoo" id="gallery" role="tabpanel" aria-labelledby="contact-tab">
            <div class="row no-margin gallery">
                <div class="col-sm-4">
                    <img src="{{ asset('frontend/user/assets/images/gallery/gallery_01.jpg') }}"
                        alt="">
                </div>
                <div class="col-sm-4">
                    <img src="{{ asset('frontend/user/assets/images/gallery/gallery_02.jpg') }}"
                        alt="">
                </div>
                <div class="col-sm-4">
                    <img src="{{ asset('frontend/user/assets/images/gallery/gallery_03.jpg') }}"
                        alt="">
                </div>
                <div class="col-sm-4">
                    <img src="{{ asset('frontend/user/assets/images/gallery/gallery_04.jpg') }}"
                        alt="">
                </div>
                <div class="col-sm-4">
                    <img src="{{ asset('frontend/user/assets/images/gallery/gallery_05.jpg') }}"
                        alt="">
                </div>
                <div class="col-sm-4">
                    <img src="{{ asset('frontend/user/assets/images/gallery/gallery_06.jpg') }}"
                        alt="">
                </div>
                <div class="col-sm-4">
                    <img src="{{ asset('frontend/user/assets/images/gallery/gallery_10.jpg') }}"
                        alt="">
                </div>
                <div class="col-sm-4">
                    <img src="{{ asset('frontend/user/assets/images/gallery/gallery_08.jpg') }}"
                        alt="">
                </div>
                <div class="col-sm-4">
                    <img src="{{ asset('frontend/user/assets/images/gallery/gallery_09.jpg') }}"
                        alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
