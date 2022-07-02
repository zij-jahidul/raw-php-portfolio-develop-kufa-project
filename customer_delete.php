<?php
require_once 'includes/db.php';
$customer_id = $_GET['customer_id'];
$delete_query = "DELETE FROM customers WHERE id = $customer_id";
$delete_messages_conntect_form_db = mysqli_query($db_conntect,$delete_query);
header("location: customer.php");
?>
