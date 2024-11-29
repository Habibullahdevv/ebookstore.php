<?php
include("config.php");

if(isset($_POST["format"])){
    $book_pdf_name = $_FILES["pdf"]["name"];
    $book_pdf_tmp_name = $_FILES["pdf"]["tmp_name"];
    $book_pdf_size = $_FILES["pdf"]["size"];

    $book_hardcopy_name = $_FILES["hardcopy"]["name"];
    $book_hardcopy_tmp_name = $_FILES["hardcopy"]["tmp_name"];
    $book_hardcopy_size = $_FILES["hardcopy"]["size"];

    $book_cd_name = $_FILES["cd"]["name"];
    $book_cd_size = $_FILES["cd"]["size"];
    $book_cd_tmp_name = $_FILES["cd"]["tmp_name"];

$format_query = "SELECT * FROM book_format WHERE `book_pdf` = '$book_pdf_name'";
$format_result = mysqli_query($connection,$format_query);
if(mysqli_num_rows($format_result)> 0){
    echo"<script>alert('PDF Already Exists')</script>";
}else{
    $insert_query = "INSERT INTO `book_format` (`book_pdf`,`book_cd`,`book_hard_copy`) VALUES ('$$book_pdf_name','$book_hardcopy_name','$book_cd_name')";

    move_uploaded_file($book_pdf_tmp_name, 'uploadpdf/' . $book_pdf_name);

    move_uploaded_file($book_hardcopy_tmp_name, 'uploadhardcopy/' . $book_hardcopy_name);

    move_uploaded_file($book_cd_tmp_name, 'uploadcd/' . $book_cd_name);

    $insert_result = mysqli_query($connection,$insert_query);
    if($insert_result){
        echo "<script> alert('Book Format Successfully Inserted') 
        window.location.href = 'viewbookformat.php'
        </script>";

    }
}

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Add Book Format</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/customstyle.css">

</head>
<!--=============start book format form =================-->
<body class="bg-gradient-light">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add Your Book Format</h1>
                            </div>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data" class="user">
                                <div class="form-group">
                                <label for="pdf">Book PDF</label>
                                    <input type="file" name="pdf" class="form-control form-control-user" id="category"
                                     required autocomplete="off">
                                </div>
                                <div class="form-group">
                                <label for="hardcopy">Book Hard Copy</label>
                                    <input type="file" name="hardcopy" class="form-control form-control-user" id="category"
                                         required autocomplete="off">
                                </div>
                                <div class="form-group">
                                <label for="CD">Book CD</label>
                                    <input type="file" name="cd" class="form-control form-control-user" id="category"
                                     required autocomplete="off">
                                </div>
                                <div class="form-group row">
                                </div>
                                <input type="submit" name="format" class="btn btn-success btn-user btn-block" value="Add Book Format">
                                </input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--================ end book format form =================-->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>