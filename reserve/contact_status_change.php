<?php
session_start();
require 'includes/db.php';
$contact_id = $_GET['contact_id'];

$active_contact_count_query = "SELECT COUNT(*) AS active_count FROM contacts WHERE contact_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_contact_count_query);

if($_GET['btn'] == 'active'){
  if(mysqli_fetch_assoc($active_from_db)['active_count'] < 1){
  $update_query = "UPDATE contacts SET contact_status = 2 WHERE id = $contact_id";
  }
  else {
    $_SESSION['error'] = "You Can not 1 services";
  }
}
else {
  $update_query = "UPDATE contacts SET contact_status = 1 WHERE id = $contact_id";
}

mysqli_query($db_conntect,$update_query);
header("location: contact_information.php");
?>
