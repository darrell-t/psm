<?php
	function displayWaterTempMax(){
		$maxRange = waterTempMax();
		echo $maxRange;
	}

	function displayWaterTempMin(){
		$minRange = waterTempMin();
		echo $minRange;
	}

	function displayAirTempMax(){
		$maxRange = airTempMax();
		echo $maxRange;
	}

	function displayAirTempMin(){
		$minRange = airTempMin();
		echo $minRange;
	}

	function displayAirHumMax(){
		$maxRange = airHumMax();
		echo $maxRange;
	}

	function displayAirHumMin(){
		$minRange = airHumMin();
		echo $minRange;
	}

	function displayLightMax(){
		$maxRange = lightIntMax();
		echo $maxRange;
	}

	function displayLightMin(){
		$minRange = lightIntMin();
		echo $minRange;
	}

	function displayphLevelMax(){
		$maxRange = phLevelMax();
		echo $maxRange;
	}

	function displayphLevelMin(){
		$minRange = phLevelMin();
		echo $minRange;
	}


?>