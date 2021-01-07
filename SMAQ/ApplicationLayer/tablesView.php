<?php
	include "../libs/config.php";
	tablesViewInc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<!-- <meta http-equiv="refresh" content="5"> -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMAQ | Tables</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="../libs/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="../libs/dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">

			<!-- Logo -->
			<a href="index.php" class="brand-link">
			<img src="../libs/dist/img/LogoPlaceholder.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
			<span class="brand-text font-weight-light">SMAQ</span>
			</a>

			<!-- Sidebar -->
			<div class="sidebar">

				<!-- Sidebar user panel -->
				<div class="user-panel mt-3 pb-3 mb-3 d-flex">
					<div class="image">
					<img src="../libs/dist/img/emptyUser.png" class="img-circle elevation-2" alt="User Image">
					</div>
					<div class="info">
					<a href="#" class="d-block">SMAQmin</a>
					</div>
				</div>

				<!-- Sidebar Menu -->
				<nav class="mt-2">
					<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
						<li class="nav-item menu-open">
							<a href="#" class="nav-link active">
							<i class="nav-icon fas fa-tachometer-alt"></i><p>Manage System<i class="right fas fa-angle-left"></i></p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="index.php" class="nav-link">
										<i class="fas fa-chart-pie nav-icon"></i>
										<p>Charts</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="tablesView.php" class="nav-link active">
										<i class="fas fa-table nav-icon"></i>
										<p>Table</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="sensorsView.php" class="nav-link">
										<i class="fas fa-sliders-h nav-icon"></i>
										<p>Sensors</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link active">
							<i class="nav-icon fas fa-user"></i><p>Account<i class="right fas fa-angle-left"></i></p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="./index.html" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Change Password</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="./index2.html" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Add New User</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="./index3.html" class="nav-link">
										<i class="far fa-circle nav-icon"></i>
										<p>Sign Out</p>
									</a>
								</li>
							</ul>
						</li>
					</ul>  
				</nav>
				<!-- /.sidebar-menu -->
			</div>
		<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper -->
		<div class="content-wrapper">
			<!-- Content Header -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Sensor Readings</h1>
						</div><!-- /.col -->
						<div class="col-sm-6">
							<ol class="breadcrumb float-sm-right">
								<li class="breadcrumb-item"><a href="#">Home</a></li>
								<li class="breadcrumb-item active">Dashboard</li>
							</ol>
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.container-fluid -->
			</div>
			<!-- /.content-header -->

			<!-- Main content -->
			<div class="content">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-6">
							<!-- Water Temp Card-->
							<div class="card">
								<div class="card-header border-0">
									<h3 class="card-title"><i class="fas fa-temperature-high"></i>    Water Temperature (°C)</h3>
									<div class="card-tools">
										<a href="../BusinessLayer/generateReportC.php?exportWaterTemp=true" style="color: inherit;">
											<i class="fas fa-download"></i>
										</a>
									</div>
								</div>
								<div class="card-body table-responsive p-0" id="waterTemp">
									<table class="table table-striped table-valign-middle">
										<thead>
											<tr>
												<th>Value</th>
												<th>Time</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												waterTempReadings();
											?>
										</tbody>
									</table>

								</div>
							</div>
							<!-- /.Water Temp Card -->

							<!-- Air Temp Card-->
							<div class="card">
								<div class="card-header border-0">
									<h3 class="card-title"><i class="fas fa-wind"></i>    Air Temperature (°C)</h3>
									<div class="card-tools">
										<a href="../BusinessLayer/generateReportC.php?exportAirTemp=true" style="color: inherit;">
											<i class="fas fa-download"></i>
										</a>
									</div>
								</div>
								<div class="card-body table-responsive p-0" id="airTemp">
									<table class="table table-striped table-valign-middle">
										<thead>
											<tr>
												<th>Value</th>
												<th>Time</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												airTempReadings();
											?>
										</tbody>
									</table>

								</div>
							</div>
							<!-- /.Air Temp Card-->

							<!-- Light Intensity Card -->
							<div class="card">
								<div class="card-header border-0">
									<h3 class="card-title"><i class="fas fa-lightbulb"></i>    Light Intensity (lx)</h3>
									<div class="card-tools">
										<a href="../BusinessLayer/generateReportC.php?exportLightInt=true" style="color: inherit;">
											<i class="fas fa-download"></i>
										</a>
									</div>
								</div>
								<div class="card-body table-responsive p-0" id="lightInt">
									<table class="table table-striped table-valign-middle">
										<thead>
											<tr>
												<th>Value</th>
												<th>Time</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												lightIntReadings();
											?>
										</tbody>
										</table>

								</div>
							</div>
							<!-- /.Light Intensity Card -->

						</div>
						<!-- /.col-md-6 -->

						<div class="col-lg-6">
							<!-- pH Level Card -->
							<div class="card">
								<div class="card-header border-0">
									<h3 class="card-title"><i class="fas fa-vial"></i>    pH Level</h3>
								</div>
								<div class="card-body table-responsive p-0" id="phLevel">
									<table class="table table-striped table-valign-middle">
										<thead>
											<tr>
												<th>Value</th>
												<th>Time</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												for($i = 0; $i < 5; $i++){
													echo "<tr>";
													echo "<td>" . ($i + 1) . "</td>";
													echo "<td>" . ($i + 1) . "</td>";
													echo "</tr>";
												}
											?>
										</tbody>
									</table>

								</div>
							</div>
							<!-- /.pH Level Card -->

							<!-- Air Humidity Card -->
							<div class="card">
								<div class="card-header border-0">
									<h3 class="card-title"><i class="fas fa-tint"></i>    Relative Humidity (%)</h3>
									<div class="card-tools">
										<a href="../BusinessLayer/generateReportC.php?exportAirHum=true" style="color: inherit;">
											<i class="fas fa-download"></i>
										</a>
									</div>
								</div>
								<div class="card-body table-responsive p-0" id="airHum">
									<table class="table table-striped table-valign-middle">
										<thead>
											<tr>
												<th>Value</th>
												<th>Time</th>
											</tr>
										</thead>
										<tbody>
											<?php 
												airHumReadings();
											?>
										</tbody>
									</table>

								</div>
							</div>
							<!-- /.Air Humidity Card -->
						</div>
						<!-- /.col-md-6 -->
					</div>
					<!-- /.row -->
				</div>
				<!-- /.container-fluid -->
			</div>
			<!-- /.content -->
		</div>
		<!-- /.content-wrapper -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark"></aside>
		<!-- /.control-sidebar -->

		<!--Footer -->
		<footer class="main-footer">
		<strong>SMAQ</strong>
		<div class="float-right d-none d-sm-inline-block">
		<b>Version</b> 1.0.0
		</div>
		</footer>
	</div>
	<!-- ./wrapper -->
	<!-- Scripts -->
	<script src="../libs/plugins/jquery/jquery.min.js"></script>
	<script src="../libs/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../libs/dist/js/adminlte.js"></script>
	<script src="../libs/plugins/chart.js/Chart.min.js"></script>
	<script src="../libs/dist/js/demo.js"></script>
	<script src="../libs/dist/js/pages/dashboard3.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
			$('#waterTemp').load('tablesView.php #waterTemp')}, 5000);
		})

		$(document).ready(function(){
			setInterval(function(){
			$('#airTemp').load('tablesView.php #airTemp')}, 5000);
		})

		$(document).ready(function(){
			setInterval(function(){
			$('#airHum').load('tablesView.php #airHum')}, 5000);
		})

		$(document).ready(function(){
			setInterval(function(){
			$('#lightInt').load('tablesView.php #lightInt')}, 5000);
		})

		$(document).ready(function(){
			setInterval(function(){
			$('#phLevel').load('tablesView.php #phLevel')}, 5000);
		})       
	</script>
</body>
</html>
