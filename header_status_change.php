<?php
session_start();
require 'includes/db.php';
$header_id = $_GET['header_id'];

$active_header_count_query = "SELECT COUNT(*) AS active_count FROM headers WHERE header_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_header_count_query);

if($_GET['btn'] == 'active'){
  if(mysqli_fetch_assoc($active_from_db)['active_count'] < 1){
  $update_query = "UPDATE headers SET header_status = 2 WHERE id = $header_id";
  }
  else {
    $_SESSION['error'] = "You Can not show over than One item";
  }
}
else {
  $update_query = "UPDATE headers SET header_status = 1 WHERE id = $header_id";
}
mysqli_query($db_conntect,$update_query);
header("location: header.php");
?>
