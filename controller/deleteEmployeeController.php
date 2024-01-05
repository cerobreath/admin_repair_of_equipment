<?php

include_once "../config/dbconnect.php";

$e_id = mysqli_real_escape_string($conn, $_POST['record']);
$query="DELETE FROM employees WHERE employee_id='$e_id'";

$data=mysqli_query($conn,$query);

if($data){
    echo"Employee Deleted";
}
else{
    echo"Not able to delete";
}

?>