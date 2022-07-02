<?php
session_start();
require 'includes/db.php';
$brand_id = $_GET['brand_id'];

$active_service_count_query = "SELECT COUNT(*) AS active_count FROM brands WHERE brand_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_service_count_query);

if($_GET['btn'] == 'active'){
  if(mysqli_fetch_assoc($active_from_db)['active_count'] < 5){
  $update_query = "UPDATE brands SET brand_status = 2 WHERE id = $brand_id";
  }
  else {
    $_SESSION['error'] = "You Can not 5 services";
  }
}
else {
  $update_query = "UPDATE brands SET brand_status = 1 WHERE id = $brand_id";
}

mysqli_query($db_conntect,$update_query);
header("location: brand.php");
?>
