<?php
include './config/dbconnect.php';
include 'head2.php';
?>

<html>

<head>
    <style>
        .table {
            font-family: Montserrat, sans-serif;
        }
    </style>
    <link rel='stylesheet' href='logStyle.css'>
    <title>User Registration</title>
</head>

<body style="background-color: F5F1F0;">
    <div><center><img src="https://img.icons8.com/bubbles/250/000000/add-user-male.png" /></center></div>
    <div>
        <h2><center><b>User Registration</b></center></h2>

        <form method='post' action='register_insert.php'>
            <table align="center" class="table">
                <tr>
                    <td><h3>Name : </h3></td>
                    <td colspan='2'><input type="text" name="name" maxlength='50' required></td>
                </tr>
                <tr>
                    <td><h3>Surname : </h3></td>
                    <td colspan='2'><input type="text" name="surname" maxlength='50' required></td>
                </tr>
                <tr>
                    <td><h3>Patronymic : </h3></td>
                    <td colspan='2'><input type="text" name="patronymic" maxlength='50' required></td>
                </tr>
                <tr>
                    <td><h3>Email : </h3></td>
                    <td colspan='2'><input type="email" name="email" maxlength='50' required></td>
                </tr>
                <tr>
                    <td><h3>Contact No.</h3></td>
                    <td colspan='2'><input type="tel" name="phone" maxlength='13' required></td>
                </tr>
                <tr>
                    <td><h3>Password : </h3></td>
                    <td colspan='2'><input type="password" name="password" maxlength='20' required></td>
                </tr>
                <tr>
                    <td colspan='3'><center><button type='Submit' style="background-color:black ; border-color:black" name='register_submit' required>Submit</button></center></td>
                </tr>
            </table>
        </form>

        <div align="center">
            <h3><a href='sindex.php' style="color: black">Registered? Sign In!</a></h3>
        </div>
    </div>
</body style="background-color: F5F1F0;">

</html>
