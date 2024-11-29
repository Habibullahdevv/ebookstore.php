 <?php
  session_start();
  include('header.php');
  include('config.php');
  if(isset($_SESSION['useremail'])){
echo '<script>
window.location.href="index.php"
</script>';  }
  // include('mailer.php');

  if(isset($_POST['register'])){
    $fname = $_POST['FirstName'];
    $lname = $_POST['LastName'];
    $user_email = $_POST['email'];
    $Password = $_POST['password'];
    $RPassword = $_POST['repeatPassword'];

    if($Password == $RPassword){
    $hashPass = password_hash($Password, PASSWORD_BCRYPT);

        $check_email = "SELECT * from `users` where email='$user_email'";
        $run_email = mysqli_query($connection, $check_email);
        if(mysqli_num_rows($run_email) > 0){
          echo'<script> alert(" email already exist")
          </script>';         }else{
            $insert = "INSERT INTO `users` (`firstname`, `lastname`, `email`, `password`) VALUES ('$fname', '$lname', '$user_email','$hashPass')";
        $connect_insert = mysqli_query($connection, $insert);
        
        if($connect_insert){
          session_start();
          $_SESSION['useremail'] = $row['email'];
          $_SESSION['userfirstname'] = $row['firstname'];
          $_SESSION['userlastname'] = $row['lastname'];
            echo "<script>alert('registration successful');
            window.location.href='login.php'
            </script>";
        }else{
            echo "registration failed";
        }
        
        }
    }else{
        echo "Password not matched";
    }

}
  
  ?>
  <!-- start user registeration form -->
  <br>
  <br>
  <br>
  <br>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img src="./img/register.JPG"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
      <form class="user" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                <input type="text" class="form-control form-control-user" id="exampleFirstName"
                        placeholder="First Name" name="FirstName" required>
                </div>
                <div class="col-sm-6">
                    <input type="text" class="form-control form-control-user" id="exampleLastName"
                        placeholder="Last Name" name="LastName" required>
                 </div>
            </div>
            <div class="form-group">
                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                    placeholder="Email Address" name="email" required pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$|^[a-zA-Z0-9._%+-]+@gmail\.[a-z]{2,}$">
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user"
                        id="exampleInputPassword" placeholder="Password" name="password" required>
                </div>
                <div class="col-sm-6">
                    <input type="password" class="form-control form-control-user"
                        id="exampleRepeatPassword" placeholder="Repeat Password" name="repeatPassword" required>
                </div>
            </div>
            <input type="submit" class="btn btn-warning btn-user btn-block" value="Register" name="register" >
            <hr>
                                
        </form>


        <div class="text-center text-lg-start mt-4 pt-2">
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="./login.php"
                class="link-success">Login here</a></p>
          </div>
          

        </form>
        
      </div>
    </div>
  </div>
  
</section>
  <!-- end registeration form -->

    <!-- start footer -->
<?php
  include('footer.php');
  ?>
    <!-- end footer-->
    
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