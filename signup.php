<?php
    include 'connection.php';

    if (isset($_POST['signUp'])) {
        $firstName = $_POST['firstname'];
        $lastName = $_POST['lastname'];
        $password = $_POST['password'];
        $email = $_POST['email'];

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare statement to check if email exists
        $checkEmailStmt = $conn->prepare("SELECT * FROM Users WHERE Email = ?");
        $checkEmailStmt->bind_param("s", $email);
        $checkEmailStmt->execute();
        $result = $checkEmailStmt->get_result();

        if ($result->num_rows > 0) {
            echo "This email is already in use.";
        } else {
            // Prepare statement to insert new user
            $insertStmt = $conn->prepare("INSERT INTO Users (FirstName, LastName, PasswordHash, Email) VALUES (?, ?, ?, ?)");
            $insertStmt->bind_param("ssss", $firstName, $lastName, $hashedPassword, $email);

            if ($insertStmt->execute()) {
                header("Location: index.php");
                exit();
            } else {
                echo "ERROR: " . $insertStmt->error;
            }
            $insertStmt->close();
        }
        $checkEmailStmt->close();
    }
?>