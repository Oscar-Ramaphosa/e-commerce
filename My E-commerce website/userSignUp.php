<?php
// Connection to the MySQL database
include_once 'db_connection.php';

// Retrieving user input from the form field
$name = $_POST['name'];
$surname = $_POST['surname'];
$password = $_POST['password']; 

// Check if the username already exists
$sqlCheck = "SELECT id FROM signup WHERE name = ?";
$st = $conn->prepare($sqlCheck);
$st->bind_param("s", $name);
$st->execute();
$result = $st->get_result();

if ($result->num_rows > 0) {
    // Username already exists, display error message
    $errorMessage = "Error: Username already exists. Please choose another username.";
} else {
    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Insert the user data into the database
    $sqlInsert = "INSERT INTO signup (name, surname, password) VALUES (?, ?, ?)";
    $st = $conn->prepare($sqlInsert);
    $st->bind_param("sss", $name, $surname, $hashed_password);
    
    if ($st->execute()) {
        // Registration successful, redirect to login page
        header("Location: login.php");
        exit;
    } else {
        // Display error message if registration fails
        echo "Error: " . $sqlInsert . "<br>" . $conn->error;
    }
}

// Close connection
$st->close();
$conn->close();

// Return error message if exists, otherwise, stay on the same page
if (isset($errorMessage)) {
    echo "<script>
            alert('$errorMessage');
            window.history.back();
          </script>";
    exit; 
}
?>

