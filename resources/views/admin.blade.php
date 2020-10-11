<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reyconvert - Admin</title>
</head>

<body>
	<section>
		<h2>Provider</h2>

		<strong>create provider</strong>
		<form action="" method="post">
			@csrf
			<div class="form-group">
				<label for="nama">nama</label>
				<input type="text" name="nama" id="">
			</div>
			<div class="form-group">
				<input type="submit" value="create">
			</div>
		</form>

		<br>

		<strong>Provider list</strong>
		<table>
			<thead>
				<th>id</th>
				<th>nama</th>
				<th>logo</th>
			</thead>
			<tbody>
				@foreach($providers as $provider)
				<tr>
					<td>{{$provider->id}}</td>
					<td>{{$provider->nama}}</td>
					<td>{{$provider->logo}}</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</section>
	<section>
		<h2>Rate</h2>

		<strong>create rate</strong>
		<form action="" method="post">
			@csrf
			<div class="form-group">
				<label for="provider">provider</label>
				<select name="provider" id="">
					@foreach($providers as $provider)
					<option value="{{$provider->id}}">{{$provider->nama}}</option>
					@endforeach
				</select>
			</div>

			<div class="form-group">
				<label for="rate">rate</label>
				<input type="number" name="rate" id="">
			</div>

			<div class="form-group">
				<label for="pulsa">pulsa</label>
				<input type="number" name="pulsa" id="">
			</div>

			<div class="form-group">
				<input type="submit" value="create">
			</div>
		</form>

		<br />

		<strong>rate list</strong>
		<table border="1">
			<thead>
				<th>id</th>
				<th>provider</th>
				<th>rate</th>
				<th>uang</th>
				<th>pulsa</th>
			</thead>
			<tbody>
				@foreach($rates as $rate)
				@foreach($rate->rate as $r)
				<tr>
					<td>{{$r->id}}</td>
					<td>{{$rate->provider}}</td>
					<td>{{$r->rate}}</td>
					<td>{{$r->pulsa}}</td>
					<td>{{$r->uang}}</td>
				</tr>
				@endforeach
				@endforeach
			</tbody>
		</table>
	</section>

</body>

</html>
