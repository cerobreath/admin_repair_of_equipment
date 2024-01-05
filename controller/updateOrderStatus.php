<?php
    include_once "../config/dbconnect.php";
   
    $order_id = mysqli_real_escape_string($conn, $_POST['record']);
    
    $sql = "SELECT order_status FROM orders WHERE order_id='$order_id'"; 
    $result = $conn->query($sql);

    if ($result) {
        $row = $result->fetch_assoc();

        if ($row["order_status"] == 0) {
            $update = mysqli_query($conn, "UPDATE orders SET order_status=1 WHERE order_id='$order_id'");
        } else if ($row["order_status"] == 1) {
            $update = mysqli_query($conn, "UPDATE orders SET order_status=0 WHERE order_id='$order_id'");
        }

        if (!$update) {
            echo mysqli_error($conn);
        }
    } else {
        echo mysqli_error($conn);
    }
?>
