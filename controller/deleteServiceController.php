<?php
    include_once "../config/dbconnect.php";

    $service_id = mysqli_real_escape_string($conn, $_POST['record']);
    
    $query = "DELETE FROM services WHERE id='$service_id'";
    
    $data = mysqli_query($conn, $query);

    if ($data) {
        echo "Service Deleted";
    } else {
        echo "Not able to delete";
    }
?>
