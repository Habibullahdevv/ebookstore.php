

<?php
include("config.php");
session_start();
if (!isset($_SESSION['Email'])) {
    header("Location:login.php");
}

include('admin/includes/header.php');
include('admin/includes/sidebar.php');
include('admin/includes/topbar.php');

// Handle delete message request
if (isset($_POST['delete_message'])) {
    $delete_id = $_POST['delete_id'];
    
    $delete_query = "DELETE FROM `contact` WHERE id = '$delete_id'";
    $delete_result = mysqli_query($connection, $delete_query);
    
    if ($delete_result) {
        echo "<script>alert('Message deleted successfully!');</script>";
        // Optionally, you can refresh the page to show the updated message list
        echo "<script>window.location.href='messages.php';</script>";
    } else {
        echo "<script>alert('Failed to delete the message.');</script>";
    }
}
?>

<!-- HTML for displaying the messages -->
<section class="placed-orders">
   <h1 class="title">Users messages</h1>
   
   <div class="box-container">
   <?php
   // Fetch user messages
   $select_orders = mysqli_query($connection, "SELECT * FROM `contact`") or die('query failed');
   
   if (mysqli_num_rows($select_orders) > 0) {
      while ($fetch_orders = mysqli_fetch_assoc($select_orders)) {
   ?>
      <div class="order-card">
         <div class="order-header">
            <h2 class="order-title">Messages.</h2>
            <p class="order-date"><?php echo date('F j, Y', strtotime($fetch_orders['message_date'])); ?></p>
         </div>
         <div class="order-info">
            <p><strong>First name:</strong> <?php echo $fetch_orders['fname']; ?></p>
            <p><strong>Last name:</strong> <?php echo $fetch_orders['lname']; ?></p>
            <p><strong>E-mail:</strong> <?php echo $fetch_orders['email']; ?></p>
            <p><strong>Message:</strong> <?php echo $fetch_orders['msg']; ?></p>
         </div>

         <!-- Delete button form -->
         <form method="POST" action="">
            <input type="hidden" name="delete_id" value="<?php echo $fetch_orders['id']; ?>">
            <button type="submit" name="delete_message" class="delete-btn">Delete</button>
         </form>
      </div>
   <?php
      }
   } else {
      echo '<p class="empty">No messages yet!</p>';
   }
   ?>
   </div>
</section>

<?php
include('admin/includes/footer.php');
?>

<!-- CSS Styles -->
<style>
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

    .box-container {
        display: flex;
        flex-wrap: wrap;
        gap: 30px;
        justify-content: center;
    }

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

    .order-header {
        border-bottom: 2px solid #4caf50; /* Green line for separation */
        margin-bottom: 15px;
        padding-bottom: 10px;
    }

    .order-title {
        font-size: 1.5rem;
        color: #B65F21; /* Custom color for order title */
        margin: 0;
    }

    .order-date {
        font-size: 0.9rem;
        color: #888;
    }

    .order-info p, .order-summary p {
        margin: 8px 0;
        font-size: 1rem;
        color: #555;
    }

    .order-info p strong {
        font-weight: bold;
        color: #333;
    }

    .status {
        font-weight: 600;
        padding: 5px 10px;
        border-radius: 4px;
        text-transform: uppercase;
        font-size: 0.9rem;
    }

    .status.pending {
        background-color: #ffcccb;
        color: #d9534f;
    }

    .status.completed {
        background-color: #cce5ff;
        color: #007bff;
    }

    .option-btn, .delete-btn {
        background-color: #4caf50;
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
        background-color: #3e8e41;
    }

    .delete-btn {
        background-color: #d9534f;
    }

    @media (max-width: 768px) {
        .box-container {
            flex-direction: column;
            align-items: center;
        }

        .order-card {
            max-width: 90%;
        }
    }

    .empty {
        font-size: 1.2rem;
        color: #999;
        text-align: center;
        margin-top: 20px;
        font-weight: bold;
    }
</style>
