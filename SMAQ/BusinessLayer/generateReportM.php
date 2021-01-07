<?php
	include "../libs/conn.php";
	
	function generateWaterTemp(){
		global $conn;
		$output = '';
		$query = "SELECT * FROM water_temp ORDER BY sensorTime DESC";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0){
			$output .= '
			<table class="table" bordered="1">  
			<tr>  
			<th>Temperature (°C)</th>  
			<th>Time</th>  
			</tr>';
			while($row = mysqli_fetch_array($result)){
				$output .= '
				<tr>  
				<td>'.$row["value"].'</td>  
				<td>'.$row["sensorTime"].'</td>  
				</tr>';
			}
			$output .= '</table>';
			header('Content-Type: application/xls');
			header('Content-Disposition: attachment; filename=Water_Temp_Report.xls');
			echo $output;
		}
	}

	function generateAirTemp(){
		global $conn;
		$output = '';
		$query = "SELECT * FROM air_temp ORDER BY sensorTime DESC";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0){
			$output .= '
			<table class="table" bordered="1">  
			<tr>  
			<th>Temperature (°C)</th>  
			<th>Time</th>  
			</tr>';
			while($row = mysqli_fetch_array($result)){
				$output .= '
				<tr>  
				<td>'.$row["value"].'</td>  
				<td>'.$row["sensorTime"].'</td>  
				</tr>';
			}
			$output .= '</table>';
			header('Content-Type: application/xls');
			header('Content-Disposition: attachment; filename=Air_Temp_Report.xls');
			echo $output;
		}
	}

	function generateLightInt(){
		global $conn;
		$output = '';
		$query = "SELECT * FROM light_intensity ORDER BY sensorTime DESC";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0){
			$output .= '
			<table class="table" bordered="1">  
			<tr>  
			<th>Light Intensity (lx)</th>  
			<th>Time</th>  
			</tr>';
			while($row = mysqli_fetch_array($result)){
				$output .= '
				<tr>  
				<td>'.$row["value"].'</td>  
				<td>'.$row["sensorTime"].'</td>  
				</tr>';
			}
			$output .= '</table>';
			header('Content-Type: application/xls');
			header('Content-Disposition: attachment; filename=Light_Int_Report.xls');
			echo $output;
		}
	}

	function generateAirHum(){
		global $conn;
		$output = '';
		$query = "SELECT * FROM air_hum ORDER BY sensorTime DESC";
		$result = mysqli_query($conn, $query);
		if(mysqli_num_rows($result) > 0){
			$output .= '
			<table class="table" bordered="1">  
			<tr>  
			<th>Relative Humidity (%)</th>  
			<th>Time</th>  
			</tr>';
			while($row = mysqli_fetch_array($result)){
				$output .= '
				<tr>  
				<td>'.$row["value"].'</td>  
				<td>'.$row["sensorTime"].'</td>  
				</tr>';
			}
			$output .= '</table>';
			header('Content-Type: application/xls');
			header('Content-Disposition: attachment; filename=Relative_Hum_Report.xls');
			echo $output;
		}
	}

?>