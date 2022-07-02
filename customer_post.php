<?php
require_once 'includes/db.php';

$file_name = $_FILES['customer_image']['name'];
$after_explode = explode("." , $file_name);
$file_extension = end($after_explode);
$excepted_extension = array("jpg","jpeg","png","PNG","JPG","JPEG");
if(in_array($file_extension , $excepted_extension)){
  if($_FILES['customer_image']['size'] <= 50000000){

    $customer_message = $_POST['customer_message'];
    $customer_name = $_POST['customer_name'];
    $customer_position = $_POST['customer_position'];
    $protfolio_query_insert = "INSERT INTO customers (customer_message,customer_name ,customer_position) VALUES ('$customer_message' , '$customer_name' , '$customer_position')";

    $active_from_db = mysqli_query($db_conntect , $protfolio_query_insert);
    $last_id = mysqli_insert_id($db_conntect);
    $new_file_name = $last_id.".".$file_extension;
    $current_location = $_FILES['customer_image']['tmp_name'];
    $new_location = "uploads/customer/".$new_file_name;
    move_uploaded_file($current_location,$new_location);

    $portfolio_update_query = "UPDATE customers SET customer_image = '$new_file_name' WHERE id = $last_id";
    mysqli_query($db_conntect , $portfolio_update_query);
    header("location: customer.php");
  }
  else{
    echo "Your file more than 50 KB";
  }
}
else{
  echo "Your file formate is not supported";
}

?>
