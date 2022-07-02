<?php
require 'includes/db.php';
$customer_id = $_POST['customer_id'];
$customer_message = $_POST['customer_message'];
$customer_name = $_POST['customer_name'];
$customer_position = $_POST['customer_position'];

if($_FILES['customer_image']['name']){
  //old photo delete...
  $portfolio_from_db = "SELECT customer_image FROM customers WHERE id = $customer_id";
  $old_photo_name = mysqli_fetch_assoc(mysqli_query($db_conntect , $portfolio_from_db))['customer_image'];
  $old_photo_location = "uploads/customer/".$old_photo_name;
  unlink($old_photo_location);
 //new photo upload
  $file_name = $_FILES['customer_image']['name'];
  $after_explode = explode("." , $file_name);
  $new_file_extension = end($after_explode);
  $new_file_name =  $portfolio_id.".".$new_file_extension;
  $new__file_location = "uploads/customer/".$new_file_name;
  move_uploaded_file($_FILES['customer_image']['tmp_name'],$new__file_location);
  //new photo update
  $new_photo_update_query = "UPDATE customers SET customer_image = '$new_file_name' WHERE id = $customer_id";
  mysqli_query($db_conntect , $new_photo_update_query);
  header("location: customer.php");
}
$update_query = "UPDATE customers SET customer_message = '$customer_message' , customer_name = '$customer_name' , customer_position = '$customer_position' WHERE id = $customer_id";
mysqli_query($db_conntect,$update_query);
// header("location: protfolio_view.php");
?>
