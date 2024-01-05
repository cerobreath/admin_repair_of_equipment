<?php
    include_once "../config/dbconnect.php";

    if (isset($_POST['upload'])) {
        // Validate and sanitize input
        $description = filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
        $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
        $category_id = filter_input(INPUT_POST, 'category_id', FILTER_SANITIZE_NUMBER_INT);

        // Validate description (letters, digits, spaces, punctuation, і, ї)
        if (!preg_match("/^[a-zA-Zа-яА-Яії0-9\s.,!?()\"']+$/u", $description)) {
            echo "Invalid description.";
            exit;
        }

        // Validate price (positive float)
        if ($price === false || $price <= 0) {
            echo "Invalid price.";
            exit;
        }

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO services (description, price, category_id) VALUES (?, ?, ?)");
        $stmt->bind_param("sdi", $description, $price, $category_id);

        if ($stmt->execute()) {
            echo "Records added successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
?>
