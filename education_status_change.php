<?php
session_start();
require 'includes/db.php';
$education_id = $_GET['education_id'];

$active_education_count_query = "SELECT COUNT(*) AS active_count FROM educations WHERE edu_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_education_count_query);

if($_GET['btn'] == 'active'){
  if(mysqli_fetch_assoc($active_from_db)['active_count'] < 4){
  $update_query = "UPDATE educations SET edu_status = 2 WHERE id = $education_id";
  }
  else {
    $_SESSION['error'] = "You Can not 4 services";
  }
}
else {
  $update_query = "UPDATE educations SET edu_status = 1 WHERE id = $education_id";
}
mysqli_query($db_conntect,$update_query);
header("location: education.php");
?>
