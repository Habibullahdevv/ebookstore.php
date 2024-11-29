
<?php
  include('header2.php');
 include('config.php');
 if(isset($_POST['log'])){
 $log_email=$_POST['log_email'];
 $log_pass=$_POST['log_pass'];
 $verify = "SELECT * from `reg_mem` where email='$log_email'";
    $con_log = mysqli_query($connection, $verify);
    if(mysqli_num_rows($con_log) > 0){
      $row=mysqli_fetch_assoc($con_log);
      $db_pass=$row['password'];
      $pass_dec=password_verify($log_pass,$db_pass);
      if($pass_dec){
        echo"<script> alert('Congracts for being our member');
     
      window.location.href='index.php';
      </script>";
      }
      else{
        echo'<script> alert("Invalid email and pass");
        </script>';
      }
 }
 }
  ?>

   <!-- start membership login form -->
<br>
  <br>
  <br>
  <br>
  
  <br>
  <br>
  <section class="vh-100">
  <div class="container-fluid h-custom">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-md-9 col-lg-6 col-xl-5">
        <img style='height:490px; width:510px;'  src="./img/member_login.png"
          class="img-fluid" alt="Sample image">
      </div>
<div class="col-md-8 col-lg-6 col-xl-4 offset-xl-1">
        

        <form class="user" action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
             <h2>Welcome to Login page</h2>
             <br>
             <br>
              <div class="form-group">
                  <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                      placeholder="Email Address" name="log_email" required>
              </div>
              <div class="form-group">
                 
                  <input type="password" class="form-control form-control-user" id="exampleInputEmail"
                      placeholder="Password" name="log_pass" required>
                  </div>
                  <input type="submit" class="btn btn-warning btn-user btn-block" value="create membership" name="log" >
            <hr>
                  
                  
                  <div class="text-center text-lg-start mt-4 pt-2">
                    
            <p class="small fw-bold mt-2 pt-1 mb-0">If you dont have an account? <a href="./member_create.php"
                class="link-success">Click here for Register</a></p>
          </div>
          
              
                            
          </form>
      
  </div>
</section>
          
<!-- end membership login form -->

<br>
  <br>
  <br>
  <br>
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