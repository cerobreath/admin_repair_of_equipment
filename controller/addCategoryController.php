<?php
    include_once "../config/dbconnect.php";

    if (isset($_POST['upload'])) {
        // Validate and sanitize input
        $categoryName = filter_input(INPUT_POST, 'category_name', FILTER_SANITIZE_STRING);

        // Check if the input is a valid category name (letters, spaces, і, ї)
        if (!preg_match("/^[a-zA-Zа-яА-Яії\s]+$/u", $categoryName)) {
            echo "Invalid category name.";
            exit;
        }

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO categories (name) VALUES (?)");
        $stmt->bind_param("s", $categoryName);
        
        if ($stmt->execute()) {
            echo "Records added successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
?>
