<?php
include_once "../config/dbconnect.php";
session_start();

if (isset($_POST['upload'])) {
    $client_id = $_SESSION['client_id']; // Use the client_id from the session
    $order_date = mysqli_real_escape_string($conn, $_POST['order_date']);
    $pay_method = mysqli_real_escape_string($conn, $_POST['pay_method']);
    $technique_id = mysqli_real_escape_string($conn, $_POST['technique_id']);

    // Validate and format the date
    $order_date = date('Y-m-d', strtotime($order_date));

    $insert_query = "INSERT INTO orders (client_id, order_date, pay_method) 
                    VALUES ('$client_id', '$order_date', '$pay_method')";

    $insert = mysqli_query($conn, $insert_query);

    if ($insert) {
        $order_id = mysqli_insert_id($conn);

        // Check if the technique_id is valid
        $checkTechnique = mysqli_query($conn, "SELECT * FROM technique WHERE technique_id = '$technique_id'");
        
        if (mysqli_num_rows($checkTechnique) > 0) {
            $insertTechnique = mysqli_query($conn, "INSERT INTO order_techniques (order_id, technique_id) VALUES ('$order_id', '$technique_id')");

            if (!$insertTechnique) {
                echo mysqli_error($conn);
            } else {
                echo "Order added successfully.";
            }
        } else {
            echo "Invalid technique selected.";
        }
    } else {
        // Log the query and error
        error_log("Query: $insert_query");
        error_log("Error: " . mysqli_error($conn));

        echo "Failed to insert order. Check server logs for more details.";
    }
}
?>
