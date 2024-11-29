<?php 
include("config.php");
if(isset($_SESSION['userid'])){
  $userid = $_SESSION['userid'];
}else{
  $userid = '';
}
$total =mysqli_query($connection, "SELECT user_id, count(cart_id) as totalitem  from cart where user_id = '$userid'");
if(mysqli_num_rows($total) > 0){
  $cart_items = mysqli_fetch_array($total);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="img/favi2.png" type="image/png" />
  <title>Edustage Education</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="css/bootstrap.css" />
  <link rel="stylesheet" href="css/flaticon.css" />
  <link rel="stylesheet" href="css/themify-icons.css" />
  <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
  <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
  <!-- font awesome cdn -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- our css -->
  <link rel="stylesheet" href="book.css">
  <!-- main css -->
  <link rel="stylesheet" href="css/style.css" />
  <link rel="stylesheet" href="path/to/fontawesome/css/all.min.css">

  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</head>
  <!-- header section -->
  <header class="header_area">
    <div class="main_menu">
      
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <!-- Brand and toggle get grouped for better mobile display -->
          <a class="navbar-brand logo_h" href="index.php"><img height="75px" src="img/logo.png" alt="" /></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span> <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto">
<?php 
if(isset($_SESSION["useremail"])){

?>
              <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="about-us.php">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="books.php">Books</a>
              </li>
             
              <li class="nav-item">
                <a class="nav-link" href="contact.php">Contact</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="member_create.php">Membership</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="orders.php">My orders</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="cartdetails.php"><i class="fa-sharp fa-solid fa-cart-shopping"></i></a>
                <sup class="badge bg-warning" ><?php echo $cart_items['totalitem'] ?></sup></a>
              </li>
              
              <li class="nav-item">
                <a class="nav-link" href="logout.php">Logout</a>
              </li>


              <?php 
              }
              }else{
                

              ?>
              <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
              </li>
              <?php 
              }
              ?>             
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>

<body>