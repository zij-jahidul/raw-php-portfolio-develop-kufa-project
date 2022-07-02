<?php
session_start();
require 'includes/db.php';
// echo "Name : ".$_POST['visitor_name']."<br>";
// echo "Email : ".$_POST['visitor_email']."<br>";
// echo "Message : ".$_POST['visitor_password']."<br>";


if(empty($_POST['visitor_name'])){
  $_SESSION['name'] = 'nam koi ?';
  header("location: registration.php");
}
else if(!filter_var($_POST['visitor_email'], FILTER_VALIDATE_EMAIL)){
  $_SESSION['v_email'] = 'valid email ?';
  header("location: registration.php");
}
else if(empty($_POST['visitor_email'])){
  $_SESSION['email'] = 'nam koi ?';
  header("location: registration.php");
}

else if(empty($_POST['visitor_password'])){
  $_SESSION['password'] = 'nam koi ?';
  header("location: registration.php");
}


else {

  $user_name = $_POST['visitor_name'];
  $user_email = $_POST['visitor_email'];
  $user_password = md5($_POST['visitor_password']);
  $insert_query = "INSERT INTO contact_informations (visitor_name,visitor_email, visitor_password) VALUES ('$user_name' , '$user_email' , '$user_password')";
  mysqli_query($db_conntect ,$insert_query);

  header("location: dashboard.php");

}
