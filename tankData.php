<!DOCTYPE html>
<html>
<head>
    <link href="style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

<div class="sidebar">
  <a class="active" href="#home">Home</a>
  <a href="#news">Tank Information</a>
  <a href="#contact">Customer Information</a>
</div>
<div class="content">
    <h2> Water Level Data </h2>
    <?php
    /*
    Rui Santos
    Complete project details at https://RandomNerdTutorials.com/esp32-esp8266-mysql-database-php/
    
    Permission is hereby granted, free of charge, to any person obtaining a copy
    of this software and associated documentation files.
    
    The above copyright notice and this permission notice shall be included in all
    copies or substantial portions of the Software.
    */

    $servername = "localhost";

    // REPLACE with your Database name
    $dbname = "tanksystem";
    // REPLACE with Database user
    $username = "root";
    // REPLACE with Database user password
    $password = "";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 

    $tank_id = $_GET['tank_id']; 

    $sql = "SELECT `tank_id`, `water_level`, `status`, `checktime` FROM levels where `tank_id` = $tank_id";

    echo '<table class="table" cellspacing="5" cellpadding="5">
            <thead class="table-dark">
            <tr> 
                <td>TANK ID</td> 
                <td>Water Level</td> 
                <td>Water Status</td> 
                <td>Checktime</td> 
            </tr>
            </thead>';

    
    if ($result = $conn->query($sql)) {
        while ($row = $result->fetch_assoc()) {
            $row_id = $row["tank_id"];
            $row_sensor = $row["water_level"];
            $row_status = $row["status"];
            $row_checktime = $row["checktime"];
            // Uncomment to set timezone to - 1 hour (you can change 1 to any number)
            //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time - 1 hours"));
        
            // Uncomment to set timezone to + 4 hours (you can change 4 to any number)
            //$row_reading_time = date("Y-m-d H:i:s", strtotime("$row_reading_time + 4 hours"));
        
            echo '<tr> 
                    <td>' . $row_id . '</td> 
                    <td>' . $row_sensor . '</td> 
                    <td>' . $row_status . '</td> 
                    <td>' . $row_checktime . '</td> 
                </tr>';
        }
        $result->free();
    }

    $conn->close();
    ?> 
    </table>
</div> 

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>

    
</body>
</html>