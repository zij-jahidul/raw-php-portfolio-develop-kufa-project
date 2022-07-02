<?php
require_once 'includes/db.php';
$file_name = $_FILES['header_file']['name'];
$after_explode = explode("." , $file_name);
$file_extension = end($after_explode);
$excepted_extension = array("jpg","jpeg","png","PNG","JPG","JPEG");
if(in_array($file_extension , $excepted_extension)){
  if($_FILES['header_file']['size'] <= 5000000){

    $header_name = $_POST['header_name'];
    $header_information = $_POST['header_description'];
    $header_query_insert = "INSERT INTO headers (header_name,header_description) VALUES ('$header_name' , '$header_information')";

    $active_from_db = mysqli_query($db_conntect , $header_query_insert);
    $last_id = mysqli_insert_id($db_conntect);
    $new_file_name = $last_id.".".$file_extension;
    $current_location = $_FILES['header_file']['tmp_name'];
    $new_location = "uploads/header/".$new_file_name;
    move_uploaded_file($current_location,$new_location);
    $portfolio_update_query = "UPDATE headers SET header_file = '$new_file_name' WHERE id = $last_id";
    mysqli_query($db_conntect , $portfolio_update_query);
    header("location: header.php");
  }
  else{
    echo "Your file more than 50 KB";
  }
}
else{
  echo "Your file formate is not supported";
}
?>
