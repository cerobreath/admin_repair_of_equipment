<?php
include_once "../config/dbconnect.php";

$employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);
$e_name = mysqli_real_escape_string($conn, $_POST['e_name']);
$e_surname = mysqli_real_escape_string($conn, $_POST['e_surname']);
$e_patronymic = mysqli_real_escape_string($conn, $_POST['e_patronymic']);
$e_email = mysqli_real_escape_string($conn, $_POST['e_email']);
$e_phone = mysqli_real_escape_string($conn, $_POST['e_phone']);

// Validate employeeName, employeeSurname, employeePatronymic - Allow only letters, including Cyrillic characters and "і, ї"
$valid_name = preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $e_name) && preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $e_surname) && preg_match("/^[A-Za-zА-Яа-яІіЇї]+$/u", $e_patronymic);

// Validate employeeEmail - Allow only alphanumeric characters
$valid_email = preg_match("/^[a-zA-Z0-9]+@[a-zA-Z0-9]+\.[a-zA-Z]+$/", $e_email);

// Validate employeePhone - Allow only digits and '+'
$valid_phone = preg_match("/^[0-9+]+$/", $e_phone);

if (!$valid_name || !$valid_email || !$valid_phone) {
    echo "Invalid input format";
    exit;
}

$updateEmployee = mysqli_query($conn, "UPDATE employees SET 
    name='$e_name', 
    surname='$e_surname', 
    patronymic='$e_patronymic', 
    email='$e_email', 
    phone='$e_phone'
    WHERE employee_id=$employee_id");

if ($updateEmployee) {
    echo "true";
} else {
    echo mysqli_error($conn);
}
?>
