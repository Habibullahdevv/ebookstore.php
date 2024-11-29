
  <!--================ Start Header Menu Area =================-->
  <?php
 session_start();
  require('header.php');
if(!isset($_SESSION['useremail'])){
header('location:login.php');

}   
  ?>
  
  <!--================ End Header Menu Area =================-->

  <!--================ Start Home Banner Area =================-->
  <section class="home_banner_area">
   
              <div>
                <?php 
                if(!isset($_SESSION['useremail'])){

                ?>
                <a href="register.php" class="primary-btn2 mb-3 mb-sm-0">Register Now</a>
                <a href="login.php" class="primary-btn ml-sm-3 ml-0">Log in</a>
                <?php 
                }else{

                
                ?>
             
  </section>
  <!--================ End Home Banner Area =================-->

  <!--================ Start Feature Area =================-->
  <section class="feature_area section_gap_top">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="main_title">
            <h2 class="mb-3">Our features</h2>
            <p>
            Unlocking the world of words.
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-md-6">
          <div class="single_feature">
            <div  class="icon"><i class="fa-sharp fa-solid fa-file-pdf fa-2xl"></i></div>
            <div class="desc">
              <h4 class="mt-3 mb-2">PDF Files</h4>
              <p>
                we provide our pdf books feature for you.
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="single_feature">
            <div class="icon"><i class="fa-sharp fa-solid fa-book fa-2xl"></i></div>
            <div class="desc">
              <h4 class="mt-3 mb-2">Hard copy</h4>
              <p>
              we provide our hard copy books feature for you.
              </p>
            </div>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="single_feature">
            <div class="icon"><i class="fa-sharp fa-solid fa-compact-disc fa-2xl"></i></div>
            <div class="desc">
              <h4 class="mt-3 mb-2">CDs</h4>
              <p>
              we provide our CD books feature for you.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End Feature Area =================-->
  <!-- promotion -->
  <div class="testimonial_area section_gap">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-5">
            <div class="main_title">
              <h2 class="mb-3">Promotions</h2>
              <img height="60px" width="300px" src="./img/users/rating.png" alt="">
            </div>
          </div>
        </div>
        <br>
        <br>
        <br>
  <!-- promotion -->

  <!--================ Start Popular Courses Area =================-->
  <div class="popular_courses">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="main_title">
            <h2 class="mb-3">New Release Books</h2>
            <p>
              you may see our new books here.
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <!-- single course -->
        <div class="col-lg-12">
          <div class="owl-carousel active_course">
            <div class="single_course">
              <div class="course_head">
                <img style="height: 400px; " class="img-fluid" src="img/t3.jpg" alt="" />
              </div>
              <div class="course_content">
                <span class="price">$25</span>
                <!-- <span class="tag mb-4 d-inline-block">design</span> -->
                <h4 class="mb-3">
                  <a href="books.php"> DRACULA</a>
                </h4>
                <p>
                Dracula is a classic Gothic horror novel written by Bram Stoker, first published in 1897. The novel tells the story of Count Dracula, a vampire from Transylvania, and the group of individuals who come together to thwart his evil plans.
                </p>
                <div
                  class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4">
                  <div class="authr_meta">
                    
                  </div>
               
                </div>
              </div>
            </div>

            <div class="single_course">
              <div class="course_head">
                <img  style="height: 400px; "class="img-fluid" src="img/gk2.jpg" alt="" />
              </div>
              <div class="course_content">
                <span class="price">$25</span>
                <!-- <span class="tag mb-4 d-inline-block">design</span> -->
                <h4 class="mb-3">
                  <a href="books.php">The Greatest General Knowledge Quiz Book</a>
                </h4>
                <p>
                The Greatest General Knowledge Quiz Book" is a popular type of book that is designed to challenge and entertain readers with a wide range of trivia questions and answers.
                </p>
                <div
                  class="course_meta d-flex justify-content-lg-between align-items-lg-center flex-lg-row flex-column mt-4">
                  <div class="authr_meta">
                   
                  </div>
                  
                </div>
              </div>
            </div>

            <div class="single_course">
              <div class="course_head">
                <img style="height: 400px; " class="img-fluid" src="img/t4.jpg" alt="" />
              </div>
              <div class="course_content">
                <span class="price">$25</span>
                <!-- <span class="tag mb-4 d-inline-block">design</span> -->
                <h4 class="mb-3">
                  <a href="books.php">The Count of Monte Cristo</a>
                </h4>
                <p>
                The Count of Monte Cristo is a classic adventure novel written by Alexandre Dumas and first published in 1844.This sweeping tale of revenge and redemption is set in early 19th-century France and follows the life of Edmond Dantès
                </p>
               
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!--================ End Popular Courses Area =================-->



  <!--================ Start Trainers Area =================-->
  <section class="trainer_area section_gap_top">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="main_title">
            <h2 class="mb-3">Winners</h2>
            <p>
              Here is our previous competition winners!
            </p>
          </div>
        </div>
      </div>
      <div class="row justify-content-center d-flex align-items-center">
        <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
          <div class="thumb d-flex justify-content-sm-center">
            <img class="img-fluid" src="img/trainer/t1.jpg" alt="" />
          </div>
          <div class="meta-text text-sm-center">
            <h4>Mated Nithan</h4>
            <p class="designation">Winner</p>
            <div class="mb-4">
              <p>
               Here is our essay writing competition winner who completed the essay in 2hrs.
              </p>
            </div>
            
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
          <div class="thumb d-flex justify-content-sm-center">
            <img class="img-fluid" src="img/trainer/t2.jpg" alt="" />
          </div>
          <div class="meta-text text-sm-center">
            <h4>David Cameron</h4>
            <p class="designation">Winner</p>
            <div class="mb-4">
              <p>
                Here is our quiz competion winner with the high score of 1900.
              </p>
            </div>
            
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
          <div class="thumb d-flex justify-content-sm-center">
            <img class="img-fluid" src="img/trainer/t3.jpg" alt="" />
          </div>
          <div class="meta-text text-sm-center">
            <h4>Jain Redmel</h4>
            <p class="designation">Winner</p>
            <div class="mb-4">
              <p>
                Here is our essay writing competition winner who completed the essay in 1hrs.
              </p>
            </div>
           
          </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12 single-trainer">
          <div class="thumb d-flex justify-content-sm-center">
            <img class="img-fluid" src="img/trainer/t4.jpg" alt="" />
          </div>
          <div class="meta-text text-sm-center">
            <h4>Nathan Macken</h4>
            <p class="designation">Winner</p>
            <div class="mb-4">
              <p>
               Here is another quiz competion winner with the high score of 1800.
              </p>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--================ End Trainers Area =================-->

  <!--================ Start Events Area =================-->
  <div class="events_area">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="main_title">
            <h2 class="mb-3 text-white">Upcoming Competition</h2>
            <p>
              
            lets test your skills for wriiting story in our competition.
            </p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-6 col-md-6">
          <div class="single_event position-relative">
            <div class="event_thumb">
              <img src="img/event/e1.jpg" alt="" />
            </div>
            <div class="event_details">
              <div class="d-flex mb-4">
                <div class="date"><span>25</span> Nov</div>

                <div class="time-location">
                  <p>
                     12:00 AM - 12:30 AM
                  </p>
                  <p>
                    <h4>STORY WRITTING</h4>
                  </p>
                </div>
              </div>
              <p>
              Quiz competitions are a celebration of human curiosity and the pursuit of knowledge.
              </p>
              <a href="story_comp.php" class="primary-btn rounded-0 mt-3">View Details</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-6">
          <div class="single_event position-relative">
            <div class="event_thumb">
              <img src="img/event/e2.jpg" alt="" />
            </div>
            <div class="event_details">
              <div class="d-flex mb-4">
                <div class="date"><span>15</span> Nov</div>

                <div class="time-location">
                  <p>
                   12:00 AM - 12:30 AM
                  </p>
                  <p>
                    <h4>ESSAY WRITTING</h4>
                  </p>
                </div>
              </div>
              <p>
              You have the opportunity to illuminate the world with your thoughts.
              </p>
              <a href="essay_comp.php" class="primary-btn rounded-0 mt-3">View Details</a>
            </div>
          </div>
        </div>

        
      </div>
    </div>
  </div>
  <!--================ End Events Area =================-->

  <!--================ Start Testimonial Area =================-->
  <div class="testimonial_area section_gap">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="main_title">
            <h2 class="mb-3">Our Dealers</h2>
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
                  <h4>Tim Hoffmann </h4>
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
</div>
  <!--================ End Testimonial Area =================-->

  <!--================ Start footer Area  =================-->
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
</div>

</body>
</html>
<?php 
}
?>
