<?php
session_start();
include('header.php');
include("config.php");

if(isset($_SESSION['userid'])) {
    $userid = $_SESSION['userid'];
    $total = $_SESSION['total'];
    $_SESSION['total'] = 0; // Setting a default value for total

    if(isset($_POST['place']) && $_SERVER['REQUEST_METHOD']=="POST") {
        $username= mysqli_real_escape_string($connection, $_POST['username']);
        $email= mysqli_real_escape_string($connection, $_POST['email']);
        $address= mysqli_real_escape_string($connection, $_POST['address']);
        $city= mysqli_real_escape_string($connection, $_POST['city']);
        $country= mysqli_real_escape_string($connection, $_POST['country']);
        $zipcode= mysqli_real_escape_string($connection, $_POST['zipcode']);
        $phone= mysqli_real_escape_string($connection, $_POST['phone']);
        $cardholder= mysqli_real_escape_string($connection, $_POST['carholder']);
        $cardno= mysqli_real_escape_string($connection, $_POST['cardno']);
        $cvc= mysqli_real_escape_string($connection, $_POST['cvc']);
        $expiry= mysqli_real_escape_string($connection, $_POST['expiry']);
        
        $checkoutlist = "INSERT INTO `orderlist`( `username`, `userid`, `email`, `address`, `city`, `country`, `zipcode`, `phone`,`total`) VALUES ('$username', '$userid','$email','$address','$city','$country','$zipcode','$phone','$total')";
        $res=mysqli_query($connection,$checkoutlist) or die("Failed");

        if($res) {
            $order_id=mysqli_insert_id($connection);
            $payment="INSERT INTO `billing`( `cardholder`, `cardno`, `expiry`, `cvc`, `userid`, `order_id`,`total_amount`) VALUES ('$cardholder','$cardno','$expiry','$cvc','$userid','$order_id','$total');";
            $billing=mysqli_query($connection,$payment) or die("Failed");

            if($billing) {
                $payment_id=mysqli_insert_id($connection);
                $_SESSION['order_id']=$order_id;
                $_SESSION['payment_id']=$payment_id;
                echo "<script>alert('Payment Success.!..!'); window.location.href='pdf.php';</script>";
            } else {
                echo "<script>alert('Something went wrong.!');</script>";
            }
        } else {
            echo "<script>alert('Something went wrong.!.');</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<?php include('head.php'); ?>
<body>
    <?php include('navbar.php'); ?>

    <!-- BREADCRUMB -->
    <div id="breadcrumb" class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3 class="breadcrumb-header">Checkout</h3>
                </div>
            </div>
        </div>
    </div>
    <!-- /BREADCRUMB -->

    <!-- SECTION -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <!-- Billing Details -->
                    <div class="billing-details">
						<form action="" method="post">
							<div class="section-title">
								<h3 class="title">Billing address</h3>
							</div>
							
							<div class="form-group">
								<input class="input" type="text" name="username" required placeholder="First Name">
							</div>
							<div class="form-group">
								<input class="input" type="email" name="email" required placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="address" required placeholder="Address">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="city" required placeholder="City">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="country" required placeholder="Country">
							</div>
							<div class="form-group">
								<input class="input" type="text" name="zipcode" placeholder="ZIP Code"
								min="4" max="20"  required>
							</div>
							<div class="form-group">
								<input class="input" type="tel" name="phone"  placeholder="Telephone"
								maxlength="16" required>
							</div>

							<div class="section-title">
								<h3 class="title">Billing Details</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" name="carholder" required placeholder="carholder" required>
							</div>
							
							<div class="form-group">
								<input class="input" type="number" name="cardno" required placeholder="cardno" minlength="16" maxlength="16" required>
							</div>
							<div class="form-group">
								<input class="input" type="date" name="expiry" required placeholder="expiry"  required>
							</div>
							<div class="form-group">
								<input class="input" type="number" name="cvc" required placeholder="cvc"  required>
							</div>
							
							<div class=" order-details">
							<a><input type="submit" name="place" class="primary-btn order-submit" value="Place Order"></a>		
						</div>			
							</form>
						</div>
                    <!-- /Billing Details -->
                </div>
            </div>
            <div class="row">
                <div class="col-md-7">
                    <!-- Billing Details Form -->
                    <div class="billing-details">
                        <!-- Form content -->
                    </div>
                    <!-- /Billing Details Form -->
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
                        <!-- Order summary content -->
                    </div>
                    <div class="input-checkbox">
                        <input type="checkbox" id="terms">
                        <label for="terms">
                            <span></span>
                            I've read and accept the <a href="#">terms & conditions</a>
                        </label>
                    </div>
                </div>
                <!-- /Order Details -->
            </div>
        </div>
    </div>
    <!-- /SECTION -->

    <!-- NEWSLETTER -->
    <div id="newsletter" class="section">
        <div class="container">
            <!-- Newsletter content -->
        </div>
    </div>
    <!-- /NEWSLETTER -->

    <?php include('footer.php'); ?>
</body>
</html>
