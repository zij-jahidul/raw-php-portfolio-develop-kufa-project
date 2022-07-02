<?php
session_start();
require 'includes/db.php';
$protfolio_id = $_GET['protfolio_id'];

$active_protfolio_count_query = "SELECT COUNT(*) AS active_count FROM protfolios WHERE protfolio_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_protfolio_count_query);

if($_GET['btn'] == 'active'){
  if(mysqli_fetch_assoc($active_from_db)['active_count'] < 6){
  $update_query = "UPDATE protfolios SET protfolio_status = 2 WHERE id = $protfolio_id";
  }
  else {
    $_SESSION['error'] = "You Can not 6 services";
  }
}
else {
  $update_query = "UPDATE protfolios SET protfolio_status = 1 WHERE id = $protfolio_id";
}

mysqli_query($db_conntect,$update_query);
header("location: protfolio_view.php");
?>
