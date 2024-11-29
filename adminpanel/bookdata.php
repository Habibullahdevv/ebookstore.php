<?php
include("config.php");

if(isset($_POST["update"])){
    $bookid = $_POST["bid"];
    $book_title = $_POST["btitle"];
    $book_cat = $_POST["bcat"];
    $book_des = $_POST["bdescription"];
    $bookauthor = $_POST["bauthor"];
    $book_img_name = $_FILES["img"]["name"];
    $book_img_size = $_FILES["img"]["size"];
    $book_img_tmp_name = $_FILES["img"]["tmp_name"];
    $book_price = $_POST["bprice"];
    $update_query = "UPDATE `add-books` SET `book_title`=' $book_title',`category`='$book_cat',`book_discription`='$book_des',`author`='$bookauthor',`book_img`='$book_img_name',`book_price`='$book_price' WHERE `book_id` = '$bookid'";
    move_uploaded_file( $book_img_tmp_name, 'books-images/' . $book_img_name);

    $update_result = mysqli_query($connection, $update_query) or die("Query Failed: UPDATE");
    if($update_result){
        echo "<script>
          window.location.href = 'view-product.php'
          </script>";
}

}
?>