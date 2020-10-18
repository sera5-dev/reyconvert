@extends('main')

@section('title', 'Rate')
@section('rate', 'active')

@section('content')

<div class="row">

	<div class="col-xl-8 col-lg-7">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Rate</h6>
			</div>
			<div class="card-body">
				<div class="table-responsice">
					<table class="table" id="dataTable">
						<thead>
							<th>#</th>
							<th>provider</th>
							<th>rate</th>
							<th>pulsa</th>
							<th>uang</th>
							<th>action</th>
						</thead>
						<tbody>
							<?php $i = 1 ?>
							@foreach($rates as $rate)
							@if(isset($rate->rate))
							@foreach($rate->rate as $key => $r)
							<tr>
								<td>{{ $i++}}</td>
								<td>{{$rate->provider}}</td>
								<td>{{$r->rate}}</td>
								<td>{{$r->pulsa}}</td>
								<td>{{$r->uang}}</td>
								<td>
									<form action="{{route('rate-delete')}}" method="post">
										@csrf
										@method('DELETE')
										<input type="hidden" name="id" value="{{$r->id}}">
										<button class="btn btn-danger btn-circle" type="submit" value="delete">
											<i class="fas fa-trash"></i>
										</button>
									</form>
								</td>
							</tr>
							@endforeach
							@endif
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>

	<div class="col-xl-4 col-lg-5">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Create Rate</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('rate-create') }}" method="post">
					@csrf
					<div class="form-group">
						<label for="provider_id">Provider</label>
						<select class="form-control" name="provider_id" id="">
							@foreach($providers as $provider)
							<option value="{{$provider->id}}">{{$provider->nama}}</option>
							@endforeach
						</select>
					</div>

					<div class="form-group">
						<input class="form-control" type="number" step="0.1" name="rate" placeholder="rate">
					</div>

					<div class="form-group">
						<input class="form-control" type="number" name="pulsa" placeholder="pulsa">
					</div>

					<div class="form-group">
						<input class="form-control btn btn-primary" type="submit" value="create">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
