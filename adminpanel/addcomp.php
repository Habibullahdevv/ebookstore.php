<?php
include("config.php");

if(isset($_POST["comp"])){

$comp_name = mysqli_real_escape_string($connection,$_POST["compname"]);
$comp_date = mysqli_real_escape_string($connection,$_POST["compdate"]);
$comp_time = mysqli_real_escape_string($connection,$_POST["comptime"]);
$comp_query = "SELECT * FROM competition WHERE `compname` = '$comp_name'";
$comp_result = mysqli_query($connection,$comp_query);
if(mysqli_num_rows($comp_result)> 0){
    echo"<script>alert('Competition Already Exists')</script>";
}else{
    $insert_query = "INSERT INTO `competition` (`compname`, `compdate`, `comptime`) VALUES ('$comp_name', '$comp_date', '$comp_time')";
    $insert_result = mysqli_query($connection,$insert_query);
    if($insert_result){
        echo "<script> alert('Competition Successfully Inserted') 
        window.location.href = 'viewcomp.php'
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

    <title>Add Competition</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/customstyle.css">

</head>
<!--================ start upload competition form =================-->
<body class="bg-gradient-light">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add Competition</h1>
                            </div>
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" class="user">
                                <div class="form-group">
                                    <input type="text" name="compname" class="form-control form-control-user" id="category"
                                        placeholder="Competition Name" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="date" name="compdate" class="form-control form-control-user" id="category"
                                        placeholder="Competition Date" required autocomplete="off">
                                </div>
                                <div class="form-group">
                                    <input type="time" name="comptime" class="form-control form-control-user" id="category"
                                        placeholder="Competition Time" required autocomplete="off">
                                </div>
                                <div class="form-group row">
                                </div>
                                <input type="submit" name="comp" class="btn btn-success btn-user btn-block" value="Add Competition">
                                </input>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!--================ end upload competition form =================-->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>