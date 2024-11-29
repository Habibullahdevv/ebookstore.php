<?php
include("config.php");

$comp_id = $_GET["comp"];

$del_query = "DELETE FROM `competition` WHERE `id` = '$comp_id'";
$del_result = mysqli_query($connection,$del_query) or die("Query Failed");
echo "<script>
window.location.href = 'viewcomp.php'
</script>";
?>