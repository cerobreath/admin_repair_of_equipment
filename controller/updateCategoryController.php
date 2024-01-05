<?php
include_once "../config/dbconnect.php";

$category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
$name = mysqli_real_escape_string($conn, $_POST['name']);

// Validate the name - Allow only letters, including Cyrillic characters and "і, ї"
$valid_name = preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $name);

if (!$valid_name) {
    echo "Invalid name format";
    exit;
}

$updateCategory = mysqli_query($conn, "UPDATE categories SET 
    name='$name'
    WHERE category_id=$category_id");

if ($updateCategory) {
    echo "true";
} else {
    echo mysqli_error($conn);
}
?>
