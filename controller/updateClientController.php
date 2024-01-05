<?php
include_once "../config/dbconnect.php";

$client_id = mysqli_real_escape_string($conn, $_POST['client_id']);
$c_name = mysqli_real_escape_string($conn, $_POST['c_name']);
$c_surname = mysqli_real_escape_string($conn, $_POST['c_surname']);
$c_patronymic = mysqli_real_escape_string($conn, $_POST['c_patronymic']);
$c_email = mysqli_real_escape_string($conn, $_POST['c_email']);
$c_phone = mysqli_real_escape_string($conn, $_POST['c_phone']);
$c_address = mysqli_real_escape_string($conn, $_POST['c_address']);

// Validate clientName, clientSurname, clientPatronymic - Allow only letters, including Cyrillic characters and "і, ї"
$valid_name = preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $c_name) && preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $c_surname) && preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $c_patronymic);

// Validate clientEmail - Allow only alphanumeric characters
$valid_email = preg_match("/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/", $c_email);

// Validate clientPhone - Allow only digits and '+'
$valid_phone = preg_match("/^[0-9+]+$/", $c_phone);

// Validate clientAddress - Allow letters, digits, and punctuation symbols
$valid_address = preg_match("/^[A-Zа-яА-Я-z0-9\s.,'-]+$/u", $c_address);

if (!$valid_name || !$valid_email || !$valid_phone || !$valid_address) {
    echo "Invalid input format";
    exit;
}

$updateClient = mysqli_query($conn, "UPDATE clients SET 
    name='$c_name', 
    surname='$c_surname', 
    patronymic='$c_patronymic', 
    email='$c_email', 
    phone='$c_phone', 
    address='$c_address'
    WHERE client_id=$client_id");

if ($updateClient) {
    echo "true";
} else {
    echo mysqli_error($conn);
}
?>
