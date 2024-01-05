<?php

include_once "../config/dbconnect.php";

$order_id = mysqli_real_escape_string($conn, $_POST['record']);
$query = "DELETE FROM orders WHERE order_id='$order_id'";

$data = mysqli_query($conn, $query);

if ($data) {
    echo "Order Deleted";
} else {
    echo "Not able to delete";
}

?>