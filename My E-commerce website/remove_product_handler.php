<?php
session_start();
include_once 'db_connection.php';

// Handling product removal
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id'])) {
    $product_id = intval($_POST['product_id']);
    $sql = "DELETE FROM Products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);

    if ($stmt->execute()) {
        echo "Product removed successfully.";
    } else {
        echo "Error removing product: " . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
