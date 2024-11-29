<?php
include('config.php');

// DELETE all DATA from CART
if (isset($_GET['userid'])) {
    $userid = $_GET['userid'];

    // Check if cart has items
    $checkCart = mysqli_query($connection, "SELECT * FROM `cart` WHERE `user_id` = '$userid'");
    if (mysqli_num_rows($checkCart) > 0) {
        $result = mysqli_query($connection, "DELETE FROM `cart` WHERE `user_id` = '$userid'");
        if ($result) {
            echo '<script>
            alert("All items deleted successfully");
            window.location.href="cartdetails.php";
            </script>';
        } else {
            echo '<script>
            alert("Error: Data not deleted");
            </script>';
        }
    } else {
        echo '<script>
        alert("There are no items in the cart to remove");
        window.location.href="cartdetails.php";
        </script>';
    }
}

// Start DELETE single product from cart
if (isset($_GET['itemid'])) {
    $itemid = $_GET['itemid'];

    // Check if the item exists before trying to delete
    $checkItem = mysqli_query($connection, "SELECT * FROM `cart` WHERE `cart_id` = '$itemid'");
    
    if (mysqli_num_rows($checkItem) > 0) {
        $result = mysqli_query($connection, "DELETE FROM `cart` WHERE `cart_id` = '$itemid'");
        if ($result) {
            echo '<script>
            alert("Item deleted successfully");
            window.location.href="cartdetails.php";
            </script>';
        } else {
            echo '<script>
            alert("Error: Data not deleted");
            </script>';
        }
    } else {
        echo '<script>
        alert("No item found in the cart to remove");
        window.location.href="cartdetails.php";
        </script>';
    }
}
?>
