<!--================ start Header Menu Area =================-->

<?php
session_start();
if (!isset($_SESSION['useremail'])) {
	header("location: login.php");
}


include('header2.php');
include('config.php');





?>
<!--================ End Header Menu Area =================-->
<!-- inline css -->
<style>
	.ess {
		color: #000080;
	}
</style>
<br>
<br>
<br>
<br>
  <!--================ start book cart details  =================-->
<section class="ftco-section ftco-cart">
	<div class="container my-5">
		<div class="row justify-content-between">
			<div class="col-md-8 ftco-animate">
				<div class="cart-list">
					
					<table class="table my-4">
						<thead class="thead-primary">
							<tr class="text-center">

								<th>Image</th>
								<th>Product</th>
								<th>Description</th>
								<th>Price</th>
								<th>Quantity</th>
								<th>Format</th>
								<th>Total</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>

							<?php
							$subtotal = 0;

							$current_user_id = $_SESSION['userid'];
							$cart_data = "SELECT * from cart AS c INNER JOIN `users` AS u ON c.user_id = u.id INNER JOIN `add-books` AS P ON p.book_id = c.book_id WHERE c.user_id = '$current_user_id'";
							$result = mysqli_query($connection, $cart_data);
							if (mysqli_num_rows($result) > 0) {

								while ($row = mysqli_fetch_assoc($result)) {

									?>
									<tr class="text-center">
										<!-- <td class="product-remove"><a id="closebtn"><span class="icon-close"></span></a></td> -->
										<input type="hidden" id="cartid" value="<?php echo $row['cart_id'] ?>">
										<td class="image-prod">
											<img src="<?php
											echo 'adminpanel/books-images/' . $row['book_img'] ?>" alt="" height="100px" height="100px">
										</td>

										<td class="product-name">
											<h5>
												<?php
												echo $row['book_title'] ?>
											</h5>
										</td>
										<td>
											<p>
												<?php
    echo substr($row['book_discription'], 0, 70) . '...';
	?>
											</p>

										</td>

										<td class="price">
											<?php
											echo  $row['book_price'] ?>
										</td>

										<td class="qty">
											<?php
											echo $row['cart_qty'] ?>
										</td>
										<td class="format">
											<?php
											echo $row['cart_format'] ?>
										</td>
										<td class="total">
											<?php
											// $total = 0;
											$total1 = (float)$row['cart_qty']  ;

											$total2 = (float)$row['book_price'];

											$total = $total1 * $total2;
											echo "$" . $total;
											$subtotal += $total;

											// echo ("$" . $subtotal);
											
											?>
										</td>

										<td class="action">
											<a href="removecart.php?itemid=<?php echo $row['cart_id'] ?>" class="text-dark"><i
													class="fa-solid fa-trash"></i></a>

										</td>



										<!-- <td class="total">$4.90</td> -->
									</tr><!-- END TR-->
									
									<?php
								}
							}

							?>



						</tbody>
					</table>
					<a href="removecart.php?userid=<?php echo $current_user_id ?>" class="btn btn-danger opacity-0.5">
						Remove cart
					</a>
				</div>
			</div>
			<div class="col col-lg-3 col-md-6 mt-5  cart-wrap ftco-animate">
				<div class="cart-total mb-3">
					<h3>Cart Totals</h3>
					<p class="d-flex justify-content-between">
						<span>Subtotal</span>
						<span>
							<?php
							
							echo "$" . $subtotal; ?>
<?php
$_SESSION['subtotal'] = $subtotal;
?>
</span>
</p>

</div>
<?php if (mysqli_num_rows($result) > 0) { ?>
                    <p class="text-center">
                        <a href="checkout.php" class="btn btn-warning py-3">Proceed to Checkout</a>
                    </p>
                <?php } else { ?>
                    <p class="text-center text-danger">You cannot proceed to checkout because your cart is empty.</p>
                <?php } ?>
</div>
<?php

?>
		</div>
	</div>
	</div>
</section>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
	$(document).ready(function () {
		let closebtn = $('#closebtn');
		let cartid = $('#cartid').val();
		closebtn.click(function () {
			$.ajax({
				url: 'deletecart.php',
				type: 'POST',
				data: {
					cartid: cartid
				},
				success: function (data) {
					if (data == 1) {
						alert('data deleted');

					} else {
						alert('not deleted');

					}
				}
			})
		})

	})

</script>

<!-- end book cart details-->

<!-- ================ start footer Area  ================= -->
<?php
include('footer.php');
?>
<!--================ End footer Area  =================-->

<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="js/owl-carousel-thumb.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="js/mail-script.js"></script>
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="js/gmaps.min.js"></script>
<script src="js/theme.js"></script>


</body>

</html>