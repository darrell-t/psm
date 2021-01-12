<?php
	include "../BusinessLayer/generateReportM.php";
	if(isset($_GET["exportWaterTemp"])){
		generateWaterTemp();
	}
	
	if(isset($_GET["exportAirTemp"])){
		generateAirTemp();
	}

	if(isset($_GET["exportLightInt"])){
		generateLightInt();
	}

	if(isset($_GET["exportAirHum"])){
		generateAirHum();
	}
	if(isset($_GET["exportphLevel"])){
		generatephLevel();
	}
?>