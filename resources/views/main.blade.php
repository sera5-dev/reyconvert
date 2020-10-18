<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="reyconvert">
	<meta name="author" content="reyconvert">

	<title>{{ env('APP_NAME')}} - @yield('title')</title>

	<link href="{{ asset('assets/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
	<link href="{{ asset('assets/css/sb-admin-2.min.css') }}" rel="stylesheet">

</head>

<body id="page-top">

	<div id="wrapper">

		<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

			<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('admin') }}">
				<div class="sidebar-brand-icon rotate-n-15">
					<i class="fas fa-exchange-alt"></i>
				</div>
				<div class="sidebar-brand-text mx-3">Reyconvert</div>
			</a>

			<hr class="sidebar-divider my-0">

			<li class="nav-item @yield('dashboard')">
				<a class="nav-link" href="{{ route('admin')}}">
					<i class="fas fa-fw fa-tachometer-alt"></i>
					<span>Dashboard</span></a>
			</li>

			<li class="nav-item @yield('provider')">
				<a class="nav-link" href="{{ route('provider') }}">
					<i class="fas fa-fw fa-sim-card"></i>
					<span>Provider</span></a>
			</li>

			<li class="nav-item @yield('rate')">
				<a class="nav-link" href="{{ route('rate') }}">
					<i class="fas fa-fw fa-percent"></i>
					<span>Rate</span></a>
			</li>

			<li class="nav-item @yield('testimoni')">
				<a class="nav-link" href="{{ route('testi')}}">
					<i class="fas fa-fw fa-comment"></i>
					<span>Testimoni</span></a>
			</li>

			<li class="nav-item @yield('user')">
				<a class="nav-link" href="{{ route('user') }}">
					<i class="fas fa-fw fa-user"></i>
					<span>Admin</span></a>
			</li>

			<hr class="sidebar-divider my-0">

			<li class="nav-item">
				<a class="nav-link" href="{{ route('logout')}}">
					<i class="fas fa-fw fa-sign-out-alt"></i>
					<span>Log Out</span></a>
			</li>

			<div class="text-center d-none d-md-inline">
				<button class="rounded-circle border-0" id="sidebarToggle"></button>
			</div>
		</ul>

		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<div class="container-fluid">
					<div class="d-sm-flex align-items-center justify-content-between mb-4">
						<h1 class="h3 mt-4 mb-0 text-gray-800">@yield('title')</h1>
					</div>
					@yield('content')
				</div>
			</div>

			<footer class="sticky-footer bg-white">
				<div class="container my-auto">
					<div class="copyright text-center my-auto">
						<span>Copyright &copy; <a href="https://sera5.id">sera5-dev</a> 2020</span>
					</div>
				</div>
			</footer>

		</div>

	</div>

	<a class="scroll-to-top rounded" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<script src="{{ asset('assets/vendor/jquery/jquery.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
	<script src="{{ asset('assets/js/sb-admin-2.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/datatables/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
	<script src="{{ asset('assets/js/demo/datatables-demo.js') }}"></script>

</body>

</html>
