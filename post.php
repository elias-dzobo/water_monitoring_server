<?php 

    $servername = "localhost";
    $dbname = "tanksystem";
    $username = "root";
    $password = "";


    $water_level = $_GET["water_level"];
    $status = $_GET["status"]; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    $sql = "INSERT INTO `levels` (`water_level`, `status`) VALUES ('$water_level', '$status')"; 

    $res = mysqli_query($conn, $sql);
    
    if ($res) {
        echo "success"; 
    } else {
        echo "failed";
    }
    
    

    


?>