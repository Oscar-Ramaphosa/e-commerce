<?php
session_start();
include_once 'db_connection.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Delete all records from orderitems and shipping tables
    $deleteOrderItemsQuery = "DELETE FROM orderitems";
    $deleteShippingQuery = "DELETE FROM shipping";

    if (mysqli_query($conn, $deleteOrderItemsQuery) && mysqli_query($conn, $deleteShippingQuery)) {
        // Redirect to the viewOrder.php page with a success message
        $_SESSION['message'] = "All orders have been cleared.";
        header("Location: adminPage.php");
        exit();
    } else {
        // Redirect to the viewOrder.php page with an error message
        $_SESSION['message'] = "Error clearing orders: " . mysqli_error($conn);
        header("Location: adminPage.php");
        exit();
    }
}
?>
