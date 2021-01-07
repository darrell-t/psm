<?php
	include "conn.php";
	function tablesViewInc(){
		include "../BusinessLayer/tablesC.php";
		include "../BusinessLayer/tablesM.php";
		include "../BusinessLayer/postReadings.php";
	}

	function generateReportInc(){

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
?>