

<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link rel="icon" href="./img/book_logo.png" type="image/png" />
    <title>Contact</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css" />
    <link rel="stylesheet" href="css/flaticon.css" />
    <link rel="stylesheet" href="css/themify-icons.css" />
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css" />
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css" />
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css" />
  </head>

  <body>
    <!--================ Start Header Menu Area =================-->
    <?php
  session_start();
  include('header2.php');
  // require('header.php');
  include("config.php");

  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $fname = $_POST['firstname'];
    $lname = $_POST['lastname'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // SQL Insert Query
    $sql = "INSERT INTO `contact` ( `fname`, `lname`, `email`, `msg`) VALUES ( '$fname', '$lname', '$email', '$message')";

    // Execute the query and check for success
    $result = mysqli_query($connection, $sql);

   
}


  ?>
    <!--================ End Header Menu Area =================-->

  

    <!--================ start map =================-->
    <section class="contact_area section_gap">
      <div class="container">
        <div
          id="mapBox"
          class="mapBox"
          data-lat="40.701083"
          data-lon="-74.1522848"
          data-zoom="13"
          data-info="PO Box CT16122 Collins Street West, Victoria 8007, Australia."
          data-mlat="40.701083"
          data-mlon="-74.1522848"
        ></div>
            <!--================ end map =================-->
<br>
        <!--================start Contact with our dealers =================-->
  <div class="testimonial_area section_gap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="main_title">
            <h2 class="mb-3">Contact with Our Dealers</h2>
            <p>
            Dealers are the bridge between desire and possession
            </p>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="testi_slider owl-carousel">
          <div class="testi_item">
            <div class="row">
              <div class="col-lg-4 col-md-6">
                <img height="150px" width="60px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRGa8nbA4_Y8eEKDf7xiwty91QSKdjt77_UwQ&s" alt="" />
              </div>
              <div class="col-lg-8">
                <div class="testi_text">
                  <h4>Tim Hoffmann</h4>
                  <p>
                  Our book dealer is more than just a supplier of books; they are our gateway to knowledge and imagination.
                  </p>
                </div>
              </div>
            </div>
          </div>
       
          <div class="testi_item">
            <div class="row">
              <div class="col-lg-4 col-md-6">
                <img height="150px" width="60px" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQfCRdLQSFIYnGk1ACLxQrA0n41QHAjzDVvIg&s" alt="" />
              </div>
              <div class="col-lg-8">
                <div class="testi_text">
                  <h4>John Dio</h4>
                  <p>
                  Our book dealer is more than just a supplier of books; they are our gateway to knowledge and imagination.
                  </p>
                </div>
              </div>
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>
      <!--================end Contact with our dealers =================-->
<br>
    <!--================start Contact with our dealers form =================-->
<center>
<h1>Fill it</h1>
</center>
<br>
        <div class="row">
          <div class="col-lg-3">
            <div class="contact_info">
              <div class="info_item">
              <i class="fa-solid fa-location-dot"></i>
                <h6>Karachi, Pakistan</h6>
                <p>Aptech North Nazimabad</p>
              </div>
              <div class="info_item">
              <i class="fa-solid fa-phone-volume"></i>
                <h6><a href="#">+92********</a></h6>
                <p>Mon to sun 9am to 9pm</p>
              </div>
              <div class="info_item">
              <i class="fa-solid fa-globe"></i>     
                <h6><a href="#">onlinebookstore@gmail.com</a></h6>
                <p>Send us your query anytime!</p>
              </div>
            </div>
          </div>
      
          <div class="col-lg-9">
          <div class="contact-form">
    
          <form action="" method="POST" id="contactform" onsubmit="return validateForm();">
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <input type="text" class="form-control" name="firstname" placeholder="Your First Name" >
                <p class="error-message" style="color: red; display: none;"></p>
            </div>
            <div class="mb-3">
                <input type="text" class="form-control" name="lastname" placeholder="Your Last Name" >
                <p class="error-message" style="color: red; display: none;"></p>
            </div>
            <div class="mb-3">
                <input type="email" class="form-control" name="email" placeholder="Your Email"
                  pattern="^[a-zA-Z0-9._%+-]+@gmail\.com$|^[a-zA-Z0-9._%+-]+@gmail\.[a-z]{2,}$">
                <p class="error-message" style="color: red; display: none;"></p>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <textarea class="form-control" name="message" placeholder="Your Message" rows="5" ></textarea>
                <p class="error-message" style="color: red; display: none;"></p>
            </div>
        </div>
    </div>
    <button type="submit" class="btn btn-warning" value="submit">Submit</button>
</form>



</div>
      </div>

 <script>
    function validateForm() {
        const form = document.getElementById('contactform');
        const firstName = form.firstname.value.trim();
        const lastName = form.lastname.value.trim();
        const email = form.email.value.trim();
        const message = form.message.value.trim();
        const errorMessages = document.querySelectorAll('.error-message');

        // Clear previous error messages
        errorMessages.forEach(msg => msg.style.display = 'none');

        let isValid = true;

        // Check if fields are empty
        if (!firstName) {
            document.querySelector('input[name="firstname"]').nextElementSibling.innerText = 'Please enter your first name.';
            document.querySelector('input[name="firstname"]').nextElementSibling.style.display = 'block';
            isValid = false;
        }

        if (!lastName) {
            document.querySelector('input[name="lastname"]').nextElementSibling.innerText = 'Please enter your last name.';
            document.querySelector('input[name="lastname"]').nextElementSibling.style.display = 'block';
            isValid = false;
        }

        if (!email) {
            document.querySelector('input[name="email"]').nextElementSibling.innerText = 'Please enter your email.';
            document.querySelector('input[name="email"]').nextElementSibling.style.display = 'block';
            isValid = false;
        } else {
            // Email regex validation
            const emailPattern = /^[a-zA-Z0-9._%+-]+@gmail\.com$|^[a-zA-Z0-9._%+-]+@gmail\.[a-z]{2,}$/;
            if (!emailPattern.test(email)) {
                document.querySelector('input[name="email"]').nextElementSibling.innerText = 'Please enter a valid Gmail address.';
                document.querySelector('input[name="email"]').nextElementSibling.style.display = 'block';
                isValid = false;
            }
        }

        if (!message) {
            document.querySelector('textarea[name="message"]').nextElementSibling.innerText = 'Please enter your message.';
            document.querySelector('textarea[name="message"]').nextElementSibling.style.display = 'block';
            isValid = false;
        }

        // If all validations pass
        if (isValid) {
            alert('Thank you for your message! We will get back to you soon.');
        }

        return isValid; // Submit the form if valid
    }
</script>


    </section>
       <!--================end Contact with our dealers =================-->
    

    <!--================ start footer Area  =================-->
    <?php
  include('footer.php');
  ?>
      <!--================end footer area =================-->

    <!--================End Contact Success and Error message Area =================-->

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/stellar.js"></script>
    <script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
    <script src="vendors/owl-carousel/owl.carousel.min.js"></script>
    <script src="js/owl-carousel-thumb.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/jquery.ajaxchimp.min.js"></script>
    <script src="js/mail-script.js"></script>
    <!--gmaps Js-->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
    <script src="js/gmaps.min.js"></script>
    <script src="js/contact.js"></script>
    <script src="js/theme.js"></script>
  </body>
</html>
