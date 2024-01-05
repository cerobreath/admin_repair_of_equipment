<?php
session_start();
include_once "../config/dbconnect.php";

$client_id = $_POST['client_id'];
$name = $_POST['name'];
$surname = $_POST['surname'];
$patronymic = $_POST['patronymic'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$password = $_POST['password'];

$updateClient = mysqli_query($conn, "UPDATE clients SET 
    name='$name', 
    surname='$surname', 
    patronymic='$patronymic', 
    email='$email', 
    phone='$phone', 
    address='$address', 
    password='$password' 
    WHERE client_id=$client_id");

if ($updateClient) {
    // Update session variables after a successful data update
    $_SESSION['name'] = $name;
    $_SESSION['surname'] = $surname;
    $_SESSION['patronymic'] = $patronymic;
    $_SESSION['email'] = $email;
    $_SESSION['phone'] = $phone;
    $_SESSION['address'] = $address;

    echo "true";
} else {
    echo mysqli_error($conn);
}
?>
