
<style>.order-col {
    background-color: #F9F8F8; /* Light background */
    padding: 20px;
    border-radius: 10px;
    margin-bottom: 20px;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); /* Softer shadow */
    color: #020662; /* Dark blue text color */
    transition: background-color 0.3s ease, box-shadow 0.3s ease;
}

.order-title {
    font-size: 24px;
    font-weight: bold;
    color: #B65F20; /* Warm heading color */
    margin-bottom: 10px;
}

.order-category, .order-description, .order-author, .order-price, .order-status {
    margin-top: 10px;
    font-size: 16px;
    color: #020662; /* Dark blue text for details */
}

.order-image {
    display: block;
    margin: 15px auto;
    max-width: 150px;
    border-radius: 8px;
    border: 2px solid #B65F20; /* Warm border color */
}

.order-price {
    font-size: 18px;
    font-weight: bold;
    color: #B65F20; /* Warm color for price */
    margin-top: 15px;
}

.order-status {
    font-size: 16px;
    color: #020662; /* Dark blue text for status */
    font-style: italic;
}

.order-col:hover {
    background-color: #ECECEC; /* Lighter hover effect */
    box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15); /* Slightly stronger shadow on hover */
}

.order-category, .order-description {
    padding-left: 10px; /* Some padding to indent text slightly */
    border-left: 3px solid #B65F20; /* Warm color vertical accent */
}
</style>
<?php
session_start();
require('header.php');
include("config.php");



