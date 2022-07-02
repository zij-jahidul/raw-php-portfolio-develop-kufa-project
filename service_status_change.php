<?php
session_start();
require 'includes/db.php';
$service_id = $_GET['service_id'];

$active_service_count_query = "SELECT COUNT(*) AS active_count FROM services WHERE service_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_service_count_query);

if($_GET['btn'] == 'active'){
  if(mysqli_fetch_assoc($active_from_db)['active_count'] < 6){
  $update_query = "UPDATE services SET service_status = 2 WHERE id = $service_id";
  }
  else {
    $_SESSION['error'] = "You Can not 6 services";
  }
}
else {
  $update_query = "UPDATE services SET service_status = 1 WHERE id = $service_id";
}

mysqli_query($db_conntect,$update_query);
header("location: services_view.php");
?>
