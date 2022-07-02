<?php
require 'includes/db.php';
$id = $_GET['id'];
$restore_query = "UPDATE visitor_messages SET delete_status = 1 WHERE id = $id";
$restore_messages_conntect_form_db = mysqli_query($db_conntect,$restore_query);
header("location: contact_restore.php");
?>
