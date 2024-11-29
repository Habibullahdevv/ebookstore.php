<?php 
include("config.php");
// print_r($_POST);
if(isset($_POST["filter"])){
$filter = $_POST['filter'];

$result = mysqli_query($connection,"SELECT * from `add-books` as b inner join `books_categorey` as bc on b.category = bc.cid where categorey_name like '%$filter%'");
if(mysqli_num_rows($result) > 0) {
    while($data = mysqli_fetch_assoc($result)){
        // start search category through database
        echo '
        
        <div class="col-sm-12 col-md-6 col-lg-4 text-center">
        <div class="menu-wrap">
          <!-- <a href="#" class="menu-img img mb-4"
            style="background-image: url();"></a> -->
            <img src="'.'adminpanel/books-images/' . $data['book_img'].'" height="300px" width="100%" alt="">
          <div class="text">
            <h3><a href="#">
                '.$data['book_title'].'
              </a></h3>
            <p>
              '. $data['book_discription'].'
            </p>
            <p class="price"><span>
                '.$data['book_price'].'
              </span></p>
            <p><a href="product-single.php?id='.$data['book_id'].'" class="btn btn-primary btn-outline-primary">View Product</a>
            </p>
          </div>
        </div>
      </div>';
       // end search category through database
    }
}else{
    echo '<div class="alert alert-danger" role="alert">
    No record foud
  </div>'. '';
}
}

?>