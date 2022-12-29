@extends('backend.layouts.app-master')
@section('content')
  <form action="{{ route('subscription.store') }}" method="POST">
    @csrf
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="title">Title</label>
          <input type="text" class="form-control" id="title" placeholder="Enter title" name="title">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="regular-price">Regular Price</label>
          <input type="text" class="form-control" id="regular-price" placeholder="Regular price" name="regular_price">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="regular-price">Selling Price</label>
          <input type="text" class="form-control" id="regular-price" placeholder="Selling price" name="selling_price">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="regular-price">Active Sell</label>
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="status" name="status">
            <label class="form-check-label" for="status">
              Active sell
            </label>
          </div>
        </div>
      </div>
      <div class="col-md-12">
        <div class="form-group">
          <label for="body">Body</label>
          <textarea class="ckeditor form-control" name="body" id="body"></textarea>
        </div>
      </div>
    </div>
    <div class="form-group">
      <button type="submit" class="btn btn-primary">Create Plan</button>
    </div>
  </form>
@endsection

@push('scripts')
    <script>
       $('.ckeditor').ckeditor();
    </script>
@endpush