<?php

    $db_host = "localhost";
    $db_name = "id20274876_bridgedata";
    $db_user = "id20274876_team3admin";
    $db_pass = "8bguba3aZ1]RUe}o";

    
   $conn = new mysqli($db_host, $db_user, $db_pass, $db_name);
     
    
    if ($conn -> connect_errno)
    {
       echo "Failed to connect to MySQL: " . $conn -> connect_error;
       exit();
    }
    
    function resultToArray($result) {
        $rows = array();
        while($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        return $rows;
    }
    
    
    $query = "SELECT `Latitude`, `Longitude`, `BridgeName`, `Description`, `Attribution`, `DateAdded` FROM `Bridges` ";
    $result = mysqli_fetch_all($conn->query($query), MYSQLI_NUM);
    json_encode($result);
    
?>
