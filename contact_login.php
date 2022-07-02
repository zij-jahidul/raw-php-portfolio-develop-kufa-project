<?php
session_start();
require 'includes/db.php';

$visitor_name = $_POST['visitor_name'];
$visitor_email = $_POST['visitor_email'];
$visitor_password = md5($_POST['visitor_password']);

$login_query = "SELECT * FROM contact_informations WHERE visitor_email = '$visitor_email' AND visitor_password = '$visitor_password'";
$data_from_db = mysqli_query($db_conntect , $login_query);
//
// $user_name_query = "SELECT visitor_name from contact_informations WHERE visitor_email = '$visitor_email'";
// $user_name_check = mysqli_query($db_connect,$user_name_query);
//
// $user_name = mysqli_fetch_assoc($user_name_check);
// print_r($user_name);

if($data_from_db->num_rows == 1){

  $_SESSION['login'] = 'loging successfully';
  $_SESSION['user_email'] = $visitor_email;

  header("location: dashboard.php");
}
else {
  $_SESSION['error'] = 'something...';
  header("location: login.php");
}

?>
