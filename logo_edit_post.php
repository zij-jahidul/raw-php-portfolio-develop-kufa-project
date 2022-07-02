<?php
require 'includes/db.php';
$logo_id = $_POST['logo_id'];
$logo_name = $_POST['logo_name'];

if($_FILES['logo_image']['name']){
  //old photo delete...
  $portfolio_from_db = "SELECT logo_image FROM logos WHERE id = $logo_id";
  $old_photo_name = mysqli_fetch_assoc(mysqli_query($db_conntect , $portfolio_from_db))['logo_image'];
  $old_photo_location = "uploads/logo/".$old_photo_name;
  unlink($old_photo_location);
 //new photo upload
  $file_name = $_FILES['logo_image']['name'];
  $after_explode = explode("." , $file_name);
  $new_file_extension = end($after_explode);
  $new_file_name =  $logo_id.".".$new_file_extension;
  $new__file_location = "uploads/logo/".$new_file_name;
  move_uploaded_file($_FILES['logo_image']['tmp_name'],$new__file_location);
  //new photo update
  $new_photo_update_query = "UPDATE logos SET logo_image = '$new_file_name' WHERE id = $logo_id";
  mysqli_query($db_conntect , $new_photo_update_query);
  header("location: logo.php");
}
$update_query = "UPDATE logos SET logo_name = '$logo_name' WHERE id = $logo_id";
mysqli_query($db_conntect,$update_query);
header("location: logo.php");
?>
