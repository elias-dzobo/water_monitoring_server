<?php 

    $servername = "localhost";
    $dbname = "tanksystem";
    $username = "root";
    $password = "";

    $conn = new mysqli($servername, $username, $password, $dbname);

    $water_level = $_GET["water_level"];
    $status = $_GET["status"]; 

    $sql = "INSERT INTO `levels` (`water_level`, `status`) VALUES ('$water_level', '$status')"; 

    if (mysqli_query($conn, $sql)) {
        echo "success";
    } else {
        echo "failed"; 
    }

    


?>