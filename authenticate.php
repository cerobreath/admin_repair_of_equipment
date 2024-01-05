<?php
include './config/dbconnect.php';
include 'head2.php';

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);

$sql_clients = "SELECT * FROM clients WHERE email = '$email'";
$result_clients = mysqli_query($conn, $sql_clients);

if (mysqli_num_rows($result_clients) <= 0) {
    echo "<center><h1><b>Invalid email or password. Please login again.<b></h1></center><br><br>";
    echo '<center><table><tr><td><a href="sindex.php"><button style="background-color:black; border-color:black"><span style="color:white">Sign in again</span></button></a></td></tr></table></center>';
} else {
    $row_clients = mysqli_fetch_array($result_clients);

    // Розшифрування та порівняння хешованого паролю
    if (password_verify($password, $row_clients['password'])) {
        session_start();
        $_SESSION['client_id'] = $row_clients['client_id'];
        $_SESSION['email'] = $row_clients['email'];
        $_SESSION['name'] = $row_clients['name'];
        $_SESSION['surname'] = $row_clients['surname'];
        $_SESSION['patronymic'] = $row_clients['patronymic'];
        $_SESSION['phone'] = $row_clients['phone'];
        $_SESSION['address'] = $row_clients['address'];

        // Додавання інших змінних сесії за потреби

        $_SESSION['log'] = '1';

        header("location:indexClient.php");
    } else {
        echo "<center><h1><b>Invalid email or password. Please login again.<b></h1></center><br><br>";
        echo '<center><table><tr><td><a href="sindex.php"><button style="background-color:black; border-color:black"><span style="color:white">Sign in again</span></button></a></td></tr></table></center>';
    }
}
?>
