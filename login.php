
<?php
          session_start();
  if(isset($_SESSION['useremail'])){
    header('location:index.php');
  }

  include('header.php');
  include('config.php');


 
  if(isset($_POST['login'])){
    $log_email = $_POST['email'];
    $log_password = $_POST['password'];
  
    $verify = "SELECT * from `users` where email = '$log_email'";
    $connect_login = mysqli_query($connection , $verify );
  
    if(mysqli_num_rows($connect_login) > 0){
      $row = mysqli_fetch_assoc($connect_login);
      $db_pass=  $row['password'];
      $pass_decode = password_verify($log_password, $db_pass);
      if($pass_decode){
        echo'<script> alert("login successfull")
        window.location.href="index.php";
        </script>';      
        
        $_SESSION['userid'] = $row['id'];
        $_SESSION['useremail'] = $row['email'];
        $_SESSION['userfirstname'] = $row['firstname'];
        $_SESSION['userlastname'] = $row['lastname'];
        
        
    }
    else{
      echo'<script> alert(" invalid password")
      </script>'; 
    }
  
  }
  else{
    echo'<script> alert(" invalid email")
      </script>'; 
  }
  }

  ?>

 


  <!-- start login form -->

  <br>
  <br>
  <br>
  <br>
<section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img style='height:450px; width:500px'  src="./img/login.jpg"
          class="img-fluid" alt="Sample image">
      </div>
      <div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        

      <form class="user" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
           
            <div class="form-group">
                <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                    placeholder="Email Address" name="email" required>
            </div>
            <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="password" class="form-control form-control-user"
                        id="exampleInputPassword" placeholder="Password" name="password" required>
                </div>
              
            </div>
           
            <input type="submit" class="btn btn-warning btn-user btn-block" value="Login" name="login" >
            <hr>
                          
        </form>

          <div class="d-flex justify-content-between align-items-center">
            <!-- Checkbox -->
            <div class="form-check mb-0">
              <input class="form-check-input me-2" type="checkbox" value="" id="form2Example3" />
              <label class="form-check-label" for="form2Example3">
                Remember me
              </label>
            </div>
            <a href="#!" class="link-danger">Forgot password?</a>
          </div>

          <div class="text-center text-lg-start mt-4 pt-2">
            <p class="small fw-bold mt-2 pt-1 mb-0">Don't have an account? <a href="./register.php"
                class="link-success">Register</a></p>
          </div>

        </form>
      </div>
    </div>
  </div>
  
</section>
  <!-- end login form -->

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