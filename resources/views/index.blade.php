<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Reyconvert - Jasa Covert Pulsa</title>
</head>

<body>
	<h1>ReyConvert</h1>
	<p>Jasa Convert Pulsa</p>

	<h2>Daftar Provider</h2>
	<ul>
		@foreach($providers as $provider)
		<li>{{$provider->nama}}</li>
		@endforeach
	</ul>

	<h2>Daftar Rate</h2>
	<ul>
		@foreach($rates as $r => $rate)
		<li>{{$rate->provider}}</li>
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
</body>

</html>
