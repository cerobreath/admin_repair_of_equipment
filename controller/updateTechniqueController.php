<?php
include_once "../config/dbconnect.php";

$technique_id = mysqli_real_escape_string($conn, $_POST['technique_id']);
$description = mysqli_real_escape_string($conn, $_POST['technique_description']);
$category_id = mysqli_real_escape_string($conn, $_POST['category_id']);
$employee_id = mysqli_real_escape_string($conn, $_POST['employee_id']);

// Validate technique_name - Allow only letters, digits, Cyrillic, and "і, ї"
$valid_description = preg_match("/^[\p{L}\dії.,!?()'\s]+$/u", $description);

// Validate technique_description - Allow only letters, digits, Cyrillic, and "і, ї"
$valid_category_id = is_numeric($category_id);
$valid_employee_id = is_numeric($employee_id);

if (!$valid_description) {
    echo "Invalid technique_description format";
    exit;
}

if (!$valid_category_id) {
    echo "Invalid category_id format";
    exit;
}

if (!$valid_employee_id) {
    echo "Invalid employee_id format";
    exit;
}

$updateTechnique = mysqli_query($conn, "UPDATE technique SET 
    description='$description', 
    category_id=$category_id,
    employee_id=$employee_id
    WHERE technique_id=$technique_id");

if ($updateTechnique) {
    echo "true";
} else {
    echo mysqli_error($conn);
}
?>
