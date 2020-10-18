<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="reyconvert">
	<meta name="author" content="reyconvert">

	<title>Reyconvert - Admin Login</title>

	<!-- Custom fonts for this template-->
	<link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	<!-- Custom styles for this template-->
	<link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

	<style>
		.text {
			background: linear-gradient(rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), linear-gradient(101deg, #78e4ff, #ff48fa);
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}

		button.button {
			box-shadow: 0 0 6px 0 rgba(157, 96, 212, 0.5);
			border: solid 2px transparent;
			background-image: linear-gradient(rgba(255, 255, 255, 0), rgba(255, 255, 255, 0)), linear-gradient(101deg, #78e4ff, #ff48fa);
			background-origin: border-box;
			background-clip: content-box, border-box;
			box-shadow: 2px 1000px 1px #fff inset;
		}

		button.button:hover {
			box-shadow: none;
			color: white;
		}
	</style>
</head>

<body class="bg-gradient-black">

	<div class="container">

		<!-- Outer Row -->
		<div class="row justify-content-center">

			<div class="col-xl-6 col-lg-6 col-md-9 col-sm-12 col-xs-12">

				<div class="card o-hidden bg-transparent border-0 rounded-0">
					<div class="card-body p-0">
						<!-- Nested Row within Card Body -->
						<div class="row">
							<div class="col-lg">
								<div class="p-5">
									<div class="">
										<h1 class="h3 text text-gray-900 mb-4">Reyconvert Admin</h1>
									</div>
									<form action="{{ route('login')}}" method="post">
										@csrf
										<div class="form-group">
											<input type="text" class="form-control rounded-0 bg-dark bg-transparent" name="username" placeholder="Username">
										</div>
										<div class="form-group">
											<input type="password" class="form-control rounded-0 bg-transparent" name="password" placeholder="Password">
										</div>
										<button type="submit" class="button btn rounded-0">Login</button>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>

			</div>

		</div>

	</div>

	<!-- Bootstrap core JavaScript-->
	<script src="{{ asset('assets/vendor/jquery/jquery.min.js')}}"></script>
	<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>

	<!-- Core plugin JavaScript-->
	<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

	<!-- Custom scripts for all pages-->
	<script src="{{ asset('assets/js/sb-admin-2.min.js')}}"></script>

</body>

</html>
