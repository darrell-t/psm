<?php
	include "../libs/config.php";
	indexInc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  	<meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<title>SMAQ | Charts</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="../libs/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<link rel="stylesheet" href="../libs/dist/css/adminlte.min.css">
	<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
	<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$('#waterTempChart').load('chartWaterTemp.php');
		});

		$(document).ready(function(){
			$('#airTempChart').load('chartAirTemp.php');
		});

		$(document).ready(function(){
			$('#airHumChart').load('chartAirHum.php');
		});

		$(document).ready(function(){
			$('#lightIntChart').load('chartLightInt.php');
		});

		$(document).ready(function(){
			$('#pHChart').load('chartpHLevel.php');
		});
	</script>
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
		      			<li class="nav-item menu-open">
		            		<a href="#" class="nav-link active">
			              		<i class="nav-icon fas fa-tachometer-alt"></i>
			              		<p>Manage System<i class="right fas fa-angle-left"></i></p></a>
		            		<ul class="nav nav-treeview">
		              			<li class="nav-item">
		                		<a href="index.php" class="nav-link active">
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
		                			<a href="sensorsView.php" class="nav-link">
		                  				<i class="fas fa-sliders-h nav-icon"></i>
		                  				<p>Sensors</p>
		                			</a>
		              			</li>
		            		</ul>
		          		</li>
		          		<li class="nav-item">
		            		<a href="#" class="nav-link active">
		             	 		<i class="nav-icon fas fa-user"></i>
		              			<p>Account <i class="right fas fa-angle-left"></i></p>
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
									<a href="loginView.php?logout" class="nav-link">
							  			<i class="fas fa-sign-out-alt nav-icon"></i>
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
	  	<!-- Content Wrapper. Contains page content -->
  		<div class="content-wrapper">
	    	<!-- Content Header (Page header) -->
	    	<div class="content-header">
	      		<div class="container-fluid">
	        		<div class="row mb-2">
	          			<div class="col-sm-6">
	            			<h1 class="m-0">Charts</h1>
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
	          				<!-- Water Temp Card -->
	            			<div class="card">
	              				<div class="card-header border-0">
	               	 				<div class="d-flex justify-content-between">
	                  					<div class="page-wrapper">
	                    					<br>
	                    					<h4 align="center"><i class="fa fa-temperature-high"></i>  Water Temperature</h4>
	                    					<div  id="waterTempChart">
	                    						<script>
	                      							$(document).ready(function(){
	                        							setInterval(function(){
	                          							$('#waterTempChart').load('chartWaterTemp.php')}, 5000);
	                      							})
	                    						</script>
	                  						</div>
	                  					</div>
	                				</div>
	              				</div>
	            			</div>
	            			<!-- /.Water Temp Card -->
	            			<!-- Air Temp Card -->
	            			<div class="card">
	              				<div class="card-header border-0">
	                				<div class="d-flex justify-content-between">
	                  					<div class="page-wrapper">
	                    					<br>
	                    					<h4 align="center"><i class="fas fa-wind"></i>	Air Temperature</h4>
	                    					<div  id="airTempChart">
	                    						<script>
	                      							$(document).ready(function(){
	                        							setInterval(function(){
	                          							$('#airTempChart').load('chartAirTemp.php')}, 5000);
                      								})
	                    						</script>
	                  						</div>
	                  					</div>
	                				</div>
	             			 	</div>
	            			</div>
	            			<!-- /.Air Temp Card -->
	            			<!-- Light Int Card -->
	            			<div class="card">
	              				<div class="card-header border-0">
	                				<div class="d-flex justify-content-between">
	                  					<div class="page-wrapper">
	                    					<br>
	                    					<h4 align="center"><i class="fas fa-lightbulb"></i>  Light Intensity</h4>
	                    					<div  id="lightIntChart">
	                    						<script>
	                      							$(document).ready(function(){
	                        							setInterval(function(){
	                          							$('#lightIntChart').load('chartLightInt.php')}, 5000);
	                      							})
	                    						</script>
	                  						</div>
	                  					</div>
                					</div>
	              				</div>
            				</div>
	            			<!-- /.Light Int Card -->
	          			</div>
	          			<!-- /.col-md-6 -->
	          			<div class="col-lg-6">
	          			<!-- pH Level Card -->
	            			<div class="card">
	              				<div class="card-header border-0">
	                				<div class="d-flex justify-content-between">
	                  					<div class="page-wrapper">
	                    					<br>
                    						<h4 align="center"><i class="fas fa-vial"></i>  pH Level</h4>
	                    					<div  id="pHChart">
	                    						<script>
	                      							$(document).ready(function(){
	                        							setInterval(function(){
	                          							$('#pHChart').load('chartpHLevel.php')}, 5000);
	                      							})
	                    						</script>
	                  						</div>
	                  					</div>
	                				</div>
	              				</div>
	            			</div>
	            			<!-- /.pH Level Card -->
	          				<!-- Air Hum Card -->
	            			<div class="card">
	             				<div class="card-header border-0">
	                				<div class="d-flex justify-content-between">
	                  					<div class="page-wrapper">
		                    				<br>
		                    				<h4 align="center"><i class="fas fa-tint"></i>  Air Humidity</h4>
	                    					<div  id="airHumChart">
	                    						<script>
	                      							$(document).ready(function(){
	                        							setInterval(function(){
	                          							$('#airHumChart').load('chartAirHum.php')}, 5000);
                      								})
	                    						</script>
	                  						</div>
	                  					</div>
	                				</div>
	              				</div>
	            			</div>
	            			<!-- /.Air Hum Card -->
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
	<script src="../libs/plugins/chart.js/Chart.min.js"></script>
	<script src="../libs/dist/js/demo.js"></script>
	<script src="../libs/dist/js/pages/dashboard3.js"></script>
</body>
</html>
