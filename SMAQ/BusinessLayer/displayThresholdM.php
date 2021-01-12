<?php
	function waterTempMax(){
		global $conn;
		$query = "SELECT FORMAT(maxRange, 2) AS maxRange FROM sensor_threshold WHERE sensorName = 'water_temperature'";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)) {
			$maxRange = $row['maxRange'];
		}
		return $maxRange;
	}

	function waterTempMin(){
		global $conn;
		$query = "SELECT FORMAT(minRange, 2) AS minRange FROM sensor_threshold WHERE sensorName = 'water_temperature'";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)) {
			$minRange = $row['minRange'];
		}
		return $minRange;
	}

	function airTempMax(){
		global $conn;
		$query = "SELECT FORMAT(maxRange, 2) AS maxRange FROM sensor_threshold WHERE sensorName = 'air_temperature'";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)) {
			$maxRange = $row['maxRange'];
		}
		return $maxRange;
	}

	function airTempMin(){
		global $conn;
		$query = "SELECT FORMAT(minRange, 2) AS minRange FROM sensor_threshold WHERE sensorName = 'air_temperature'";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)) {
			$minRange = $row['minRange'];
		}
		return $minRange;
	}

	function airHumMax(){
		global $conn;
		$query = "SELECT FORMAT(maxRange, 2) AS maxRange FROM sensor_threshold WHERE sensorName = 'air_humidity'";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)) {
			$maxRange = $row['maxRange'];
		}
		return $maxRange;
	}

	function airHumMin(){
		global $conn;
		$query = "SELECT FORMAT(minRange, 2) AS minRange FROM sensor_threshold WHERE sensorName = 'air_humidity'";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)) {
			$minRange = $row['minRange'];
		}
		return $minRange;
	}

	function lightIntMax(){
		global $conn;
		$query = "SELECT FORMAT(maxRange, 2) AS maxRange FROM sensor_threshold WHERE sensorName = 'light_intensity'";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)) {
			$maxRange = $row['maxRange'];
		}
		return $maxRange;
	}

	function lightIntMin(){
		global $conn;
		$query = "SELECT FORMAT(minRange, 2) AS minRange FROM sensor_threshold WHERE sensorName = 'light_intensity'";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)) {
			$minRange = $row['minRange'];
		}
		return $minRange;
	}

	function phLevelMax(){
		global $conn;
		$query = "SELECT FORMAT(maxRange, 2) AS maxRange FROM sensor_threshold WHERE sensorName = 'ph_level'";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)) {
			$maxRange = $row['maxRange'];
		}
		return $maxRange;
	}

	function phLevelMin(){
		global $conn;
		$query = "SELECT FORMAT(minRange, 2) AS minRange FROM sensor_threshold WHERE sensorName = 'ph_level'";
		$result = mysqli_query($conn, $query);
		while($row = mysqli_fetch_array($result)) {
			$minRange = $row['minRange'];
		}
		return $minRange;
	}
?>