<?php
	include "conn.php";
	function tablesViewInc(){
		session_start();
		if(!isset($_SESSION['login'])){
			header("Location: loginView.php");
			exit;
		}
		include "../BusinessLayer/tablesC.php";
		include "../BusinessLayer/tablesM.php";
		include "../BusinessLayer/postReadings.php";
	}

	function displayChartInc(){
		include "../BusinessLayer/chartC.php";
	}

	function fetchChartInc(){
		include "../BusinessLayer/chartM.php";
	}

	function thresholdInc(){
		include "../BusinessLayer/getThresholdM.php";
	}

	function sensorsViewInc(){
		session_start();
		if(!isset($_SESSION['login'])){
			header("Location: loginView.php");
			exit;
		}
		include "../BusinessLayer/displayThresholdC.php";
		include "../BusinessLayer/displayThresholdM.php";
	}

	function updateThresholdInc(){
		include "../BusinessLayer/updateThresholdM.php";
	}

	function indexInc(){
		session_start();
		if(!isset($_SESSION['login'])){
			header("Location: loginView.php");
			exit;
		}
	}

	function loginVerificationInc(){
		session_start();
		//include "../BusinessLayer/loginC.php";
		include "../BusinessLayer/loginM.php";
	}

	function loginViewInc(){
		session_start();
		if(isset($_GET['logout'])){
			session_destroy();
			header("Location: ../ApplicationLayer/loginView.php");
		}
		else if(isset($_SESSION['login'])){
			header("Location: ../ApplicationLayer/index.php");
		}

	}
?>