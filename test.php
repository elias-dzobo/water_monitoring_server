<?php 

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

$sql = "SELECT `tank_id`, `water_level`, `status`, `checktime` FROM levels ORDER BY 4 DESC LIMIT 5";




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
    
        echo "  {$row_id}    {$row_sensor}     {$row_status}     {$row_checktime} \n";
    }
    $result->free();
}

$conn->close();




?>