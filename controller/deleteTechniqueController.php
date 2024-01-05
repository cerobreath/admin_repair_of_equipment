<?php
include_once "../config/dbconnect.php";

$technique_id = mysqli_real_escape_string($conn, $_POST['record']);

$query = "DELETE FROM technique WHERE technique_id='$technique_id'";

$data = mysqli_query($conn, $query);

if ($data) {
    echo "Technique Deleted";
} else {
    echo "Not able to delete";
}
?>