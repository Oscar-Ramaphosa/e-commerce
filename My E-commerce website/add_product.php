<?php
session_start();

// Checking if form is submitted from html
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    include_once 'db_connection.php';

    // Preparing and bind parameters
    $name = $_POST["product_name"];
    $price = $_POST["product_price"];
    $image = $_FILES["product_image"]["name"];
    // Define the target directory to save the image
    $target = "product_images/".basename($image); 

    // Move uploaded image to product_image directory
    move_uploaded_file($_FILES["product_image"]["tmp_name"], $target);

    // SQL to insert data into products table
    $sql = "INSERT INTO products (name, price, image_url) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sds", $name, $price, $image); 

    // Execute the prepared statement and Redirect to adminPage.php
    if ($stmt->execute()) {
        $_SESSION["message"] = "Product added successfully!";
        $stmt->close();
        $conn->close();
        header("Location: adminPage.php"); 
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
