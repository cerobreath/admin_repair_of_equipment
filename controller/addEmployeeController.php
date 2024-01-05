<?php
    include_once "../config/dbconnect.php";

    if (isset($_POST['upload'])) {
        // Validate and sanitize input
        $employeeName = filter_input(INPUT_POST, 'e_name', FILTER_SANITIZE_STRING);
        $employeeSurname = filter_input(INPUT_POST, 'e_surname', FILTER_SANITIZE_STRING);
        $employeePatronymic = filter_input(INPUT_POST, 'e_patronymic', FILTER_SANITIZE_STRING);
        $employeeEmail = filter_input(INPUT_POST, 'e_email', FILTER_VALIDATE_EMAIL);
        $employeePhone = filter_input(INPUT_POST, 'e_phone', FILTER_SANITIZE_NUMBER_INT);

        // Validate employeeName, employeeSurname, employeePatronymic (letters, spaces, і, ї)
        if (!preg_match("/^[a-zA-Zа-яА-Яії\s]+$/u", $employeeName) ||
            !preg_match("/^[a-zA-Zа-яА-Яії\s]+$/u", $employeeSurname) ||
            !preg_match("/^[a-zA-Zа-яА-Яії\s]+$/u", $employeePatronymic)) {
            echo "Invalid name, surname, or patronymic.";
            exit;
        }

        // Validate employeePhone (only digits and +)
        if (!preg_match("/^[0-9+]+$/", $employeePhone)) {
            echo "Invalid phone number.";
            exit;
        }

        // Validate employeeEmail (only English letters, digits, @, and .)
        if (!preg_match("/^[a-zA-Z0-9@.]+$/", $employeeEmail)) {
            echo "Invalid email address.";
            exit;
        }

        // Use prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO employees (name, surname, patronymic, email, phone) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $employeeName, $employeeSurname, $employeePatronymic, $employeeEmail, $employeePhone);

        if ($stmt->execute()) {
            echo "Records added successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }

        $stmt->close();
    }
?>
