<?php
	function waterTempReadings(){
		$result = getWaterTempReadings();
		while ($row=mysqli_fetch_row($result)){
        	echo "<tr>";
            echo "<td>".$row[1]."</td>";
            echo "<td>".$row[2]."</td>";
            echo "</tr>";
		}
		freeResult($result);
	}

	function airTempReadings(){
		$result = getAirTempReadings();
		while ($row=mysqli_fetch_row($result)){
            echo "<tr>";
            echo "<td>".$row[1]."</td>";
            echo "<td>".$row[2]."</td>";
            echo "</tr>";
     	}
		freeResult($result);
	}

	function airHumReadings(){
		$result = getAirHumReadings();
		while ($row=mysqli_fetch_row($result)){
            echo "<tr>";
            echo "<td>".$row[1]."</td>";
            echo "<td>".$row[2]."</td>";
            echo "</tr>";
     	}
		freeResult($result);
	}
	
	function lightIntReadings(){
		$result = getLightIntReadings();
		while ($row=mysqli_fetch_row($result)){
            echo "<tr>";
            echo "<td>".$row[1]."</td>";
            echo "<td>".$row[2]."</td>";
            echo "</tr>";
     	}
		freeResult($result);
	}
?>