<?php
// Connection to the MySQL database
include_once 'db_connection.php';

// Retrieving user input from the form fields
$name = $_POST['name'];
$password = $_POST['password']; 


// Check if the username already exists
$sql_check = "SELECT id FROM admin WHERE name = ?";
$stmt = $conn->prepare($sql_check);
$stmt->bind_param("s", $name);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Username already exists, display error message
    $error_message = "Error: Username already exists. Please choose another username.";
} else {
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user data into the database
    $sql_insert = "INSERT INTO admin (name, password) VALUES (?, ?)";
    $stmt = $conn->prepare($sql_insert);
    $stmt->bind_param("ss", $name, $hashed_password);
    
    if ($stmt->execute()) {
        // Registration successful, redirect to login page
        header("Location: login.php");
        exit;
    } else {
        // Display error message if registration fails
        echo "Error: " . $sql_insert . "<br>" . $conn->error;
    }
}

// Close connection
$stmt->close();
$conn->close();

// Return error message if exists, otherwise, stay on the same page
if (isset($error_message)) {
    echo "<script>
            alert('$error_message');
            window.history.back();
          </script>";
    exit; 
}
?>

