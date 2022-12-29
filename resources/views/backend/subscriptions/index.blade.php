@extends('backend.layouts.app-master')

@section('content')
	<div class="header d-flex justify-content-between align-items-center">
		<h3>Subscription Plans</h3>
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
			<?php $i=1 ?>
			@foreach ($subscriptions as $item)
				<tr>
					<th scope="row">{{ $i }}</th>
					<td>{{ $item->title }}</td>
					<td>${{ $item->regular_price }}</td>
					{{-- <td>${{ $item->selling_price }}</td> --}}
					<td>{!! $item->body !!}</td>
					<td>
						<div class="d-flex">
							<a href="{{ route('subscription.edit', $item->id) }}" class="settings text-info">
								<span
								class="material-icons material-icons-outlined">
								edit
								</span>
							</a>
							<form action="{{ route('subscription.destroy', $item->id) }}" method="post">
								@csrf
								@method('delete')
								<button style="padding: 0px; border:none; background:none" type="submit" class="delete text-danger">
									<span
									class="material-icons material-icons-outlined">
									close
									</span>
								</button>
							</form>
						</div>
					</td>
				</tr>
				<?php $i++; ?>
			@endforeach
		</tbody>
	</table>
@endsection