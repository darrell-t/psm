<?php
    function fetchChartWaterTemp(){
        global $conn;
        $query = "SELECT value, UNIX_TIMESTAMP(sensorTime) AS datetime FROM water_temp ORDER BY sensorTime DESC";
        $result = mysqli_query($conn, $query);
        $rows = array();
        $table = array();
        $table['cols'] = array(
            array(
	            'label' => 'Date Time', 
	            'type' => 'datetime'
        	),
	        array(
	            'label' => 'Water Temperature (°C)', 
	            'type' => 'number'
	        )
        );
        while($row = mysqli_fetch_array($result))
        {
            $sub_array = array();
            $datetime = explode(".", $row["datetime"]);
            $sub_array[] =  array(
                "v" => 'Date(' . $datetime[0] . '000)'
            );
            $sub_array[] =  array(
                "v" => $row["value"]
            );
            $rows[] =  array(
                "c" => $sub_array
            );
        }
        $table['rows'] = $rows;
        $jsonTable = json_encode($table, true);
        return $jsonTable;
    }

    function fetchChartAirTemp(){
        global $conn;
        $query = "SELECT value, UNIX_TIMESTAMP(sensorTime) AS datetime FROM air_temp ORDER BY sensorTime DESC";
        $result = mysqli_query($conn, $query);
        $rows = array();
        $table = array();
        $table['cols'] = array(
            array(
	            'label' => 'Date Time', 
	            'type' => 'datetime'
        	),
	        array(
	            'label' => 'Air Temperature (°C)', 
	            'type' => 'number'
	        )
        );
        while($row = mysqli_fetch_array($result))
        {
            $sub_array = array();
            $datetime = explode(".", $row["datetime"]);
            $sub_array[] =  array(
                "v" => 'Date(' . $datetime[0] . '000)'
            );
            $sub_array[] =  array(
                "v" => $row["value"]
            );
            $rows[] =  array(
                "c" => $sub_array
            );
        }
        $table['rows'] = $rows;
        $jsonTable = json_encode($table, true);
        return $jsonTable;
    }

    function fetchChartAirHum(){
        global $conn;
        $query = "SELECT value, UNIX_TIMESTAMP(sensorTime) AS datetime FROM air_hum ORDER BY sensorTime DESC";
        $result = mysqli_query($conn, $query);
        $rows = array();
        $table = array();
        $table['cols'] = array(
            array(
	            'label' => 'Date Time', 
	            'type' => 'datetime'
        	),
	        array(
	            'label' => 'Relative Humidity (%)', 
	            'type' => 'number'
	        )
        );
        while($row = mysqli_fetch_array($result))
        {
            $sub_array = array();
            $datetime = explode(".", $row["datetime"]);
            $sub_array[] =  array(
                "v" => 'Date(' . $datetime[0] . '000)'
            );
            $sub_array[] =  array(
                "v" => $row["value"]
            );
            $rows[] =  array(
                "c" => $sub_array
            );
        }
        $table['rows'] = $rows;
        $jsonTable = json_encode($table, true);
        return $jsonTable;
    }

    function fetchChartLightInt(){
        global $conn;
        $query = "SELECT value, UNIX_TIMESTAMP(sensorTime) AS datetime FROM light_intensity ORDER BY sensorTime DESC";
        $result = mysqli_query($conn, $query);
        $rows = array();
        $table = array();
        $table['cols'] = array(
            array(
	            'label' => 'Date Time', 
	            'type' => 'date',
        	),
	        array(
	            'label' => 'Light Intensity (lx)', 
	            'type' => 'number'
	        )
        );
        while($row = mysqli_fetch_array($result))
        {
            $sub_array = array();
            $datetime = explode(".", $row["datetime"]);
            $sub_array[] =  array(
                "v" => 'Date(' . $datetime[0] . '000)'
            );
            $sub_array[] =  array(
                "v" => $row["value"]
            );
            $rows[] =  array(
                "c" => $sub_array
            );
        }
        $table['rows'] = $rows;
        $jsonTable = json_encode($table, true);
        return $jsonTable;
    }

    function fetchChartpHLevel(){
        global $conn;
        $query = "SELECT value, UNIX_TIMESTAMP(sensorTime) AS datetime FROM ph_level ORDER BY sensorTime DESC";
        $result = mysqli_query($conn, $query);
        $rows = array();
        $table = array();
        $table['cols'] = array(
            array(
	            'label' => 'Date Time', 
	            'type' => 'date',
        	),
	        array(
	            'label' => 'pH Level', 
	            'type' => 'number'
	        )
        );
        while($row = mysqli_fetch_array($result))
        {
            $sub_array = array();
            $datetime = explode(".", $row["datetime"]);
            $sub_array[] =  array(
                "v" => 'Date(' . $datetime[0] . '000)'
            );
            $sub_array[] =  array(
                "v" => $row["value"]
            );
            $rows[] =  array(
                "c" => $sub_array
            );
        }
        $table['rows'] = $rows;
        $jsonTable = json_encode($table, true);
        return $jsonTable;
    }
?>