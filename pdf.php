<?php
session_start();

// Check if user is logged in
if(isset($_SESSION['userid'])) {
    // Establish database connection
    include('config.php');

    // Get order ID from session
    $query = "SELECT * FROM `billing`";
    $results = mysqli_query($connection, $query);
    mysqli_num_rows($results) > 0;
    $orders = mysqli_fetch_assoc($results);

    $order_id = $orders['order_id'];

    // Fetch order details from database
    $query = "SELECT * FROM `orderlist` WHERE `id` = '$order_id'";
    $result = mysqli_query($connection, $query);

    // Check if order exists
    if(mysqli_num_rows($result) > 0) {
        $order = mysqli_fetch_assoc($result);

        // Generate PDF content
        $pdf_content = "
            Order Receipt\n\n
            Order ID: {$order['order_id']}\n
            Username: {$order['username']}\n
            // Add more order details as needed
        ";

        // Set headers for PDF download
        header('Content-Type: application/pdf');
        header('Content-Disposition: attachment; filename="OrderReceipt.pdf"');

        // Output PDF content
        echo $pdf_content;

        // Exit the script to prevent any further output
        exit();
    } else {
        echo "Order not found!";
    }
} else {
    echo "User not logged in!";
}
?>
