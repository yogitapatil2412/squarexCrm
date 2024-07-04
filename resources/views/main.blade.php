<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>{{ $general->sitename($pageTitle ?? '') }}</title>
		<!-- site favicon -->
		<link rel="shortcut icon" type="image/png" href="{{asset($general->favicon())}}">

		<!-- Custom fonts for this template-->
		<link href="{{asset('assets/vendor/dashboard.css')}}" rel="stylesheet" type="text/css">
		<link href="{{asset('assets/vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">
		<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

		<!-- Custom styles for this template-->
		<link href="{{asset('assets/css/sb-admin-2.min.css')}}" rel="stylesheet">

		<!-- Custom styles for this page -->
		<link href="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">

		<!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"> -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/css/bootstrap-select.css" />
		
		
	</head>

	<body id="page-top">

		<!-- Page Wrapper -->
		<div id="wrapper">

			<!-- Sidebar -->
			<ul class="navbar-nav  sidebar sidebar-dark accordion" id="accordionSidebar" style="background-color:#008ccd;">

				<!-- Sidebar - Brand -->
				<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('dashboard') }}">
					<div class="sidebar-brand-icon rotate-n-15">
						<!-- <img src="{{asset('assets/img/logo.png')}}"> -->
					</div>
					<div class="sidebar-brand-text mx-3"><img src="{{asset($general->logo())}}" height="35px" widht="35px"></div>
				</a>

				<!-- Divider -->
				<hr class="sidebar-divider my-0">

				<!-- Nav Item - Dashboard -->
				<li class="nav-item">
					<a class="nav-link" href="{{ route('dashboard') }}">
						<i class='fas fa-fw fa-tachometer-alt' style="color:#fff;"></i>
						<span style="color:#fff;">Home Dashboard</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="{{ route('customer.customer') }}">
						<i class='fas fa-ad' style="color:#fff;"></i>
						<span style="color:#fff;">Total Dealer Dashboard</span>
					</a>
				</li>
				@if(auth()->user()->role==1)
				<li class="nav-item">
					<a class="nav-link" href="{{ route('employee') }}">
						<i class='fas fa-user' style="color:#fff;"></i>
						<span style="color:#fff;">Team Member</span>
					</a>
				</li>
				<li class="nav-item">
					<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
						<i class="fas fa-fw fa-cog"></i>
						<span>Setting</span>
					</a>
					<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
						<div class="bg-white py-2 collapse-inner rounded">
							<a class="collapse-item" href="{{ route('setting') }}">Site Setting</a>
							<a class="collapse-item" href="{{ route('state.state') }}">State</a>
							<a class="collapse-item" href="{{ route('district.district') }}">District</a>
							<a class="collapse-item" href="{{ route('taluka.taluka') }}">Taluka</a>
							<a class="collapse-item" href="{{ route('dealercompany.dealercompany') }}">Dealer Company</a>
						</div>
					</div>
				</li>
				@endif
				<!-- Divider -->
				<hr class="sidebar-divider d-none d-md-block">

				<!-- Sidebar Toggler (Sidebar) -->
				<div class="text-center d-none d-md-inline">
					<button class="rounded-circle border-0" id="sidebarToggle"></button>
				</div>

			</ul>
			<!-- End of Sidebar -->
			<!-- Content Wrapper -->
			<div id="content-wrapper" class="d-flex flex-column">
				<!-- Main Content -->
				<div id="content">
					<!-- Topbar -->
					<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
						<!-- Sidebar Toggle (Topbar) -->
						<button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
							<i class="fa fa-bars"></i>
						</button>
						<!-- Topbar Navbar -->
						<ul class="navbar-nav ml-auto">
							<div class="topbar-divider d-none d-sm-block"></div>
							<!-- Nav Item - User Information -->
							<li class="nav-item dropdown no-arrow">
								<a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->full_name}}</span>
									<img class="img-profile rounded-circle" src="{{ asset(auth()->user()->image)}}">

								</a>
								<!-- Dropdown - User Information -->
								<div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
									<button class="dropdown-item" onclick="on()">
									</button>
									<a class="dropdown-item" href="{{ route('profile') }}">
										<i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
										Profile
									</a>
									<div class="dropdown-divider"></div>
									<a class="dropdown-item" href="{{ route('logout') }}">
										<i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
										Logout
									</a>
								</div>
							</li>
						</ul>
					</nav>
					<!-- End of Topbar -->
					<!-- Begin Page Content -->
					<div class="container-fluid" style="margin-left: 20px;">

                        @yield('content')

                    </div>
					<!-- End of Page Conten -->
				</div>
				<!-- End of Main Content -->

				<!-- Footer -->
				<footer class="sticky-footer bg-white">
					<div class="container my-auto">
						<div class="copyright text-center my-auto">
							<span>Copyright © {{date('Y')}} | Square X Technology </span>
						</div>
					</div>
				</footer>
				<!-- End of Footer -->
			</div>
			<!-- End of Content Wrapper -->
		</div>
		<!-- End of Page Wrapper -->

		<!-- Scroll to Top Button-->
		<a class="scroll-to-top rounded" href="#page-top">
			<i class="fas fa-angle-up"></i>
		</a>
		<!-- Bootstrap core JavaScript-->
		<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
		<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
		

		<!-- Core plugin JavaScript-->
		<script src="{{asset('assets/vendor/jquery-easing/jquery.easing.min.js')}}"></script>

		<!-- Custom scripts for all pages-->
		<script src="{{asset('assets/js/sb-admin-2.min.js')}}"></script>

		<!-- Page level plugins -->
		<script src="{{asset('assets/vendor/datatables/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('assets/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

		<!-- Page level custom scripts -->
		<script src="{{asset('assets/js/demo/datatables-demo.js')}}"></script>
		<script src="{{asset('assets/js/city.js')}}"></script>


		<link href="https://code.jquery.com/ui/1.12.1/themes/ui-lightness/jquery-ui.css" rel="stylesheet"  />

		<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>

    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous"
       referrerpolicy="no-referrer" ></script>

	   <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"
      integrity="sha512-37T7leoNS06R80c8Ulq7cdCDU5MNQBwlYoy1TX/WUsLFC2eYNqtKlV0QjH7r8JpG/S0GUMZwebnVFLPd6SU5yg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer">
    </script>

    <!-- ✅ THIRD - load additional methods ✅ -->
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"
      integrity="sha512-XZEy8UQ9rngkxQVugAdOuBRDmJ5N4vCuNXCh8KlniZgDKTvf7zl75QBtaVG1lEhMFe2a2DuA22nZYY+qsI2/xA=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    ></script>

		@include('partials.notify')
		{{-- LOAD NIC EDIT --}}
		<script>
			"use strict";
			(function($){

			})(jQuery);
		</script>

		@stack('script')
	</body>

</html>