if(isset($_SESSION['userid'])){
	
	$userid=$_SESSION['userid'];
	$subtotals=$_SESSION['subtotal'];
	// echo $subtotals;
	// $_SESSION['subtotal'] = 0; // Setting a default value for total

	// echo $userid;
?>

<style>
    /* Adjust input size */
    .input {
        width: 80%; /* Change the width as needed */
        padding: 10px; /* Add padding for better readability */
        margin-bottom: 10px; /* Add margin to separate inputs */
    }

    /* Adjust textarea size */
    .order-notes textarea {
        width: 80%; /* Change the width as needed */
        height: 100px; /* Change the height as needed */
        padding: 100px; /* Add padding for better readability */
        margin-bottom: 20px; /* Add margin to separate inputs */
    }
</style> 
<!DOCTYPE html>
<html lang="en">

	<?php
	
	if(isset($_POST['place']) && $_SERVER['REQUEST_METHOD']=="POST"){
		// $userid=$_SESSION['userid'];
		$username= mysqli_real_escape_string($connection, $_POST['username']);
		$email= mysqli_real_escape_string($connection, $_POST['email']);
		$address= mysqli_real_escape_string($connection, $_POST['address']);
		$city= mysqli_real_escape_string($connection, $_POST['province']);
		$country= mysqli_real_escape_string($connection, $_POST['country']);
		$zipcode= mysqli_real_escape_string($connection, $_POST['zipcode']);
		$phone= mysqli_real_escape_string($connection, $_POST['phone']);
		$cardholder= mysqli_real_escape_string($connection, $_POST['carholder']);
		$cardno= mysqli_real_escape_string($connection, $_POST['cardno']);
		$cvc= mysqli_real_escape_string($connection, $_POST['cvc']);
		$expiry= mysqli_real_escape_string($connection, $_POST['expiry']);
		// $date= mysqli_real_escape_string($connection, $_POST['date']);


		$getbookItems = "SELECT * FROM `cart` AS c INNER JOIN `add-books` AS b ON c.book_id = b.book_id WHERE c.user_id = $userid ORDER BY c.cart_id DESC";
		$getbookItems_run = mysqli_query($connection, $getbookItems) or die("Failed to fetch cart items");
		
			if(mysqli_num_rows($getbookItems_run) > 0){
		
		
				
				?>
				<tbody>
				<?php
				

				$cart_products = []; 	
		while($bookItem=mysqli_fetch_assoc($getbookItems_run)){
			
		   
			
			$cart_products[] = $bookItem['book_title'] . ' (' . $bookItem['cart_qty'] . ') (' . $bookItem['cart_format'].')';
		}
			 $total_products = implode(', ',$cart_products);
	

	$checkoutlist=" INSERT INTO `orderlist`( `username`, `userid`, `email`, `address`, `city`, `country`, `zipcode`, `phone`,`total_products`,`total`) VALUES ('$username', '$userid','$email','$address','$city','$country','$zipcode','$phone','$total_products','$subtotals');";
	$res=mysqli_query($connection,$checkoutlist) or die("failed");

		}
	if($res){
// $getinsertedorder=mysqli_insert_id($connection);
	$order_id=mysqli_insert_id($connection);
		$payment="INSERT INTO `billing`( `cardholder`, `cardno`, `expiry`, `cvc`, `userid`, `order_id`,`total_amount`) VALUES ('$cardholder','$cardno','$expiry','$cvc','$userid','$order_id','$subtotals');";
			$billing=mysqli_query($connection,$payment) or die("failed");
if($billing){
	$payment_id=mysqli_insert_id($connection);
	$_SESSION['order_id']=$order_id;
	$_SESSION['payment_id']=$payment_id;
	echo "<script>alert('Your order has been placed.!..!.')
	window.location.href='orders.php';
    </script>;";

}else{
	echo "<script>alert('Something went wrong.!')  </script>;";
}}else{
	echo "<script>alert('Something went wrong.!.')  </script>;";
}
	}
	
	
	?>
	<body>
		
<br><br><br><br>
	

		<!-- BREADCRUMB -->
	
		<div id="breadcrumb" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<h3 class="breadcrumb-header">Checkout</h3>

					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /BREADCRUMB -->

		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">

					<div class="col-md-7">
						<!-- Billing Details -->
						<div class="billing-details">
						<form action="" method="post" id="billingForm" onsubmit="return validateBillingForm();">
    <div class="section-title">
        <h3 class="title">Billing address</h3>
    </div>
    
    <div class="form-group">
        <input class="input" type="text" name="username"  placeholder="First Name">
        <p class="error-message" style="color: red; display: none;"></p>
    </div>
    <div class="form-group">
        <input class="input" type="email" name="email"  placeholder="Email">
        <p class="error-message" style="color: red; display: none;"></p>
    </div>
    <div class="form-group">
        <input class="input" type="text" name="address"  placeholder="Address">
        <p class="error-message" style="color: red; display: none;"></p>
    </div>
    <div class="form-group">
        <input class="input" type="text" name="province"  placeholder="e.g: Sindh">
        <p class="error-message" style="color: red; display: none;"></p>
    </div>
    <div class="form-group">
        <input class="input" type="text" name="country"  placeholder="Country">
        <p class="error-message" style="color: red; display: none;"></p>
    </div>
    <div class="form-group">
        <input class="input" type="text" name="zipcode" placeholder="ZIP Code" minlength="4" maxlength="20" >
        <p class="error-message" style="color: red; display: none;"></p>
    </div>
    <div class="form-group">
        <input class="input" type="tel" name="phone" placeholder="Telephone" maxlength="11" >
        <p class="error-message" style="color: red; display: none;"></p>
    </div>

    <div class="section-title">
        <h3 class="title">Billing Details</h3>
    </div>
    <div class="form-group">
        <input class="input" type="text" name="carholder"  placeholder="Cardholder">
        <p class="error-message" style="color: red; display: none;"></p>
    </div>
    
    <div class="form-group">
        <input class="input" type="number" name="cardno"  placeholder="Card Number" minlength="16" maxlength="16">
        <p class="error-message" style="color: red; display: none;"></p>
    </div>
    <div class="form-group">
        <input class="input" type="date" name="expiry"  placeholder="Expiry Date">
        <p class="error-message" style="color: red; display: none;"></p>
    </div>
    <div class="form-group">
        <input class="input" type="number" name="cvc"  placeholder="CVC">
        <p class="error-message" style="color: red; display: none;"></p>
    </div>
    
    <div class="order-details">
        <input type="submit" name="place" class="primary-btn order-submit" value="Place Order">
    </div>
</form>
						</div>

						<script>
function validateBillingForm() {
    const form = document.getElementById('billingForm');
    const username = form.username.value.trim();
    const email = form.email.value.trim();
    const address = form.address.value.trim();
    const province = form.province.value.trim();
    const country = form.country.value.trim();
    const zipcode = form.zipcode.value.trim();
    const phone = form.phone.value.trim();
    const carholder = form.carholder.value.trim();
    const cardno = form.cardno.value.trim();
    const expiry = form.expiry.value.trim();
    const cvc = form.cvc.value.trim();
    
    const errorMessages = document.querySelectorAll('.error-message');
    
    // Clear previous error messages
    errorMessages.forEach(msg => msg.style.display = 'none');

    let isValid = true;

    // Validate fields
    if (!username) {
        form.username.nextElementSibling.innerText = 'Please enter your first name.';
        form.username.nextElementSibling.style.display = 'block';
        isValid = false;
    }

    if (!email) {
        form.email.nextElementSibling.innerText = 'Please enter your email.';
        form.email.nextElementSibling.style.display = 'block';
        isValid = false;
    } else {
        const emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        if (!emailPattern.test(email)) {
            form.email.nextElementSibling.innerText = 'Please enter a valid email address.';
            form.email.nextElementSibling.style.display = 'block';
            isValid = false;
        }
    }

    if (!address) {
        form.address.nextElementSibling.innerText = 'Please enter your address.';
        form.address.nextElementSibling.style.display = 'block';
        isValid = false;
    }

    if (!province) {
        form.province.nextElementSibling.innerText = 'Please enter your province.';
        form.province.nextElementSibling.style.display = 'block';
        isValid = false;
    }

    if (!country) {
        form.country.nextElementSibling.innerText = 'Please enter your country.';
        form.country.nextElementSibling.style.display = 'block';
        isValid = false;
    }

    if (!zipcode) {
        form.zipcode.nextElementSibling.innerText = 'Please enter your ZIP code.';
        form.zipcode.nextElementSibling.style.display = 'block';
        isValid = false;
    }

    if (!phone) {
        form.phone.nextElementSibling.innerText = 'Please enter your telephone number.';
        form.phone.nextElementSibling.style.display = 'block';
        isValid = false;
    }

    if (!carholder) {
        form.carholder.nextElementSibling.innerText = 'Please enter the cardholder name.';
        form.carholder.nextElementSibling.style.display = 'block';
        isValid = false;
    }

    if (!cardno || cardno.length !== 16) {
        form.cardno.nextElementSibling.innerText = 'Please enter a valid 16-digit card number.';
        form.cardno.nextElementSibling.style.display = 'block';
        isValid = false;
    }

    if (!expiry) {
        form.expiry.nextElementSibling.innerText = 'Please enter the expiry date.';
        form.expiry.nextElementSibling.style.display = 'block';
        isValid = false;
    }

    if (!cvc) {
        form.cvc.nextElementSibling.innerText = 'Please enter the CVC.';
        form.cvc.nextElementSibling.style.display = 'block';
        isValid = false;
    }

    return isValid; // Submit the form if valid
}
</script>


						<?php
 }else{

 echo("<script>window.location.href=signup.php</script>"); 
}

