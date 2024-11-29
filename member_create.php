<?php
  include('header2.php');
  include('config.php');
  if(isset($_POST['member'])){
    $fname =mysqli_real_escape_string($connection, $_POST['FirstName']);
    $lname = mysqli_real_escape_string($connection, $_POST['LastName']);
    $email =mysqli_real_escape_string($connection, $_POST['email']);
    $pass = mysqli_real_escape_string($connection, $_POST['password']);
    $pass_hash=password_hash($pass,PASSWORD_BCRYPT);
    $fetch = "SELECT * from `reg_mem` where email='$email'";
    $check = mysqli_query($connection, $fetch);
    if(mysqli_num_rows($check) > 0){
      echo'<script> alert(" email already exist")
      </script>'; 
    }
    else{
      $query="INSERT INTO `reg_mem` (`firstname`, `lastname`, `email`, `password`) VALUES ('$fname', '$lname', '$email', '$pass_hash')";
      $con=mysqli_query($connection,$query);
      if($con){
        echo"<script> alert('Membership registeration successful');
     
      window.location.href='membership.php';
      </script>";
      }
    }
  }
  ?>


  
  <!-- start membership registeration form -->

  <br>
  <br>
  <br>
  <br>
  <br>
  <div class="container">
    <h3>Membership</h3>
    <p>Become a member of PDFBooksWorld and access to our entire library
     of books with unlimited downloads.  Our library contains thousands of
     eBooks of professionally created eBook files with features including ToC,
     Internal Reference Links & Illustrative Images. </p>
     <ul>
        <li>Read on PC, Kindle, eReader & Mobile:  PDF, Kindle & ePUB formats.</li>
        <li>Table Of Contents:  Navigate easily between chapters with ToC in top of book.</li>
        <li>Illustrations: Many books with Illustrative images optimised for all screen sizes.</li>
     </ul>
     <h3>Subscribe</h3>
    <p>Subscribe to PDFBooksWorld membership and download unlimited eBooks.</p>
     <ul>
        <li>Instant Access to library on subscription
        </li>
        <li>Simple One-Click Downloads</li>
        
        <li>No ads shown for members</li>
     </ul>
     <section class="feature_area section_gap_top">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="main_title">
            <h3 class="mb-3">We provide Memberships</h3>
            
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="single_feature">
            <div class="desc">
            <center><img src="./img/basic_mem.png"
          class="img-fluid" alt="Sample image"  width="150px"></center>
             <center> <h3 class="mt-3 mb-2">Basic</h3></center>
              <p>
              On basic membership we give you 5% discount
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="single_feature">
            <div class="desc">
            <center><img src="./img/prem_mem.webp"
          class="img-fluid" alt="Sample image"  width="130px"></center>
          <center> <h3 class="mt-3 mb-2">Premium</h3></center>
              <p>
              On premium membership we give you 10% discount
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="single_feature">
            <div class="desc">
            <center><img src="./img/adv_mem.jpg"
          class="img-fluid" alt="Sample image"  width="140px"></center>
          <center> <h3 class="mt-3 mb-2">Advance</h3></center>
              <p>
              On advance membership we give you 15% discount
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  </div>
 
  <br>
  <br>
  <br>
  <br>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="./img/membership.png" style='height:490px; width:520px;'
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">

      <form class="user" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" id="registrationForm" onsubmit="return validateRegistrationForm();">
    <h2>Welcome to Register page</h2>
    <br><br>
    
    <div class="form-group row">
        <div class="col-sm-6 mb-3 mb-sm-0">
            <input type="text" class="form-control form-control-user" id="exampleFirstName"
                   placeholder="First Name" name="FirstName" >
            <p class="error-message" style="color: red; display: none;"></p>
        </div>
        <div class="col-sm-6">
            <input type="text" class="form-control form-control-user" id="exampleLastName"
                   placeholder="Last Name" name="LastName" >
            <p class="error-message" style="color: red; display: none;"></p>
        </div>
    </div>

    <div class="form-group">
        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
               placeholder="Email Address" name="email"  
               pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$|^[a-zA-Z0-9._%+-]+@gmail\.[a-z]{2,}$">
        <p class="error-message" style="color: red; display: none;"></p>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <select class="form-select" name="membership" >
                <option selected disabled>Choose membership</option>
                <option value="1">Basic 5% discount</option>
                <option value="2">Premium 10% discount</option>
                <option value="3">Advance 15% discount</option>
            </select>
            <p class="error-message" style="color: red; display: none;"></p>
        </div>
    </div>

    <div class="form-group row">
        <div class="col-sm-12 mb-3 mb-sm-0">
            <input type="password" class="form-control form-control-user"
                   id="exampleInputPassword" placeholder="Password" name="password" >
            <p class="error-message" style="color: red; display: none;"></p>
        </div>
    </div>

    <input type="submit" class="btn btn-warning btn-user btn-block" value="Create Membership" name="member">
    <hr>
    <div class="text-center text-lg-start mt-4 pt-2">
        <p class="small fw-bold mt-2 pt-1 mb-0">If you are already a member? <a href="./membership.php" class="link-success">Login here</a></p>
    </div>
</form>

<script>
function validateRegistrationForm() {
    const form = document.getElementById('registrationForm');
    const firstName = form.FirstName.value.trim();
    const lastName = form.LastName.value.trim();
    const email = form.email.value.trim();
    const membership = form.membership.value;
    const password = form.password.value.trim();
    const errorMessages = document.querySelectorAll('.error-message');

    // Clear previous error messages
    errorMessages.forEach(msg => msg.style.display = 'none');

    let isValid = true;

    // Validate First Name
    if (!firstName) {
        form.FirstName.nextElementSibling.innerText = 'Please enter your first name.';
        form.FirstName.nextElementSibling.style.display = 'block';
        isValid = false;
    }

    // Validate Last Name
    if (!lastName) {
        form.LastName.nextElementSibling.innerText = 'Please enter your last name.';
        form.LastName.nextElementSibling.style.display = 'block';
        isValid = false;
    }

    // Validate Email
    if (!email) {
        form.email.nextElementSibling.innerText = 'Please enter your email.';
        form.email.nextElementSibling.style.display = 'block';
        isValid = false;
    } else {
        const emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$|^[a-zA-Z0-9._%+-]+@gmail\.[a-z]{2,}$/;
        if (!emailPattern.test(email)) {
            form.email.nextElementSibling.innerText = 'Please enter a valid Gmail address.';
            form.email.nextElementSibling.style.display = 'block';
            isValid = false;
        }
    }

    // Validate Membership Selection
    if (!membership) {
        form.membership.nextElementSibling.innerText = 'Please choose a membership option.';
        form.membership.nextElementSibling.style.display = 'block';
        isValid = false;
    }

    // Validate Password
    if (!password) {
        form.password.nextElementSibling.innerText = 'Please enter your password.';
        form.password.nextElementSibling.style.display = 'block';
        isValid = false;
    }

    return isValid; // Submit the form if valid
}
</script>


      
        
      </div>
    </div>
  </div>
  
</section>
  <!-- end membership registeration form -->

    <!-- start footer -->
<?php
  include('footer.php');
  ?>
  <!-- end footer -->

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