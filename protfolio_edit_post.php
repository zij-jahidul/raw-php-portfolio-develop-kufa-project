<?php

require 'includes/db.php';
$portfolio_id = $_POST['protfolio_id'];
$portfolio_name = $_POST['protfolio_name'];
$portfolio_information = $_POST['protfolio_information'];

if($_FILES['protfolio_file']['name']){
  //old photo delete...
  $portfolio_from_db = "SELECT protfolio_file FROM protfolios WHERE id = $portfolio_id";
  $old_photo_name = mysqli_fetch_assoc(mysqli_query($db_conntect , $portfolio_from_db))['protfolio_file'];
  $old_photo_location = "uploads/portfolio/".$old_photo_name;
  unlink($old_photo_location);
 //new photo upload
  $file_name = $_FILES['protfolio_file']['name'];
  $after_explode = explode("." , $file_name);
  $new_file_extension = end($after_explode);
  $new_file_name =  $portfolio_id.".".$new_file_extension;
  $new__file_location = "uploads/portfolio/".$new_file_name;
  move_uploaded_file($_FILES['protfolio_file']['tmp_name'],$new__file_location);
  //new photo update
  $new_photo_update_query = "UPDATE protfolios SET protfolio_file = '$new_file_name' WHERE id = $portfolio_id";
  mysqli_query($db_conntect , $new_photo_update_query);
  header("location: protfolio_view.php");
}
$update_query = "UPDATE protfolios SET protfolio_name = '$portfolio_name' , protfolio_information = '$portfolio_information' WHERE id = $portfolio_id";
mysqli_query($db_conntect,$update_query);
header("location: protfolio_view.php");
?>