?>
						
						<!-- /Shiping Details -->

						<!-- Order notes -->
						<div class="order-notes">
							<textarea class="input" placeholder="Order Notes"></textarea>
						</div>
						<!-- /Order notes -->
					</div>

					<!-- Order Details -->
					<div class="col-md-5 order-details">
						<div class="section-title text-center">
							<h3 class="title">Your Order</h3>
						</div>
						<div class="order-summary">
							<div class="order-col">
								<div><strong>PRODUCT</strong></div>
								<div><strong>TOTAL</strong></div>
							</div>
							<div class="order-products">
								<?php
								
								$userid=$_SESSION['userid'];
$getbookItems = "SELECT * FROM `cart` AS c INNER JOIN `add-books` AS b ON c.book_id = b.book_id WHERE c.user_id = $userid ORDER BY c.cart_id DESC";
$getbookItems_run = mysqli_query($connection, $getbookItems) or die("Failed to fetch cart items");

    if(mysqli_num_rows($getbookItems_run) > 0){


		
        ?>
        <tbody>
        <?php
        $i=1;

		// $subtotal=$_SESSION['total'];
       
        while($bookItem=mysqli_fetch_assoc($getbookItems_run)){
        // $id=$bookItem['book_id'];
       
		
		$cart_products[] = '';

         $cart_products[] = $bookItem['book_title'].' ('.$bookItem['cart_qty'].') ';
         $total_products = implode(', ',$cart_products);

        ?>
								
								<div class="order-col">
	<h6 class="order-title"><?=$bookItem['book_title']?></h6>
	<p class="order-category">From Category: <?=$bookItem['category']?></p>
	<p class="order-description"><?=$bookItem['book_discription']?></p>
	<p class="order-author">Author: <?=$bookItem['author']?></p>
	<img class="order-image" style="height:200px; width:200px;" src="adminpanel/books-images/<?=$bookItem['book_img']?>" alt="<?=$bookItem['book_title']?>" />
	<p class="order-price">Price: $<?=$bookItem['book_price']?>/-</p>
	<p class="order-price">Quantity:(<?=$bookItem['cart_qty']?>)</p>
	<p class="order-status">Status: <?=$bookItem['book_status']?></p>
</div>
								<?php
								
		}}else{
			?>
								
								
			<div class="order-col">
				<div>Nothing to show</div>
				
			</div>
			<?php
		}

								
								?>
							</div>
							<div class="order-col">
								<div>Shiping</div>
								<div><strong>FREE</strong></div>
							</div>
							<div class="order-col">
								<div><strong>TOTAL</strong></div>
								<div><strong class="order-total">$<?=$subtotals?></strong></div>
							</div>
						</div>
						
						<div class="input-checkbox">
							<input type="checkbox" id="terms">
							<label for="terms">
								<span></span>
								I've read and accept the <a href="termsofservice.php">terms & conditions</a>
							</label>
						</div>
					</div>
					<!-- /Order Details -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

		<!-- NEWSLETTER -->
		<div id="newsletter" class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<div class="col-md-12">
						<div class="newsletter">
							<p>Sign Up for the <strong>NEWSLETTER</strong></p>
							<form>
								<input class="input" type="email" placeholder="Enter Your Email">
								<button class="newsletter-btn"><i class="fa fa-envelope"></i> Subscribe</button>
							</form>
							<ul class="newsletter-follow">
								<li>
									<a href="#"><i class="fa fa-facebook"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-twitter"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-instagram"></i></a>
								</li>
								<li>
									<a href="#"><i class="fa fa-pinterest"></i></a>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /NEWSLETTER -->

		<!-- FOOTER -->
	
        <?php
  include('footer.php');
  ?>
    <!--================ End footer Area  =================-->

    