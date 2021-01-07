<?php
	include "../libs/config.php";
	updateThresholdInc();
	if(isset($_GET['submitWaterTemp'])){
		if(!empty($_GET['waterTempMax'])){
			if(!empty($_GET['waterTempMin'])){
				$waterTempMax = $_GET['waterTempMax'];
				$waterTempMin = $_GET['waterTempMin'];
				$sensorName = $_GET['sensorName'];
				updateThresholdMinMax($sensorName, $waterTempMin, $waterTempMax);
				header("location:../ApplicationLayer/sensorsView.php");
			}
			else{
				$waterTempMax = $_GET['waterTempMax'];
				$sensorName = $_GET['sensorName'];
				updateThresholdMax($sensorName, $waterTempMax);
				header("location:../ApplicationLayer/sensorsView.php");
			}
		}
		else{
			if(!empty($_GET['waterTempMin'])){
				$waterTempMin = $_GET['waterTempMin'];
				$sensorName = $_GET['sensorName'];
				updateThresholdMin($sensorName, $waterTempMin);
				header("location:../ApplicationLayer/sensorsView.php");
			}
			else{
				header("location:../ApplicationLayer/sensorsView.php?input=false");
			}
		}
	}
	else if(isset($_GET['submitAirTemp'])){
		if(!empty($_GET['airTempMax'])){
			if(!empty($_GET['airTempMin'])){
				$airTempMax = $_GET['airTempMax'];
				$airTempMin = $_GET['airTempMin'];
				$sensorName = $_GET['sensorName'];
				updateThresholdMinMax($sensorName, $airTempMin, $airTempMax);
				header("location:../ApplicationLayer/sensorsView.php");
			}
			else{
				$airTempMax = $_GET['airTempMax'];
				$sensorName = $_GET['sensorName'];
				updateThresholdMax($sensorName, $airTempMax);
				header("location:../ApplicationLayer/sensorsView.php");
			}
		}
		else{
			if(!empty($_GET['airTempMin'])){
				$airTempMin = $_GET['airTempMin'];
				$sensorName = $_GET['sensorName'];
				updateThresholdMin($sensorName, $airTempMin);
				header("location:../ApplicationLayer/sensorsView.php");
			}
			else{
				header("location:../ApplicationLayer/sensorsView.php?input=false");
			}
		}

	}
	else if(isset($_GET['submitAirHum'])){
		if(!empty($_GET['airHumMax'])){
			if(!empty($_GET['airHumMin'])){
				$airHumMax = $_GET['airHumMax'];
				$airHumMin = $_GET['airHumMin'];
				$sensorName = $_GET['sensorName'];
				updateThresholdMinMax($sensorName, $airHumMin, $airHumMax);
				header("location:../ApplicationLayer/sensorsView.php");
			}
			else{
				$airHumMax = $_GET['airHumMax'];
				$sensorName = $_GET['sensorName'];
				updateThresholdMax($sensorName, $airHumMax);
				header("location:../ApplicationLayer/sensorsView.php");
			}
		}
		else{
			if(!empty($_GET['airHumMin'])){
				$airHumMin = $_GET['airHumMin'];
				$sensorName = $_GET['sensorName'];
				updateThresholdMin($sensorName, $airHumMin);
				header("location:../ApplicationLayer/sensorsView.php");
			}
			else{
				header("location:../ApplicationLayer/sensorsView.php?input=false");
			}
		}

	}
	else if(isset($_GET['submitLightInt'])){
		if(!empty($_GET['lightIntMax'])){
			if(!empty($_GET['lightIntMin'])){
				$lightIntMax = $_GET['lightIntMax'];
				$lightIntMin = $_GET['lightIntMin'];
				$sensorName = $_GET['sensorName'];
				updateThresholdMinMax($sensorName, $lightIntMin, $lightIntMax);
				header("location:../ApplicationLayer/sensorsView.php");
			}
			else{
				$lightIntMax = $_GET['lightIntMax'];
				$sensorName = $_GET['sensorName'];
				updateThresholdMax($sensorName, $lightIntMax);
				header("location:../ApplicationLayer/sensorsView.php");
			}
		}
		else{
			if(!empty($_GET['lightIntMin'])){
				$lightIntMin = $_GET['lightIntMin'];
				$sensorName = $_GET['sensorName'];
				updateThresholdMin($sensorName, $lightIntMin);
				header("location:../ApplicationLayer/sensorsView.php");
			}
			else{
				header("location:../ApplicationLayer/sensorsView.php?input=false");
			}
		}

	}
	else{
		header("location:../ApplicationLayer/sensorsView.php?input=false");
	}


?>