<?php
include 'head2.php';

session_start();
?>
<html>
<head>
<link rel='stylesheet' href='logStyle.css'>
 <link rel="shortcut icon" href="logofig.jpg" />
</head>
<body style="background-color: F5F1F0;">
<?php
session_destroy();
echo '<center><h2>Thank you for using the app to request a repair of your equipment!<h2></center><br>';
echo '<center><table><tr><td><A href="index.php"><button style="background-color:black; border-color:black">Log in again</button></a></td></tr></table></center>';
?>
</body style="background-color: F5F1F0;">
</html>