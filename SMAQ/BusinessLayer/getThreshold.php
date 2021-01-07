<?php
	include "../libs/conn.php";
	$result = mysqli_query($conn,"SELECT FORMAT(maxRange, 2) AS maxRange, FORMAT(minRange, 2) AS minRange FROM sensor_threshold ORDER BY id ASC");
	while($row = mysqli_fetch_array($result)) {
		echo $row['maxRange'];
		echo "\n";
		echo $row['minRange'];
		echo "\n";

	}
?>