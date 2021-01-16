<?php
	
	function verifyUserLogin($userEmail, $userPassword){
		global $conn;
		$query = "SELECT * FROM user WHERE user_email = '$userEmail' AND user_password = '$userPassword'";
		$result = mysqli_query($conn, $query);
		return $result;
	}





?>