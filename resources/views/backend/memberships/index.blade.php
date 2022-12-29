@extends('backend.layouts.app-master')

@section('content')
	<div class="header d-flex justify-content-between align-items-center">
		<h3>Member Ship</h3>
		<a href="{{ route('subscription.create') }}" class="btn btn-info btn-sm text-light">Add Plan</a>
	</div>
	<table class="table">
		<thead>
			<tr>
				<th scope="col">#</th>
				<th scope="col">Name</th>
				<th scope="col">Regular Price</th>
				{{-- <th scope="col">Selling Price</th> --}}
				<th scope="col">Body</th>
				<th scope="col">Action</th>
			</tr>
		</thead>
		<tbody>
    </table>
    @endsection