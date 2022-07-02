<?php
require_once 'includes/db.php';
$brand_id = $_GET['brand_id'];
$delete_query = "DELETE FROM brands WHERE id = $brand_id";
$delete_messages_conntect_form_db = mysqli_query($db_conntect,$delete_query);
header("location: brand.php");
?>
