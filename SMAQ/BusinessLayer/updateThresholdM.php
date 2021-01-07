<?php
	function updateThresholdMin($sensorName, $minRange){
		global $conn;
		$query = "UPDATE sensor_threshold SET minRange = $minRange WHERE sensorName = '$sensorName'";
		$result = mysqli_query($conn, $query);
		if (!$result){
			die('Error: '. mysqli_error());
		}
	}

	function updateThresholdMax($sensorName, $maxRange){
		global $conn;
		$query = "UPDATE sensor_threshold SET maxRange = $maxRange WHERE sensorName = '$sensorName'";
		$result = mysqli_query($conn, $query);
		if (!$result){
			die('Error: '. mysqli_error());
		}

	}

	function updateThresholdMinMax($sensorName, $minRange, $maxRange){
			global $conn;
		$query = "UPDATE sensor_threshold SET minRange = $minRange, maxRange = $maxRange WHERE sensorName = '$sensorName'";
		$result = mysqli_query($conn, $query);
		if (!$result){
			die('Error: '. mysqli_error());
		}
	}

?>