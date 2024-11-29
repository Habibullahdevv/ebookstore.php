<?php
include("config.php");

$del_id = $_GET["delid"];

$del_query = "DELETE FROM `add-books` WHERE `book_id` = '$del_id'";
$del_result = mysqli_query($connection,$del_query) or die("Query Failed");
echo "<script>
window.location.href = 'view-product.php'
</script>";


?>