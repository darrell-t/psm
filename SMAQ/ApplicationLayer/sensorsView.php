<?php
	include "../libs/config.php";
	sensorsViewInc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMAQ | Sensors</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="../libs/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="../libs/dist/css/adminlte.min.css">
	<style>
		input[type=number] {
			-moz-appearance: textfield;
		}
	</style>
</head>
<body class="hold-transition sidebar-mini">
	<div class="wrapper">
		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="index.php" class="brand-link">
				<img src="../libs/dist/img/LogoPlaceholder.png" alt="Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
				<span class="brand-text font-weight-light">SMAQ</span>
			</a>
			<!-- Sidebar -->
			<div class="sidebar">
				<!-- Sidebar user panel (optional) -->
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
					<!-- Add icons to the links using the .nav-icon class
					with font-awesome or any other icon font library -->
						<li class="nav-item menu-open">
							<a href="#" class="nav-link active">
								<i class="nav-icon fas fa-tachometer-alt"></i>
								<p>Manage System<i class="right fas fa-angle-left"></i></p>
							</a>
							<ul class="nav nav-treeview">
								<li class="nav-item">
									<a href="index.php" class="nav-link">
										<i class="fas fa-chart-pie nav-icon"></i>
										<p>Charts</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="tablesView.php" class="nav-link">
										<i class="fas fa-table nav-icon"></i>
										<p>Tables</p>
									</a>
								</li>
								<li class="nav-item">
									<a href="sensorsView.php" class="nav-link active">
										<i class="fas fa-sliders-h nav-icon"></i>
										<p>Sensors</p>
									</a>
								</li>
							</ul>
						</li>
						<li class="nav-item">
							<a href="#" class="nav-link active">
								<i class="nav-icon fas fa-user"></i>
								<p>Account<i class="right fas fa-angle-left"></i></p>
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
				</nav>
				<!-- /.sidebar-menu -->
			</div>
			<!-- /.sidebar -->
		</aside>
		<!-- Content Wrapper. Contains page content -->
		<div class="content-wrapper">
			<!-- Content Header (Page header) -->
			<div class="content-header">
				<div class="container-fluid">
					<div class="row mb-2">
						<div class="col-sm-6">
							<h1 class="m-0">Sensor Threshold</h1>
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
						<!-- Water Temperature Range Card -->
							<div class="small-box bg-danger" style="height: 220px">
								<div class="inner">
									<form id="sensorForm1" method="GET" action="../BusinessLayer/updateThresholdC.php">
										<h2>Water Temperature (°C)</h2>
										<h3 style="text-align: left; float: left;"><?php displayWaterTempMin(); ?></h3>
										<h3 style="text-align: center; float: center;"><?php displayWaterTempMax(); ?></h3>

										<h5 style="text-align: left; float: left;">Min</h5>
										<h5 style="text-align: center; float: center;">Max</h5>
										<input type="hidden" name="sensorName" value="water_temperature">
										<input type="number" name="waterTempMin" step=".01" style="text-align: left; width: 80px; height: 40px; font-size: 20px; font-weight: 600;">
										<input type="number" name="waterTempMax" step=".01" style="text-align: left; margin-left: 311px; width: 80px; height: 40px; font-size: 20px; font-weight: 600;">
										<button type="submit" name="submitWaterTemp"class="btn btn-app" style="float: right; margin-right: 20px">
											<i class="fas fa-edit"></i> Update
										</button>
									</form>
								</div>
								<div class="icon">
									<i class="fas fa-temperature-high"></i>
								</div>
							</div>
							<!-- /.Water Temperature Range Card -->
							<!-- Air Temperature Range Card -->
							<div class="small-box bg-danger" style="height: 220px">
								<div class="inner">
									<form id="sensorForm2" method="GET" action="../BusinessLayer/updateThresholdC.php">
										<h2>Air Temperature (°C)</h2>
										<h3 style="text-align: left; float: left;"><?php displayAirTempMin(); ?></h3>
										<h3 style="text-align: center; float: center;"><?php displayAirTempMax(); ?></h3>

										<h5 style="text-align: left; float: left;">Min</h5>
										<h5 style="text-align: center; float: center;">Max</h5>
										<input type="hidden" name="sensorName" value="air_temperature">
										<input type="number" name="airTempMin" step=".01" style="text-align: left; width: 80px; height: 40px; font-size: 20px; font-weight: 600;">
										<input type="number"name="airTempMax" step=".01" style="text-align: left; margin-left: 311px; width: 80px; height: 40px; font-size: 20px; font-weight: 600;">
										<button type="submit" name="submitAirTemp" class="btn btn-app" style="float: right; margin-right: 20px">
											<i class="fas fa-edit"></i> Update
										</button>
									</form>
								</div>
								<div class="icon">
									<i class="fas fa-wind"></i>
								</div>
							</div>
							<!-- /.Air Temperature Range Card -->
						<!-- Light Intensity Range Card -->
							<div class="small-box bg-warning" style="height: 220px">
								<div class="inner">
									<form id="sensorForm3" method="GET" action="../BusinessLayer/updateThresholdC.php">
										<h2>Light Intensity (lx)</h2>
										<h3 style="text-align: left; float: left;"><?php displayLightMin(); ?></h3>
										<h3 style="text-align: center; float: center;"><?php displayLightMax(); ?></h3>

										<h5 style="text-align: left; float: left;">Min</h5>
										<h5 style="text-align: center; float: center;">Max</h5>
										<input type="hidden" name="sensorName" value="light_intensity">
										<input type="number" name="lightIntMin" step=".01" style="text-align: left; width: 80px; height: 40px; font-size: 20px; font-weight: 600;">
										<input type="number" name="lightIntMax" step=".01" style="text-align: left; margin-left: 311px; width: 80px; height: 40px; font-size: 20px; font-weight: 600;">
										<button type="submit" name="submitLightInt" class="btn btn-app" style="float: right; margin-right: 20px">
											<i class="fas fa-edit"></i> Update
										</button>
									</form>
								</div>
								<div class="icon">
									<i class="fas fa-lightbulb"></i>
								</div>
							</div>
							<!-- /.Light Intensity Range Card -->
						</div>
						<!-- /.col-md-6 -->
						<div class="col-lg-6">
						<!-- pH Range Card -->
							<div class="small-box bg-success" style="height: 220px">
								<div class="inner">
									<form id="sensorForm4" method="GET" action="../BusinessLayer/updateThresholdC.php">
										<h2>pH Level</h2>
										<h3 style="text-align: left; float: left;"><?php displayphLevelMin(); ?></h3>
										<h3 style="text-align: center; float: center;"><?php displayphLevelMax(); ?></h3>

										<h5 style="text-align: left; float: left;">Min</h5>
										<h5 style="text-align: center; float: center;">Max</h5>
										<input type="hidden" name="sensorName" value="ph_level">
										<input type="number" name="phLevelMin" step=".01" style="text-align: left; width: 80px; height: 40px; font-size: 20px; font-weight: 600;">
										<input type="number" name="phLevelMax" step=".01" style="text-align: left; margin-left: 311px; width: 80px; height: 40px; font-size: 20px; font-weight: 600;">
										<button type="submit" name="submitpHLevel" class="btn btn-app" style="float: right; margin-right: 20px">
											<i class="fas fa-edit"></i> Update
										</button>
									</form>
								</div>
								<div class="icon">
									<i class="fas fa-vial"></i>
								</div>
							</div>
							<!-- /.pH Range Card -->
						<!-- Relative Humidity Range Card -->
							<div class="small-box bg-info" style="height: 220px">
								<div class="inner">
									<form id="sensorForm5" method="GET" action="../BusinessLayer/updateThresholdC.php">
										<h2>Relative Humidity (%)</h2>
										<h3 style="text-align: left; float: left;"><?php displayAirHumMin(); ?></h3>
										<h3 style="text-align: center; float: center;"><?php displayAirHumMax(); ?></h3>

										<h5 style="text-align: left; float: left;">Min</h5>
										<h5 style="text-align: center; float: center;">Max</h5>
										<input type="hidden" name="sensorName" value="air_humidity">
										<input type="number" name="airHumMin" step=".01" style="text-align: left; width: 80px; height: 40px; font-size: 20px; font-weight: 600;">
										<input type="number" name="airHumMax" step=".01" style="text-align: left; margin-left: 311px; width: 80px; height: 40px; font-size: 20px; font-weight: 600;">
										<button type="submit" name="submitAirHum" class="btn btn-app" style="float: right; margin-right: 20px">
											<i class="fas fa-edit"></i> Update
										</button>
									</form>
								</div>
								<div class="icon">
									<i class="fas fa-tint"></i>
								</div>
							</div>
							<!-- /.Relative Humidity Range Card -->
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
		<aside class="control-sidebar control-sidebar-dark">
		<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
		<!-- Main Footer -->
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
	<script type="text/javascript">
		$(window).bind("pageshow", function() {
			var form1 = $('#sensorForm1'); 
			var form2 = $('#sensorForm2'); 
			var form3 = $('#sensorForm3'); 
			var form4 = $('#sensorForm4'); 
			var form5 = $('#sensorForm5'); 

			form1[0].reset();
			form2[0].reset();
			form3[0].reset();
			form4[0].reset();
			form5[0].reset();
		});
	</script>
</body>
</html>
