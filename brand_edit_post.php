<?php

require 'includes/db.php';
$brand_id = $_POST['brand_id'];
$brand_name = $_POST['brand_name'];

if($_FILES['brand_image']['name']){
  //old photo delete...
  $portfolio_from_db = "SELECT brand_image FROM brands WHERE id = $brand_id";
  $old_photo_name = mysqli_fetch_assoc(mysqli_query($db_conntect , $portfolio_from_db))['brand_image'];
  $old_photo_location = "uploads/brand/".$old_photo_name;
  unlink($old_photo_location);
 //new photo upload
  $file_name = $_FILES['brand_image']['name'];
  $after_explode = explode("." , $file_name);
  $new_file_extension = end($after_explode);
  $new_file_name =  $portfolio_id.".".$new_file_extension;
  $new__file_location = "uploads/brand/".$new_file_name;
  move_uploaded_file($_FILES['brand_image']['tmp_name'],$new__file_location);
  //new photo update
  $new_photo_update_query = "UPDATE brands SET brand_image = '$new_file_name' WHERE id = $brand_id";
  mysqli_query($db_conntect , $new_photo_update_query);
  header("location: brand.php");
}
$update_query = "UPDATE brands SET brand_name = '$brand_name' WHERE id = $brand_id";
mysqli_query($db_conntect,$update_query);
header("location: brand.php");
?>
