<?php
include './config/dbconnect.php';
include 'head2.php';

$name = mysqli_real_escape_string($conn, $_POST['name']);
$surname = mysqli_real_escape_string($conn, $_POST['surname']);
$patronymic = mysqli_real_escape_string($conn, $_POST['patronymic']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$phone = mysqli_real_escape_string($conn, $_POST['phone']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

// Хешування паролю
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Перевірка на унікальність ім'я
$checkNameQuery = "SELECT * FROM clients WHERE name = ?";
$checkNameStmt = mysqli_prepare($conn, $checkNameQuery);
mysqli_stmt_bind_param($checkNameStmt, "s", $name);
mysqli_stmt_execute($checkNameStmt);
mysqli_stmt_store_result($checkNameStmt);

// Перевірка на унікальність прізвища
$checkSurnameQuery = "SELECT * FROM clients WHERE surname = ?";
$checkSurnameStmt = mysqli_prepare($conn, $checkSurnameQuery);
mysqli_stmt_bind_param($checkSurnameStmt, "s", $surname);
mysqli_stmt_execute($checkSurnameStmt);
mysqli_stmt_store_result($checkSurnameStmt);

// Перевірка на унікальність побатькові
$checkPatronymicQuery = "SELECT * FROM clients WHERE patronymic = ?";
$checkPatronymicStmt = mysqli_prepare($conn, $checkPatronymicQuery);
mysqli_stmt_bind_param($checkPatronymicStmt, "s", $patronymic);
mysqli_stmt_execute($checkPatronymicStmt);
mysqli_stmt_store_result($checkPatronymicStmt);

// Перевірка на унікальність електронної адреси
$checkEmailQuery = "SELECT * FROM clients WHERE email = ?";
$checkEmailStmt = mysqli_prepare($conn, $checkEmailQuery);
mysqli_stmt_bind_param($checkEmailStmt, "s", $email);
mysqli_stmt_execute($checkEmailStmt);
mysqli_stmt_store_result($checkEmailStmt);

// Перевірка на унікальність телефону
$checkPhoneQuery = "SELECT * FROM clients WHERE phone = ?";
$checkPhoneStmt = mysqli_prepare($conn, $checkPhoneQuery);
mysqli_stmt_bind_param($checkPhoneStmt, "s", $phone);
mysqli_stmt_execute($checkPhoneStmt);
mysqli_stmt_store_result($checkPhoneStmt);

// Перевірка на унікальність електронної адреси
if (mysqli_stmt_num_rows($checkEmailStmt) > 0) {
    echo "<center><h1><b>Email is already registered. Please use a different email.<b></h1></center><br><br>";
    echo '<center><table><tr><td><a href="register.php"><button style="background-color:black; border-color:black"><span style="color:white">Register&nbsp&nbspAgain</span></button></a></td></tr></table></center>';
} elseif (mysqli_stmt_num_rows($checkNameStmt) > 0) {
    echo "<center><h1><b>Name is already registered. Please use a different name.<b></h1></center><br><br>";
    echo '<center><table><tr><td><a href="register.php"><button style="background-color:black; border-color:black"><span style="color:white">Register&nbsp&nbspAgain</span></button></a></td></tr></table></center>';
} elseif (mysqli_stmt_num_rows($checkSurnameStmt) > 0) {
    echo "<center><h1><b>Surname is already registered. Please use a different surname.<b></h1></center><br><br>";
    echo '<center><table><tr><td><a href="register.php"><button style="background-color:black; border-color:black"><span style="color:white">Register&nbsp&nbspAgain</span></button></a></td></tr></table></center>';
} elseif (mysqli_stmt_num_rows($checkPatronymicStmt) > 0) {
    echo "<center><h1><b>Patronymic is already registered. Please use a different patronymic.<b></h1></center><br><br>";
    echo '<center><table><tr><td><a href="register.php"><button style="background-color:black; border-color:black"><span style="color:white">Register&nbsp&nbspAgain</span></button></a></td></tr></table></center>';
} elseif (mysqli_stmt_num_rows($checkPhoneStmt) > 0) {
    echo "<center><h1><b>Phone number is already registered. Please use a different phone number.<b></h1></center><br><br>";
    echo '<center><table><tr><td><a href="register.php"><button style="background-color:black; border-color:black"><span style="color:white">Register&nbsp&nbspAgain</span></button></a></td></tr></table></center>';
} else {
    $insertQuery = "INSERT INTO clients (name, surname, patronymic, email, phone, password) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $insertQuery);
    mysqli_stmt_bind_param($stmt, "ssssss", $name, $surname, $patronymic, $email, $phone, $hashedPassword);

    if (mysqli_stmt_execute($stmt)) {
        echo "<center><h1><b>You have been successfully registered<b></h1></center><br><br>";
        echo '<center><table><tr><td><a href="sindex.php"><button style="background-color:black; border-color:black"><span style="color:white">Sign in! </span></button></a></td></tr></table></center>';
    } else {
        echo "<center><h1><b>Registration Unsuccessful, try again with different credentials<b></h1></center><br><br>";
        echo '<center><table><tr><td><a href="register.php"><button style="background-color:black; border-color:black"><span style="color:white">Register&nbsp&nbspAgain</span></button></a></td></tr></table></center>';
    }

    mysqli_stmt_close($stmt);
}

mysqli_stmt_close($checkNameStmt);
mysqli_stmt_close($checkSurnameStmt);
mysqli_stmt_close($checkPatronymicStmt);
mysqli_stmt_close($checkEmailStmt);
mysqli_stmt_close($checkPhoneStmt);

mysqli_close($conn);
?>
