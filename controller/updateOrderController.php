<?php
    include_once "../config/dbconnect.php";

    $order_id = mysqli_real_escape_string($conn, $_POST['order_id']);
    $client_id = mysqli_real_escape_string($conn, $_POST['client_id']);
    $order_date = mysqli_real_escape_string($conn, $_POST['order_date']);
    $pay_method = mysqli_real_escape_string($conn, $_POST['pay_method']);

    // Validate order_date - Allow only date format
    $valid_date = preg_match("/^\d{4}-\d{2}-\d{2}$/", $order_date);

    // Validate pay_method - Allow only letters, including Cyrillic and "і, ї"
    $valid_pay_method = preg_match("/^[\p{L}ії]+$/u", $pay_method);

    if (!$valid_date) {
        echo "Invalid date format";
        exit;
    }

    if (!$valid_pay_method) {
        echo "Invalid pay_method format";
        exit;
    }

    $updateOrder = mysqli_query($conn, "UPDATE orders SET 
        client_id='$client_id',
        order_date='$order_date',
        pay_method='$pay_method'
        WHERE order_id=$order_id");

    if ($updateOrder) {
        echo "true";
    } else {
        echo mysqli_error($conn);
    }
?>
