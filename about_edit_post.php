<?php

require 'includes/db.php';
$about_id = $_POST['about_id'];
$about_name = $_POST['about_me'];
$about_information = $_POST['about_information'];

if($_FILES['about_image']['name']){
  //old photo delete...
  $portfolio_from_db = "SELECT about_image FROM abouts WHERE id = $about_id";
  $old_photo_name = mysqli_fetch_assoc(mysqli_query($db_conntect , $portfolio_from_db))['about_image'];
  $old_photo_location = "uploads/about/".$old_photo_name;
  unlink($old_photo_location);
 //new photo upload
  $file_name = $_FILES['about_image']['name'];
  $after_explode = explode("." , $file_name);
  $new_file_extension = end($after_explode);
  $new_file_name =  $about_id.".".$new_file_extension;
  $new__file_location = "uploads/about/".$new_file_name;
  move_uploaded_file($_FILES['about_image']['tmp_name'],$new__file_location);
  //new photo update
  $new_photo_update_query = "UPDATE abouts SET about_image = '$new_file_name' WHERE id = $about_id";
  mysqli_query($db_conntect , $new_photo_update_query);
  header("location: about.php");
}
$update_query = "UPDATE abouts SET about_name = '$about_name' , about_information = '$about_information' WHERE id = $about_id";
mysqli_query($db_conntect,$update_query);
header("location: about.php");
?>
