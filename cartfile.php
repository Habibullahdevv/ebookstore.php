<?php 
session_start();
include('config.php');

// print_r($_POST);
$bookid = $_POST['bookid'];
$userid = $_POST['userid'];
$title = $_POST['title'];
$author = $_POST['author'];
$des = $_POST['des'];
$price = $_POST['price'];
$qty = $_POST['qty'];
$format = $_POST['format'];
// $subtotal = (int)$qty * (int)$price; 
$current_user_id = $_SESSION['userid'];
// echo $price;
// die();

// echo "$bookid . $title . $qty . $author . $des . $price .userid =  $current_user_id . $format";

if($current_user_id == $userid){
	$check_cart = "SELECT * from cart where book_id = '$bookid' AND user_id = '$userid'";
	$check_cart = mysqli_query($connection, $check_cart);
	if(mysqli_num_rows($check_cart) > 0){
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Product already exist in your cart</strong>.
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';	
        }else{
			// $qty = (int)$qty;
			// $price = $price;
			// $subtotal = (int)$qty * (int)$price;
			// $cart_insert = "INSERT INTO `cart` (`user_id`, `book_id`, `cart_qty`, `price`, `cart_format`, `cart_time`) VALUES ('$userid', '$bookid', '$qty', '$subtotal', '$format', current_timestamp())";
			// $subtotal = (int)$qty * (int)$price;
			$cart_insert = "INSERT INTO `cart` (`user_id`, `book_id`, `cart_qty`,`cart_format`, `cart_time`) VALUES ('" . $userid . "', '" . $bookid . "', '" . $qty . "','" . $format . "', current_timestamp())";
		$query = mysqli_query($connection, $cart_insert);
		if($query){
			echo '<div class="alert alert-success" role="alert">
			product added successfully
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
		  </div>
          ';

		}else{
			echo 'query failed';
		}

	}

	
}

?>