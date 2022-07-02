<?php
session_start();
require 'includes/db.php';
$social_id = $_GET['social_id'];

$active_social_count_query = "SELECT COUNT(*) AS active_count FROM socials WHERE social_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_social_count_query);

if($_GET['btn'] == 'active'){
  if(mysqli_fetch_assoc($active_from_db)['active_count'] < 4){
  $update_query = "UPDATE socials SET social_status = 2 WHERE id = $social_id";
  }
  else {
    $_SESSION['error'] = "You Can not add more than 4 services";
  }
}
else {
  $update_query = "UPDATE socials SET social_status = 1 WHERE id = $social_id";
}

mysqli_query($db_conntect,$update_query);
header("location: social.php");
?>
