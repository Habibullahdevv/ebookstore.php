<style>
    /* General styling for the orders section */
    body {
        background-color: #f4f7fa; /* Light background for the whole page */
        font-family: 'Arial', sans-serif;
    }

    .placed-orders {
        padding: 50px 20px;
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
        max-width: 450px;
        transition: transform 0.3s ease;
        position: relative;
        overflow: hidden;
        margin-bottom: 30px;
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
        font-size: 1rem;
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

    /* Styling for the form buttons */
    .option-btn, .delete-btn {
        background-color: #4caf50; /* Green button for update */
        color: #fff;
        border: none;
        padding: 8px 16px;
        margin-top: 10px;
        border-radius: 5px;
        cursor: pointer;
        text-transform: uppercase;
        font-size: 0.9rem;
        transition: background-color 0.3s ease;
    }

    .option-btn:hover, .delete-btn:hover {
        background-color: #3e8e41; /* Darker green on hover */
    }

    .delete-btn {
        background-color: #d9534f; /* Red button for delete */
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

<?php
ob_start(); // Start output buffering

include("config.php");
session_start();
if(!isset($_SESSION['Email'])){
    header("Location:login.php");
    exit;
}

include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');

// Update order payment status
if(isset($_POST['update_order'])){
    $order_update_id = $_POST['order_id'];
    $update_payment = $_POST['update_payment'];
    mysqli_query($connection, "UPDATE `orderlist` SET payment_status = '$update_payment' WHERE id = '$order_update_id'") or die('Query failed: ' . mysqli_error($connection));
    $message[] = 'Payment status has been updated!';
}

// Delete order
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    mysqli_query($connection, "DELETE FROM `orderlist` WHERE id = '$delete_id'") or die('Error deleting record: ' . mysqli_error($connection));
    header('location:admin_order.php');
    exit; // Ensure no further code is executed after redirection
}
?>

<section class="placed-orders">
    <h1 class="title">Your Placed Orders</h1>
    <div class="box-container">
        <?php
        $select_orders = mysqli_query($connection, "SELECT * FROM `orderlist`") or die('Query failed: ' . mysqli_error($connection));
        if(mysqli_num_rows($select_orders) > 0){
            while($fetch_orders = mysqli_fetch_assoc($select_orders)){
        ?>
        <div class="order-card">
            <div class="order-header">
                <h2 class="order-title">Order Details</h2>
                <p class="order-date"><?php echo date('F j, Y', strtotime($fetch_orders['placed_on'])); ?></p>
            </div>
            <div class="order-info">
                <p><strong>Your order id:</strong> #<?php echo $fetch_orders['id']; ?></p>
                <p><strong>Name:</strong> <?php echo $fetch_orders['username']; ?></p>
                <p><strong>Number:</strong> <?php echo $fetch_orders['phone']; ?></p>
                <p><strong>E-mail:</strong> <?php echo $fetch_orders['email']; ?></p>
                <p><strong>Address:</strong> <?php echo $fetch_orders['address']; ?></p>
                <p><strong>City:</strong> <?php echo $fetch_orders['city']; ?></p>
                <p><strong>Your Orders:</strong> <?php echo $fetch_orders['total_products']; ?></p>
                <p><strong>Total Price:</strong> $<?php echo $fetch_orders['total']; ?>/-</p>
                <p>Payment Method: Card</p>
            </div>
            <form action="" method="post">
                <input type="hidden" name="order_id" value="<?php echo $fetch_orders['id']; ?>">
                <select name="update_payment">
                    <option value="" selected disabled><?php echo $fetch_orders['payment_status']; ?></option>
                    <option value="Pending">Pending</option>
                    <option value="Completed">Completed</option>
                </select>
                <input type="submit" value="Update" name="update_order" class="option-btn">
                <a href="admin_order.php?delete=<?php echo $fetch_orders['id']; ?>" onclick="return confirm('Delete this order?');" class="delete-btn">Delete</a>
            </form>
        </div>
        <?php
            }
        } else {
            echo '<p class="empty">No orders placed yet!</p>';
        }
        ?>
    </div>
</section>

<?php
ob_end_flush(); // Flush the output buffer
include('admin/includes/footer.php');
?>
