<?php
session_start(); // Start session to store user authentication status

// Database connection
include_once 'db_connection.php';

// Retrieving user input from the login form fields
$username = $_POST['username'];
$password = $_POST['password']; 

// Check the signup table for user credentials
$sql_check_signup = "SELECT id, Name, password FROM signup WHERE Name = ?";
$stmt_signup = $conn->prepare($sql_check_signup);
$stmt_signup->bind_param("s", $username);
$stmt_signup->execute();
$result_signup = $stmt_signup->get_result();

if ($result_signup->num_rows == 1) {
    // User exists in signup table, verify password
    $row_signup = $result_signup->fetch_assoc();
    if (password_verify($password, $row_signup['password'])) {
        // Password is correct, set session variables and redirect to home page
        $_SESSION['id'] = $row_signup['id'];
        $_SESSION['username'] = $row_signup['Name'];
        header("Location: index.php");
        exit;
    } else {
        // Password is incorrect for signup table user
        $error_message = "Invalid username or password. Please try again.";
        echo "<script>
                alert('$error_message');
                window.location.href = 'login.php';
              </script>";
        exit;
    }
} else {
    // Check the admin table for user credentials
    $sql_check_admin = "SELECT id, Name, password FROM admin WHERE Name = ?";
    $stmt_admin = $conn->prepare($sql_check_admin);
    $stmt_admin->bind_param("s", $username);
    $stmt_admin->execute();
    $result_admin = $stmt_admin->get_result();

    if ($result_admin->num_rows == 1) {
        // User exists in admin table, verify password
        $row_admin = $result_admin->fetch_assoc();
        if (password_verify($password, $row_admin['password'])) {
            // Password is correct, set session variables and redirect to admin page
            $_SESSION['id'] = $row_admin['id'];
            $_SESSION['username'] = $row_admin['Name'];
            header("Location: AdminPage.php");
            exit;
        } else {
            // Password is incorrect for admin table user
            $error_message = "Invalid username or password. Please try again.";
            echo "<script>
                    alert('$error_message');
                    window.location.href = 'login.php';
                  </script>";
            exit;
        }
    } else {
        // Username not found in either table
        $error_message = "Invalid username or password. Please try again.";
        echo "<script>
                alert('$error_message');
                window.location.href = 'login.php';
              </script>";
        exit;
    }
}
?>
