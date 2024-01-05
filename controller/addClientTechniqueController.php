<?php
include_once "../config/dbconnect.php";

if (isset($_POST['upload'])) {
    // Validate and sanitize input
    $technique_name = filter_input(INPUT_POST, 'technique_name', FILTER_SANITIZE_STRING);
    $technique_description = filter_input(INPUT_POST, 'technique_description', FILTER_SANITIZE_STRING);
    $category_id = filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_NUMBER_INT);
    $employee_id = filter_input(INPUT_POST, 'employee_email', FILTER_SANITIZE_NUMBER_INT);

    // Validate technique_name (letters, digits, spaces, і, ї)
    if (!preg_match("/^[a-zA-Zа-яА-Яії0-9\s]+$/u", $technique_name)) {
        echo "Invalid technique name.";
        exit;
    }

    // Validate technique_description (letters, digits, spaces, punctuation, і, ї)
    if (!preg_match("/^[a-zA-Zа-яА-Яії0-9\s.,!?()\"']+$/u", $technique_description)) {
        echo "Invalid technique description.";
        exit;
    }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO technique (name, description, category_id, employee_id) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssii", $technique_name, $technique_description, $category_id, $employee_id);

    if ($stmt->execute()) {
        echo "Records added successfully.";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}
?>
