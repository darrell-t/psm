<?php
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

    function endConnection(){
    	global $conn;
        $conn->close();
    }
?>