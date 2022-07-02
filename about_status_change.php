<?php
session_start();
require 'includes/db.php';
$about_id = $_GET['about_id'];

$active_about_count_query = "SELECT COUNT(*) AS active_count FROM abouts WHERE about_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_about_count_query);

if($_GET['btn'] == 'active'){
  if(mysqli_fetch_assoc($active_from_db)['active_count'] < 1){
  $update_query = "UPDATE abouts SET about_status = 2 WHERE id = $about_id";
  }
  else {
    $_SESSION['error'] = "You Can not 1 services";
  }
}
else {
  $update_query = "UPDATE abouts SET about_status = 1 WHERE id = $about_id";
}

mysqli_query($db_conntect,$update_query);
header("location: about.php");
?>
