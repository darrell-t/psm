<?php
    function getWaterTempReadings(){
        global $conn;
        $sql = "SELECT * FROM water_temp ORDER BY id DESC LIMIT 5";
        if ($result=mysqli_query($conn,$sql)) {
        	return $result;
        }
    }
    
    function getAirTempReadings(){
        global $conn;
        $sql = "SELECT * FROM air_temp ORDER BY id DESC LIMIT 5";
        if ($result=mysqli_query($conn,$sql)) {
            return $result;
        }
    }

    function getAirHumReadings(){
        global $conn;
        $sql = "SELECT * FROM air_hum ORDER BY id DESC LIMIT 5";
        if ($result=mysqli_query($conn,$sql)) {
            return $result;
        }
    }

    function getLightIntReadings(){
        global $conn;
        $sql = "SELECT * FROM light_intensity ORDER BY id DESC LIMIT 5";
        if ($result=mysqli_query($conn,$sql)) {
            return $result;
        }
    }

    function getphLevelReadings(){
        global $conn;
        $sql = "SELECT * FROM ph_level ORDER BY id DESC LIMIT 5";
        if ($result=mysqli_query($conn,$sql)) {
            return $result;
        }
    }

    function freeResult($result){
        mysqli_free_result($result);
    }

?>