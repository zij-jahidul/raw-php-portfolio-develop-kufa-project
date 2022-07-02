<?php
session_start();
require 'includes/db.php';
$exprience_id = $_GET['exprience_id'];

$active_exprience_count_query = "SELECT COUNT(*) AS active_count FROM expriences WHERE exprience_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_exprience_count_query);

if($_GET['btn'] == 'active'){
  if(mysqli_fetch_assoc($active_from_db)['active_count'] < 4){
  $update_query = "UPDATE expriences SET exprience_status = 2 WHERE id = $exprience_id";
  }
  else {
    $_SESSION['error'] = "You Can not 4 services";
  }
}
else {
  $update_query = "UPDATE expriences SET exprience_status = 1 WHERE id = $exprience_id";
}

mysqli_query($db_conntect,$update_query);
header("location: exprience.php");
?>
