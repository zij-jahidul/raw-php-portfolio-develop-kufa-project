<?php
session_start();
require 'includes/db.php';
$logo_id = $_GET['logo_id'];

$active_protfolio_count_query = "SELECT COUNT(*) AS active_count FROM logos WHERE logo_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_protfolio_count_query);

if($_GET['btn'] == 'active'){
  if(mysqli_fetch_assoc($active_from_db)['active_count'] < 1){
  $update_query = "UPDATE logos SET logo_status = 2 WHERE id = $logo_id";
  }
  else {
    $_SESSION['error'] = "You Can not 1 services";
  }
}
else {
  $update_query = "UPDATE logos SET logo_status = 1 WHERE id = $logo_id";
}

mysqli_query($db_conntect,$update_query);
header("location: logo.php");
?>
