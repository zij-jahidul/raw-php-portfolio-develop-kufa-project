<?php
require 'includes/db.php';
// echo "Name : ".$_POST['visitor_name']."<br>";
// echo "Email : ".$_POST['visitor_email']."<br>";
// echo "Message : ".$_POST['visitor_message']."<br>";


if(empty($_POST['visitor_name'])){
  echo "Where are your Name ?";
}
else if(!filter_var($_POST['visitor_email'], FILTER_VALIDATE_EMAIL)){
  echo "Your Email Is Not Valid";
}
else if(empty($_POST['visitor_email'])){
  echo "Where are your Email ?";
}

else if(empty($_POST['visitor_message'])){
  echo "Where are your message ?";
}
else {

  $user_name = $_POST['visitor_name'];
  $user_email = $_POST['visitor_email'];
  $user_message = $_POST['visitor_message'];
  $insert_query = "INSERT INTO visitor_messages (visitor_name,visitor_email, visitor_message) VALUES ('$user_name' , '$user_email' , '$user_message')";
  mysqli_query($db_conntect ,$insert_query);

  header("location: contact_view.php");

}






?>
