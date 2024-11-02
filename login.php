<?php
    session_start();
    include 'connection.php';

    // Check if the login form has been submitted
    if (isset($_POST['logIn'])) {
        // 1. Get the user inputs
        $email = $_POST['email']; 
        $password = $_POST['password'];

        // 2. Use prepared statements to prevent SQL injection
        $stmt = $conn->prepare("SELECT * FROM Users WHERE Email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        // 3. Check if the user exists
        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // 4. Verify the password
            if (password_verify($password, $row['PasswordHash'])) {
                // 5. Regenerate session ID for security
                session_regenerate_id(true);
                $_SESSION['userID'] = $row['UserID']; // Store user ID in session
                $_SESSION['username'] = $row['FirstName']; // Store user first name in session
                $_SESSION['fullName'] = $row['FirstName'] . ' ' . $row['LastName']; // Optional: store full name

                // Redirect based on role or specific condition
                if ($email === 'admin@example.com') { // Adjust based on your admin email check
                    header("Location: dashboard/notification.php"); // Redirect to admin dashboard
                } else {
                    header("Location: dashboard/bookprev.php"); // Redirect to user dashboard
                }
                exit();
            } else {
                $_SESSION['errorMessage'] = "Invalid email or password.";
            }
        } else {
            $_SESSION['errorMessage'] = "Invalid email or password.";
        }

        // Close the statement
        $stmt->close();
    }
?>