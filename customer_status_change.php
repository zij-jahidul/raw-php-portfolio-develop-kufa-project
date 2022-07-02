<?php
session_start();
require 'includes/db.php';
$customer_id = $_GET['customer_id'];

$active_customer_count_query = "SELECT COUNT(*) AS active_count FROM customers WHERE customer_status = 2";
$active_from_db = mysqli_query($db_conntect , $active_customer_count_query);

if($_GET['btn'] == 'active'){
  if(mysqli_fetch_assoc($active_from_db)['active_count'] < 1){
  $update_query = "UPDATE customers SET customer_status = 2 WHERE id = $customer_id";
  }
  else {
    $_SESSION['error'] = "You Can not 1 services";
  }
}
else {
  $update_query = "UPDATE customers SET customer_status = 1 WHERE id = $customer_id";
}

mysqli_query($db_conntect,$update_query);
header("location: customer.php");
?>
