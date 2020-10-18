@extends('main')

@section('title', 'Provider')
@section('provider', 'active')

@section('content')

	<div class="row">

		<div class="col-xl-8 col-lg-7">
			<div class="card shadow mb-4">
				<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
					<h6 class="m-0 font-weight-bold text-primary">Provider</h6>
				</div>
				<div class="card-body">
					<div class="table-responsice">
						<table class="table" id="dataTable">
							<thead>
								<th>#</th>
								<th>Provider</th>
								<th>Logo</th>
								<th>Aksi</th>
							</thead>
							<tbody>
								@foreach($providers as $p)
								<tr>
									<td>{{ $loop->iteration }}</td>
									<td>{{ $p->nama }}</td>
									<td>{{ $p->logo }}</td>
									<td>
										<form action="{{ route('provider-delete') }}" method="post">
											@csrf
											@method('DELETE')
											<input type="hidden" name="id" value="{{ $p->id }}">
											<button class="btn btn-danger btn-circle" type="submit" value="delete">
												<i class="fas fa-trash"></i>
											</button>
										</form>
									</td>
								</tr>
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
					<h6 class="m-0 font-weight-bold text-primary">Create Provider</h6>
				</div>
				<div class="card-body">
					<form action="{{ route('provider-create')}}" method="post">
						@csrf
						<div class="form-group">
							<input type="text" name="nama" placeholder="nama provider" class="form-control">
						</div>
						<div class="form-group">
							<input type="file" name="logo" class="form-control-file" id="">
						</div>
						<div class="form-group">
							<input type="submit" value="create" class="btn btn-primary">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection
