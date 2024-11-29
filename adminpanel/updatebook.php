<?php 
include("config.php");

$bid = $_GET["id"];
$book_query = "SELECT * FROM `add-books` as b inner join `books_categorey` as c on b.category = c.cid WHERE `book_id` = '$bid'" or die("Query Falied");
$book_result = mysqli_query($connection, $book_query);
if (mysqli_num_rows($book_result) > 0) {
    while ($book = mysqli_fetch_assoc($book_result)) {

?>


?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Update Book</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/customstyle.css">

</head>

<body class="bg-gradient-light">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Update Your Book</h1>
                            </div>
                            <form action="bookdata.php" method="POST" enctype="multipart/form-data" class="user">
                            <div class="form-group">
                                    <input type="hidden" value="<?php echo $book['book_id'] ?>" name="bid" class="form-control form-control-user" id="book id"
                                        placeholder="Book id" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="text" value="<?php echo $book['book_title'] ?>" name="btitle" class="form-control form-control-user" id="category"
                                        placeholder="Update Book Title" required autocomplete="off">
                                </div>

                                <div class="form-group">
                                    <input type="text" value="<?php echo $book['categorey_name'] ?>" name="bcat" class="form-control form-control-user" id="category"
                                        placeholder="Update Book Category" required autocomplete="off">
                                </div>
                              
                                <div class="form-group">
                                    <input type="text" value="<?php echo $book['book_discription'] ?>" name="bdescription" class="form-control form-control-user" id="category"
                                        placeholder="Update Book Description" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="text" value="<?php echo $book['author'] ?>" name="bauthor" class="form-control form-control-user" id="category"
                                        placeholder="Update Book Author" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="file" name="img" class="form-control form-control-user" id="img"
                                        placeholder="Update Book Image" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="text" value="<?php echo $book['book_price'] ?>" name="bprice" class="form-control form-control-user" id="category"
                                        placeholder="Update Book Price" required autocomplete="off">
                                </div>
                                <div class="form-group row">
                                </div>
                                <input type="submit" name="update" class="btn btn-success btn-user btn-block" value="Update Book">
                                </input>
                            </form>
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

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>