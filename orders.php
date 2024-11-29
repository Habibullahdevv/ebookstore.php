<?php
session_start();
require('header.php');
if (!isset($_SESSION['useremail'])) {
    header('location:login.php');
}

$userid = $_SESSION['userid']; // Get the logged-in user's ID

?>

<style>
/* General styling for the orders section */
body {
    background-color: #f4f7fa; /* Light background for the whole page */
    font-family: 'Arial', sans-serif;
}

.placed-orders {
    padding: 150px 20px;
    max-width: 1200px;
    margin: auto;
}

.placed-orders .title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333; /* Dark color for the title */
    margin-bottom: 30px;
    text-align: center;
}

/* Box container for the orders */
.box-container {
    display: flex;
    flex-wrap: wrap;
    gap: 30px;
    justify-content: center;
}

/* Styling for individual order cards */
.order-card {
    background-color: #ffffff; /* White background for the card */
    border-radius: 10px;
    padding: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    width: 100%;
    max-width: 350px;
    transition: transform 0.3s ease;
    position: relative;
    overflow: hidden;
}

.order-card:hover {
    transform: translateY(-3px);
}

/* Header styling for each order */
.order-header {
    border-bottom: 2px solid #4caf50; /* Green line for separation */
    margin-bottom: 15px;
    padding-bottom: 10px;
}

.order-title {
    font-size: 1.5rem;
    color: #B65F21; /* Green color for order title */
    margin: 0;
}

.order-date {
    font-size: 0.9rem;
    color: #888;
}

/* Styling for order information */
.order-info p, .order-summary p {
    margin: 8px 0;
    font-size: 0.95rem;
    color: #555;
}

/* Attractive heading styles */
.order-info p strong, .order-summary p strong {
    font-weight: bold;
    color: #333; /* Darker color for strong text */
}

/* Styling for payment status */
.status {
    font-weight: 600;
    padding: 5px 10px;
    border-radius: 4px;
    text-transform: uppercase;
    font-size: 0.9rem;
}

.status.pending {
    background-color: #ffcccb; /* Light red for pending */
    color: #d9534f; /* Red color for pending status */
}

.status.completed {
    background-color: #cce5ff; /* Light blue for completed */
    color: #007bff; /* Blue color for completed status */
}

/* Responsive Design */
@media (max-width: 768px) {
    .box-container {
        flex-direction: column;
        align-items: center;
    }

    .order-card {
        max-width: 90%;
    }
}

/* Empty state styling */
.empty {
    font-size: 1.2rem;
    color: #999;
    text-align: center;
    margin-top: 20px;
    font-weight: bold;
}

</style>


<!-- Placed Orders Section -->
<section class="placed-orders">

   <h1 class="title">Your Placed Orders</h1>
   
    <div class="box-container">

        <?php
        // Your SQL query with user filtering
        $order_query = "SELECT * FROM `orderlist` WHERE `userid` = '$userid'"; // Filter orders by logged-in user ID
        
        // Execute the query and check for errors
        $result = mysqli_query($connection, $order_query);

        // If query fails, show error message
        if (!$result) {
            die('Query failed: ' . mysqli_error($connection)); // This will show any SQL errors
        }

        // Check if there are rows returned
        if (mysqli_num_rows($result) > 0) {
            while ($fetch_orders = mysqli_fetch_assoc($result)) {
        ?>
            <div class="order-card">
                <div class="order-header">
                    <h2 class="order-title">Details.</h2>
                    <p class="order-date"><?php echo date('F j, Y', strtotime($fetch_orders['placed_on'])); ?></p>
                </div>
                <div class="order-info">
                    <p><strong>Your order id:</strong> #<?php echo $fetch_orders['id']; ?></p>
                    <p><strong>Name:</strong> <?php echo $fetch_orders['username']; ?></p>
                    <p><strong>Number:</strong> <?php echo $fetch_orders['phone']; ?></p>
                    <p><strong>E-mail:</strong> <?php echo $fetch_orders['email']; ?></p>
                    <p><strong>Address:</strong> <?php echo $fetch_orders['address']; ?></p>
                    <p><strong>City:</strong> <?php echo $fetch_orders['city']; ?></p>
                </div>
                <div class="order-summary">
                    <p><strong>Your Orders:</strong> <?php echo $fetch_orders['total_products']; ?></p>
                    <p><strong>Total Price:</strong> $<?php echo $fetch_orders['total']; ?>/-</p>
                    <p><strong>Payment Status:</strong> 
                        <span class="status <?php echo ($fetch_orders['payment_status'] == 'pending') ? 'pending' : 'completed'; ?>">
                            <?php echo $fetch_orders['payment_status']; ?>
                        </span>
                    </p>
                </div>
            </div>
        <?php
            }
        } else {
            echo '<p class="empty">No orders placed yet!</p>';
        }
        ?>
    </div>

</section>

<?php include('footer.php'); ?>
