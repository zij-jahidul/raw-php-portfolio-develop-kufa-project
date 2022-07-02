<?php
require 'includes/db.php';
$header_id = $_POST['header_id'];
$header_name = $_POST['header_name'];
$header_description = $_POST['header_description'];
$header_update_query = "UPDATE headers SET header_name = '$header_name' , header_description = '$header_description' WHERE id = $header_id";
mysqli_query($db_conntect,$header_update_query);
header("location: header.php");
?>

<?php
require 'includes/db.php';
$header_id = $_POST['header_id'];
$header_name = $_POST['header_name'];
$header_description = $_POST['header_description'];

if($_FILES['header_file']['name']){
  //old photo delete...
  $header_from_db = "SELECT header_file FROM headers WHERE id = $header_id";
  $old_photo_name = mysqli_fetch_assoc(mysqli_query($db_conntect , $header_from_db))['header_file'];
  $old_photo_location = "uploads/header/".$old_photo_name;
  unlink($old_photo_location);
 //new photo upload
  $file_name = $_FILES['header_file']['name'];
  $after_explode = explode("." , $file_name);
  $new_file_extension = end($after_explode);
  $new_file_name =  $portfolio_id.".".$new_file_extension;
  $new__file_location = "uploads/header/".$new_file_name;
  move_uploaded_file($_FILES['header_file']['tmp_name'],$new__file_location);
  //new photo update
  $new_photo_update_query = "UPDATE headers SET header_file = '$new_file_name' WHERE id = $header_id";
  mysqli_query($db_conntect , $new_photo_update_query);
  header("location: protfolio_view.php");
}
$update_query = "UPDATE headers SET header_name = '$header_name' , header_description = '$header_description' WHERE id = $portfolio_id";
mysqli_query($db_conntect,$update_query);
header("location: header.php");
?>
