<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reyconvert - Jasa Covert Pulsa</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
</head>

<body>
	<div class="jumbotron text-center">
		<h1 class="display-4">Reyconvert</h1>
		<p class="lead">Jasa convert pulsa jadi uang.</p>
	</div>
	<div class="container">
		<h2>Daftar Provider</h2>
		<ul>
			@foreach($providers as $provider)
			<li>{{$provider->nama}}</li>
			@endforeach
		</ul>

		<h2>Daftar Rate</h2>
		<ul class="">
			@foreach($rates as $r => $rate)
			<li class="">{{$rate->provider}}</li>
			@if(isset($rate->rate))
			@foreach($rate->rate as $rt)
			<ul>
				<li>
					<div>
						rate : {{$rt->rate}}
					</div>
					<div>
						pulsa : {{$rt->pulsa}}
					</div>
					<div>
						uang : {{$rt->uang}}
					</div>
				</li>
			</ul>
			@endforeach
			@endif
			@endforeach
		</ul>

		<h2>Testimoni</h2>
		<ul>
			<li>
				@foreach($testimonis as $testi)
				<div>
					<div>{{$testi->nama}}</div>
					<div>{{$testi->kontak}}</div>
					<div>{{$testi->komentar}}</div>
				</div>
				@endforeach
			</li>
		</ul>

		<h2>Kontak</h2>
		<ul>
			<li><a href="http://wa.me/081223071450">Whatsapp</a></li>
			<li><a href="http://t.me/Reyjualpulsa">Telegram</a></li>
		</ul>

		<h2>Alamat</h2>
		<ul>
			<li>Ciamis Banjar</li>
		</ul>
	</div>
</body>

</html>
