<?php
session_start();
require_once 'includes/db.php';
if(empty($_POST['old_password']) || empty($_POST['new_password']) || empty($_POST['confirm_password'])){
  $_SESSION['fill_up'] = "Please Enter your password";
  header("location: profile.php");
}
else if($_POST['new_password'] == $_POST['old_password']){
  $_SESSION['pass_match'] = "Your Old password & New password is same";
  header("location: profile.php");
}
else if($_POST['new_password'] == $_POST['confirm_password']) {
  $old_password = md5($_POST['old_password']);
  $new_password = md5($_POST['new_password']);
  $user_email = $_SESSION['user_email'];
  $check_query = "SELECT COUNT(*) AS total FROM contact_informations WHERE visitor_email = '$user_email' AND visitor_password = '$old_password'";
  $from_db = mysqli_query($db_conntect,$check_query);
  if(mysqli_fetch_assoc($from_db)['total'] == 1){
    $password_update_query = "UPDATE contact_informations SET visitor_password = '$new_password' WHERE visitor_email = '$user_email'";
    mysqli_query($db_conntect , $password_update_query);
    $_SESSION['pass_ok'] = "Your password is change";
    header("location: profile.php");
  }
  else {
    header("location: profile.php");
  }
}

else {
  header("location: profile.php");
}


?>
