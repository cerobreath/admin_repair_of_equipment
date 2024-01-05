<?php
include_once "../config/dbconnect.php";

if (isset($_POST['upload'])) {
    $client_id = mysqli_real_escape_string($conn, $_POST['client_id']);
    $order_date = mysqli_real_escape_string($conn, $_POST['order_date']);
    $pay_method = mysqli_real_escape_string($conn, $_POST['pay_method']);
    $technique_id = mysqli_real_escape_string($conn, $_POST['technique_id']);

    // Validate and format the date
    $order_date = date('Y-m-d', strtotime($order_date));

    $insert = mysqli_query($conn, "INSERT INTO orders
    (client_id, order_date, pay_method) 
    VALUES ('$client_id', '$order_date', '$pay_method')");

    if ($insert) {
        
        $order_id = mysqli_insert_id($conn);

        $insertTechnique = mysqli_query($conn, "INSERT INTO order_techniques (order_id, technique_id) VALUES ('$order_id', '$technique_id')");

        if (!$insertTechnique) {
            echo mysqli_error($conn);
        } else {
            echo "Order added successfully.";
        }
    } else {
        echo mysqli_error($conn);
    }
}
?>
