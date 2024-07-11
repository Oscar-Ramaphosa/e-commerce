<?php
session_start();

// the folowing code checks if the user is logged in before it adds to cart
if (!isset($_SESSION['id'])) {
    // if a user is not logged in, send this error message using unauthorized status code
    http_response_code(401);
    echo "Sorry, Please log in to add items to your cart.";
    exit();
}

// Database connection, this connection is created on db_connection.php
include_once 'db_connection.php';

// Get the user ID from session
$user_id = $_SESSION['id'];

// Checking if the form is submitted from html
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the product details from the form created on html
    $productName = $_POST['productName'];
    $productPrice = $_POST['productPrice'];
    
    // Inserting the values from the form into the database table
    $sql = "INSERT INTO addcartproducts (name, price, user_id) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sdi", $productName, $productPrice, $user_id);
    
    if ($stmt->execute()) {
        // Getting the total number of products in the cart and return it
        $totalProducts = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM addcartproducts WHERE user_id = $user_id"));
        echo $totalProducts;
    } else {
        //throw an Internal server error status code if there is.
        http_response_code(500);
        echo "Error: Unable to add item to cart. Please try again later.";
    }
    
    $stmt->close();
}
?>
