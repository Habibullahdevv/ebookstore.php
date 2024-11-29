<?php
include("config.php");

$format_id = $_GET["del"];

$del_query = "DELETE FROM `book_format` WHERE `book_format_id` = '$format_id'";
$del_result = mysqli_query($connection,$del_query) or die("Query Failed");
echo "<script>
window.location.href = 'viewbookformat.php'
</script>";

?>