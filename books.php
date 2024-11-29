<?php
session_start();
include('config.php');
include('header2.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <link rel="icon" href="img/favicon.png" type="image/png" />
  <title>Courses</title>
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
  
  <?php

  ?>
  

  <!--================ Start show books with categories Area =================-->

  <img height="100%" width="100%" style="padding-top: 5.9%;" src="./img/banner/bkb.png" alt="">
  <div class="popular_courses section_gap_top">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="main_title">
            <h2 class="mb-3">BOOKS</h2>
          </div>
        </div>
        <!-- categories work -->

        <select name="category" id="category">
          <option>select category</option>
          <?php
          $cat = mysqli_query($connection, 'SELECT * from `books_categorey` where `cat_status` = 1');
          if (mysqli_num_rows($cat) > 0) {
            while ($row = mysqli_fetch_assoc($cat)) {
              echo '<option value="' . $row['categorey_name'] . '">' . $row['categorey_name'] . '</option>'
         
         ?>
         
         <?php
            }
          }
          ?>
        </select>
      </div>
      <div class="row">

      </div>
    </div>
  </div>
  



  <?php

  $result = mysqli_query($connection, 'SELECT * from `add-books` as b inner join `books_categorey` as c on b.category = c.cid');
  if (mysqli_num_rows($result) > 0) {
  ?>



    <section class="ftco-menu mb-5 pb-5">
      <div class="container">

        <div class="row d-md-flex">
          <div class="col-lg-12 ftco-animate p-md-5">
            <div class="row">

              <div class="col-md-12 d-flex align-items-center">

                <div class="tab-content ftco-animate" id="v-pills-tabContent">

                  <div class="tab-pane fade show active" id="v-pills-2" role="tabpanel" aria-labelledby="v-pills-2-tab">
                    <div class="row" id="cat">
                      <?php
                      while ($data = mysqli_fetch_assoc($result)) {

                      ?>

                        <div class="col-sm-6 col-md-4 col-lg-3 text-center">
                          <div class="menu-wrap">
                            <!-- <a href="#" class="menu-img img mb-4"
                          style="background-image: url();"></a> -->
                            <img src="<?php echo 'adminpanel/books-images/' . $data['book_img'] ?>" height="300px" width="100%" alt="">
                            <div class="text">
                              <h6 style="margin-top:20px"><a href="#">
                                  <?php echo $data['book_title'] ?>
                                </a></h6>
                              <p style="margin-top:20px">
                              <?php echo strlen($data['book_discription']) > 120 ? substr($data['book_discription'], 0, 120) . '...' : $data['book_discription']; ?>
                              </p>
                              <p class="price" style="margin-top:20px"><span>
                                  <?php echo  '$'. $data['book_price'] .'/-' ?>
                                </span></p>
                              <p><a href="product-single.php?id=<?php echo $data['book_id'] ?>" class="primary-btn">Buy Now</a>
                              </p>
                            </div>
                          </div>
                        </div>
                    <?php

                      }
                    }
                    ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 text-center m-auto">




          </div>
        </div>
      </div>
    </section>

<!--================ End show book with categories =================-->



    <!--================ Start footer Area  =================-->
    <?php
    include('footer.php');
    ?>
    <!--================ End footer Area  =================-->

    <!-- search category work using ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
      $(document).ready(function() {
        let cat_div = $('#cat')
        $('#category').change(function() {
          var selectedValue = $(this).val();
          console.log(selectedValue);

          $.ajax({
            url: 'searchcat.php',
            type: 'POST',
            data: {
              filter: selectedValue
            },
            success: function(data) {
              console.log(data)
              cat_div.html(data)
            }
          })



        });
      });
    </script>




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