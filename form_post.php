<?php
session_start();
require 'includes/db.php';

if(empty($_POST['user_name'])){
  $_SESSION['user_name'] = "Please Enter Valid Name";
  header("location: index.php");
}
else if(!filter_var($_POST['user_email'], FILTER_VALIDATE_EMAIL)){
  $_SESSION['user_name'] = "Please Enter Valid Email";
  header("location: index.php");
}
else if(empty($_POST['user_email'])){
  $_SESSION['user_name'] = "Please Enter Email";
  header("location: index.php");
}
else if(empty($_POST['user_message'])){
  $_SESSION['user_name'] = "Please Enter Your Message";
  header("location: index.php");
}
else {
  $user_name = $_POST['user_name'];
  $user_email = $_POST['user_email'];
  $user_message = $_POST['user_message'];
  $insert_query = "INSERT INTO forms (user_name,user_email, user_message) VALUES ('$user_name' , '$user_email' , '$user_message')";
  mysqli_query($db_conntect ,$insert_query);
  header("location: index.php");
}

?>
