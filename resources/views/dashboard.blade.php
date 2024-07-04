@extends('main')

@section('content')

<div class="row show-grid" style="text-align: center;">
	<!-- Customer ROW -->
	<div class="col-md-4">
		<!-- Customer record -->
		<div class="col-md-12 mb-4" style="padding: 20px;">
			<div class="card border-left-primary shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Total Dealer</div>
							<div class="h6 mb-0 font-weight-bold text-gray-800">
								{{$customerCount}} <!--<a href="admin.php"></a> -->
							</div>
						</div>
						<div class="col-auto">
							<i class='fas fa-ad fa-3x text-gray-300'></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 mb-4" style="padding: 20px; margin-top: -30px;">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Reamening</div>
							<div class="h6 mb-0 font-weight-bold text-gray-800">
								{{$pendingSalesCount}} <!-- <a href="admin_renewal.php"></a> -->
							</div>
						</div>
						<div class="col-auto">
							<i class='fas fa-search-location fa-3x text-gray-300'></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- <div class="col-md-12 mb-4" style="padding: 20px; margin-top: -30px;">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Renewal Appt</div>
							<div class="h6 mb-0 font-weight-bold text-gray-800">
								4<a href="renewal_appt.php"> Renewal Appt</a>
							</div>
						</div>
						<div class="col-auto">
							<i class='fas fa-search-location fa-3x text-gray-300'></i>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- Supplier record -->
	</div>
	<!-- Employee ROW -->
	<div class="col-md-4">
		<!-- Employee record -->
		<div class="col-md-12 mb-4" style="padding: 20px;">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Sale Close</div>
							<div class="h6 mb-0 font-weight-bold text-gray-800">
								{{$closedSalesCount}}<!-- <a href="user.php">Team Member</a> -->
							</div>
						</div>
						<div class="col-auto">
							<i class="fas fa-user fa-3x text-gray-300"></i>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-12 mb-4" style="padding: 20px; margin-top: -30px;">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Registered Account</div>
							<div class="h6 mb-0 font-weight-bold text-gray-800">
								{{$userCount}}<!-- <a href="admin_freshassigned.php">Team Membe</a> -->
							</div>
						</div>
						<div class="col-auto">
							<i class='fas fa-search-location fa-3x text-gray-300'></i>
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- <div class="col-md-12 mb-4" style="padding: 20px; margin-top: -30px;">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Appt Slot</div>
							<div class="h6 mb-0 font-weight-bold text-gray-800">
								5<a href="appt_slot.php"> Appt Slot</a>
							</div>
						</div>
						<div class="col-auto">
							<i class='fas fa-search-location fa-3x text-gray-300'></i>
						</div>
					</div>
				</div>
			</div>
		</div>  -->
		<!-- User record -->
	</div>
	<div class="col-md-4">
		<!-- Employee record -->
		<!-- <div class="col-md-12 mb-4" style="padding: 20px;">
			<div class="card border-left-warning shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Sale Base</div>
							<div class="h6 mb-0 font-weight-bold text-gray-800">
								1 <a href="sale_admin.php">Sales Details</a>
							</div>
						</div>
						<div class="col-auto">
							<i class='fas fa-poll fa-3x text-gray-300'></i>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- <div class="col-md-12 mb-4" style="padding: 20px; margin-top: -30px;">
			<div class="card border-left-danger shadow h-100 py-2">
				<div class="card-body">
					<div class="row no-gutters align-items-center">
						<div class="col mr-0">
							<div class="text-xs font-weight-bold text-danger text-uppercase mb-1">fresh Appt</div>
							<div class="h6 mb-0 font-weight-bold text-gray-800">
								4<a href="fresh_appt.php"> Fresh Appt</a>
							</div>
						</div>
						<div class="col-auto">
							<i class='fas fa-search-location fa-3x text-gray-300'></i>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!-- User record -->

	</div>

</div>
<!-- /.Customer ROW -->

@endsection('content')