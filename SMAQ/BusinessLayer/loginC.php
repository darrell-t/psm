<?php
	include "../libs/config.php";
	loginVerificationInc();
	if(isset($_POST['submitLogin'])){
		$userEmail = $_POST['userEmail'];
		$userPassword = $_POST['userPassword'];
		$result = verifyUserLogin($userEmail, $userPassword);
		if($row=mysqli_fetch_row($result)){
			$_SESSION['login'] = true;
			$_SESSION['userID'] = $row['user_id'];
			header("Location: ../ApplicationLayer/index.php");
			exit;
		}
		else{
			$_SESSION['loginMessage'] = true;
			header("Location: ../ApplicationLayer/loginView.php");
		}
	}
	
?>