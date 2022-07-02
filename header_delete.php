<?php
require_once 'includes/db.php';
$id = $_GET['header_id'];
$delete_query = "DELETE FROM headers WHERE id = $id";
$delete_form_db = mysqli_query($db_conntect,$delete_query);
header("location: header.php");
?>
