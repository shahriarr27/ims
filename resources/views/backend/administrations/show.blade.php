@extends('backend.layouts.app-master')

@section('content')
<div class="container">
  <div class="main-body">
        <div class="row gutters-sm">
          <div class="col-md-4 mb-3">
            <div class="card">
              <div class="card-body">
                <div class="d-flex flex-column align-items-center text-center">
                  <img src="{{ url('files/user_image/'.$user->image) }}" alt="Admin" class="rounded-circle" width="150">
                  <div class="mt-3">
                    <h4>{{ $user->firstname }} {{ $user->lastname }}</h4>
                    <p class="text-secondary mb-1 text-capitalize">{{ $user->role }}</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-8">
            <div class="card mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Full Name</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ $user->firstname.' '. $user->lastname }}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-3">
                    <h6 class="mb-0">Email</h6>
                  </div>
                  <div class="col-sm-9 text-secondary">
                    {{ $user->email }}
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-sm-12">
                    <div class="action-wrapper d-flex">
                      <a class="btn btn-info btn-sm text-white mr-2" href="{{ route('admins.edit',$user->id) }}">Edit</a>
                      @if ($user->role != 'superadmin')
                        <form method="post" action="{{ route('admins.destroy',$user->id) }}">
                          @csrf
                          @method("DELETE")
                            <button type="submit" class="btn btn-danger btn-sm text-white" data-bs-dismiss="modal">Delete</button>
                        </form>
                      @endif
                    </div>
                  </div>
                </div>
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
        box-shadow: 0px 0px 20px rgba(0,0,0,0.1);
        border: none;
      }
    </style>
@endpush