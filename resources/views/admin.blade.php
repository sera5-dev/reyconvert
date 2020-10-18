<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reyconvert - Admin</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">

</head>

<body>
	<nav class="navbar sticky-top navbar-light bg-light">
		<h3>Reyconvert: Admin</h3>
		<a href="{{ route('logout')}}">logout</a>
	</nav>

	<div class="container">

		<section>
			<h2>Provider</h2>

			<strong>create provider</strong>
			<form action="{{ route('provider-create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="nama">nama</label>
					<input class="form-control rounded-0" type="text" name="nama" id="" required>
				</div>
				<div class="form-group">
					<label for="logo">logo</label>
					<input class="form-control rounded-0" type="text" name="logo" id="">
				</div>
				<div class="form-group">
					<input type="submit" class="form-control rounded-0 btn btn-primary" value="create">
				</div>
			</form>

			<br>

			<strong>provider list</strong>
			<table class="table">
				<thead>
					<th>#</th>
					<th>nama</th>
					<th>logo</th>
					<th>action</th>
				</thead>
				<tbody>
					@foreach($providers as $provider)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$provider->nama}}</td>
						<td>{{$provider->logo}}</td>
						<td>
							<form action="{{route('provider-delete')}}" method="post">
								@csrf
								@method('DELETE')
								<input class="form-control rounded-0" type="hidden" name="id" value="{{$provider->id}}">
								<input type="submit" class="form-control rounded-0 btn btn-danger" value="delete">
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</section>
		<section>
			<h2>Rate</h2>

			<strong>create rate</strong>
			<form action="{{ route('rate-create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="provider_id">provider</label>
					<select class="form-control rounded-0" name="provider_id" id="">
						@foreach($providers as $provider)
						<option value="{{$provider->id}}">{{$provider->nama}}</option>
						@endforeach
					</select>
				</div>

				<div class="form-group">
					<label for="rate">rate</label>
					<input class="form-control rounded-0" type="number" step="0.1" name="rate" id="">
				</div>

				<div class="form-group">
					<label for="pulsa">pulsa</label>
					<input class="form-control rounded-0" type="number" name="pulsa" id="">
				</div>

				<div class="form-group">
					<input class="form-control rounded-0" type="submit" value="create">
				</div>
			</form>

			<br />

			<strong>rate list</strong>
			<table class="table">
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
								<input type="submit" class="form-control rounded-0 btn btn-danger" value="delete">
							</form>
						</td>
					</tr>
					@endforeach
					@endif
					@endforeach
				</tbody>
			</table>
		</section>

		<section>
			<h2>Admin</h2>
			<strong>create admin</strong>
			<form action="{{ route('user-create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="nama">nama</label>
					<input class="form-control rounded-0" type="text" name="nama" id="">
				</div>

				<div class="form-group">
					<label for="email">email</label>
					<input class="form-control rounded-0" type="email" name="email" id="">
				</div>

				<div class="form-group">
					<label for="username">username</label>
					<input class="form-control rounded-0" type="text" name="username" id="">
				</div>

				<div class="form-group">
					<label for="password">password</label>
					<input class="form-control rounded-0" type="password" name="password" id="">
				</div>

				<div class="form-group">
					<label for="password_confirmation">confirm password</label>
					<input class="form-control rounded-0" type="password" name="password_confirmation" id="">
				</div>

				<div class="form-group">
					<input type="submit" class="form-control rounded-0 btn btn-primary" value="create">
				</div>
			</form>
			<br />
			<strong>admin list</strong>
			<table class="table">
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
							<input type="submit" class="form-control rounded-0 btn btn-danger" value="delete" disabled>
						</td>
						@else
						<td>
							<form action="{{route('user-delete')}}" method="post">
								@csrf
								@method('DELETE')
								<input type="hidden" name="id" value="{{$user->id}}">
								<input type="submit" class="form-control rounded-0 btn btn-danger" value="delete">
							</form>
						</td>
						@endif
					</tr>
					@endforeach
				</tbody>
			</table>
		</section>

		<section>
			<h2>Testimoni</h2>

			<strong>create testimoni</strong>
			<form action="{{ route('testi-create') }}" method="post">
				@csrf
				<div class="form-group">
					<label for="nama">nama</label>
					<input class="form-control rounded-0" type="text" name="nama">
				</div>
				<div class="form-group">
					<label for="kontak">kontak</label>
					<input class="form-control rounded-0" type="text" name="kontak">
				</div>
				<div class="form-group">
					<label for="komentar">komentar</label>
					<input class="form-control rounded-0" type="text" name="komentar">
				</div>
				<div class="form-group">
					<input type="submit" class="form-control rounded-0 btn btn-primary" value="create">
				</div>
			</form>

			<br />

			<strong>testimoni list</strong>
			<table class="table">
				<thead>
					<th>#</th>
					<th>nama</th>
					<th>kontak</th>
					<th>komentar</th>
					<th>action</th>
				</thead>
				<tbody>
					@foreach($testimonis as $testi)
					<tr>
						<td>{{$loop->iteration}}</td>
						<td>{{$testi->nama}}</td>
						<td>{{$testi->kontak}}</td>
						<td>{{$testi->komentar}}</td>
						<td>
							<form action="{{route('testi-delete')}}" method="post">
								@csrf
								@method('DELETE')
								<input type="hidden" name="id" value="{{$testi->id}}">
								<input type="submit" class="form-control rounded-0 btn btn-danger" value="delete">
							</form>
						</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</section>
	</div>

</body>

</html>
