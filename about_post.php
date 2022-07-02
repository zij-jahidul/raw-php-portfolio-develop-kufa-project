<?php
require_once 'includes/db.php';

$file_name = $_FILES['about_image']['name'];
$after_explode = explode("." , $file_name);
$file_extension = end($after_explode);
$excepted_extension = array("jpg","jpeg","png","PNG","JPG","JPEG");
if(in_array($file_extension , $excepted_extension)){
  if($_FILES['about_image']['size'] <= 5000000){
    $protfolio_name = ($_POST['about_me']);
    $protfolio_information = ($_POST['about_information']);

    $protfolio_query_insert = "INSERT INTO abouts (about_me,about_information) VALUES ('$protfolio_name' , '$protfolio_information')";
    $active_from_db = mysqli_query($db_conntect , $protfolio_query_insert);
    $last_id = mysqli_insert_id($db_conntect);
    $new_file_name = $last_id.".".$file_extension;
    $current_location = $_FILES['about_image']['tmp_name'];
    $new_location = "uploads/about/".$new_file_name;
    move_uploaded_file($current_location,$new_location);

    $portfolio_update_query = "UPDATE abouts SET about_image = '$new_file_name' WHERE id = $last_id";
    mysqli_query($db_conntect , $portfolio_update_query);
    header("location: about.php");
  }
  else{
    echo "Your file more than 50 KB";
  }
}
else{
  echo "Your file formate is not supported";
}

?>
