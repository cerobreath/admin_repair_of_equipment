<?php
include './config/dbconnect.php';
include 'head2.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql_employees = "SELECT * FROM employees WHERE email = '$email'";
$result_employees = mysqli_query($conn, $sql_employees);

if (mysqli_num_rows($result_employees) <= 0) {
    echo "<center><h1><b>Something went wrong, please sign in again<b></h1></center><br><br>";
    echo '<center><table><tr><td><a href="adminindex.php"><button style="background-color:black; border-color:black"><span style="color:white">Sign In Again</span></button></a></td></tr></table></center>';
} else {
    $row_employees = mysqli_fetch_array($result_employees);

    // Розшифрування та порівняння хешованого паролю
    if (password_verify($password, $row_employees['password'])) {
        session_start();
        $_SESSION['email'] = $email;
        $_SESSION['name'] = $row_employees['name'];
        $_SESSION['surname'] = $row_employees['surname'];
        $_SESSION['patronymic'] = $row_employees['patronymic'];
        $_SESSION['phone'] = $row_employees['phone'];

        // Додавання даних з інших таблиць до сесії
        $_SESSION['categories'] = $row_employees['categories'];
        $_SESSION['clients'] = $row_employees['clients'];
        $_SESSION['employees'] = $row_employees['employees'];
        $_SESSION['orders'] = $row_employees['orders'];
        $_SESSION['order_techniques'] = $row_employees['order_techniques'];
        $_SESSION['services'] = $row_employees['services'];
        $_SESSION['technique'] = $row_employees['technique'];

        $_SESSION['log'] = '1';

        header("location:indexAdmin.php");
    } else {
        echo "<center><h1><b>Invalid email or password. Please sign in again<b></h1></center><br><br>";
        echo '<center><table><tr><td><a href="adminindex.php"><button style="background-color:black; border-color:black"><span style="color:white">Sign In Again</span></button></a></td></tr></table></center>';
    }
}
?>
