<?php
	include "../libs/config.php";
	loginViewInc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>SMAQ | Log in</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
	<link rel="stylesheet" href="../libs/plugins/fontawesome-free/css/all.min.css">
	<link rel="stylesheet" href="../libs/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<link rel="stylesheet" href="../libs/dist/css/adminlte.min.css">
</head>
<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
		<h1>SMAQ</h1>
		</div>
		<div class="card">
			<div class="card-body login-card-body">
				<?php
					if(isset($_SESSION['loginMessage'])){
						echo "<p class='login-box-msg'>Invalid login details. Please try again.</p>";
						unset($_SESSION['loginMessage']);
					}
					else{
						echo "<p class='login-box-msg'>Sign in to start your session</p>";
					}
				?>
				<form action="../BusinessLayer/loginC.php" method="POST">
					<div class="input-group mb-3">
						<input type="email" name="userEmail" class="form-control" placeholder="Email">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-envelope"></span>
							</div>
						</div>
					</div>
					<div class="input-group mb-3">
						<input type="password" name="userPassword" class="form-control" placeholder="Password">
						<div class="input-group-append">
							<div class="input-group-text">
								<span class="fas fa-lock"></span>
							</div>
						</div>
					</div>
					<div class="social-auth-links text-center mb-3">
						<button type="submit" name="submitLogin" class="btn btn-primary btn-block">Sign In</button>

					</div>
				</form>
			</div>
			<!-- /.login-card-body -->
		</div>
	</div>
	<!-- /.login-box -->
	<script src="../libs/plugins/jquery/jquery.min.js"></script>
	<script src="../libs/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<script src="../libs/dist/js/adminlte.min.js"></script>
</body>
</html>
