<?php
    include_once "../config/dbconnect.php";

    $service_id = $_POST['service_id'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];

    $updateService = mysqli_query($conn, "UPDATE services SET 
        description='$description', 
        price='$price', 
        category_id=$category_id
        WHERE id=$service_id");

    if ($updateService) {
        echo "true";
    } else {
        echo mysqli_error($conn);
    }
?>
