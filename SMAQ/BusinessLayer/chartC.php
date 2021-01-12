<?php
	fetchChartInc();
	function displayChartWaterTemp(){
		$jsonTable = fetchChartWaterTemp();
		return $jsonTable;
	}

	function displayChartAirTemp(){
		$jsonTable = fetchChartAirTemp();
		return $jsonTable;
	}

	function displayChartAirHum(){
		$jsonTable = fetchChartAirHum();
		return $jsonTable;
	}

	function displayChartLightInt(){
		$jsonTable = fetchChartLightInt();
		return $jsonTable;
	}

	function displayChartpHLevel(){
		$jsonTable = fetchChartpHLevel();
		return $jsonTable;
	}
?>