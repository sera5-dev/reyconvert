@extends('main')

@section('title', 'Admin')

@section('user', 'active')

@section('content')
<div class="row">

	<div class="col-xl-8 col-lg-7">
		<div class="card shadow mb-4">
			<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
				<h6 class="m-0 font-weight-bold text-primary">Admin</h6>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table" id="dataTable">
						<thead>
							<th>#</th>
							<th>nama</th>
							<th>email</th>
							<th>username</th>
							<th>action</th>
						</thead>
						<tbody>
							@foreach($users as $user)
							<tr>
								<td>{{$user->id}}</td>
								<td>{{$user->nama}}</td>
								<td>{{$user->email}}</td>
								<td>{{$user->username}}</td>
								@if($user->id == 1)
								<td>
									<button class="btn btn-danger btn-circle" disabled type="submit" value="delete">
										<i class="fas fa-trash"></i>
									</button>
								</td>
								@else
								<td>
									<form action="{{route('user-delete')}}" method="post">
										@csrf
										@method('DELETE')
										<input type="hidden" name="id" value="{{$user->id}}">
										<button class="btn btn-danger btn-circle" type="submit" value="delete">
											<i class="fas fa-trash"></i>
										</button>
									</form>
								</td>
								@endif
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
				<h6 class="m-0 font-weight-bold text-primary">Create Admin</h6>
			</div>
			<div class="card-body">
				<form action="{{ route('user-create') }}" method="post">
					@csrf
					<div class="form-group">
						<input class="form-control " type="text" name="nama" placeholder="nama">
					</div>

					<div class="form-group">
						<input class="form-control " type="email" name="email" placeholder="email">
					</div>

					<div class="form-group">
						<input class="form-control " type="text" name="username" placeholder="username">
					</div>

					<div class="form-group">
						<input class="form-control " type="password" name="password" placeholder="password">
					</div>

					<div class="form-group">
						<input class="form-control " type="password" name="password_confirmation" placeholder="confirm password">
					</div>

					<div class="form-group">
						<input type="submit" class="form-control  btn btn-primary" value="create">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection
