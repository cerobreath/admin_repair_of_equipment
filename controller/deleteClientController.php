<?php

    include_once "../config/dbconnect.php";
    
    $c_id = mysqli_real_escape_string($conn, $_POST['record']);
    $query="DELETE FROM clients where client_id='$c_id'";

    $data=mysqli_query($conn,$query);

    if($data){
        echo"Client Deleted";
    }
    else{
        echo"Not able to delete";
    }
    
?>