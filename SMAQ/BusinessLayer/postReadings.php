<?php
    global $conn;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "esptest";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Database Connection failed: " . $conn->connect_error);
    }
    
    // Check if http POST is not empty then insert into DB
    if(!empty($_POST['airTemp']) && !empty($_POST['airHum']) && !empty($_POST['waterTemp']) && !empty($_POST['lightInt']) && !empty($_POST['phValue'])) {
        $airTemp = $_POST['airTemp'];
        $airHum = $_POST['airHum'];
        $waterTemp = $_POST['waterTemp'];
        $lightInt = $_POST['lightInt'];
        $phValue = $_POST['phValue'];
        $sqlAirTemp = "INSERT INTO air_temp (value) VALUES ('".$airTemp."')";
        $sqlAirHum = "INSERT INTO air_hum (value) VALUES ('".$airHum."')";
        $sqlWaterTemp = "INSERT INTO water_temp (value) VALUES ('".$waterTemp."')";
        $sqlLightInt = "INSERT INTO light_intensity (value) VALUES ('".$lightInt."')";
        $sqlphValue = "INSERT INTO ph_level (value) VALUES ('".$phValue."')";
        if ($conn->query($sqlAirTemp) === TRUE && $conn->query($sqlAirHum) === TRUE && $conn->query($sqlWaterTemp) === TRUE && $conn->query($sqlLightInt) === TRUE && $conn->query($sqlphValue) === TRUE) {
        	echo "OK";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>