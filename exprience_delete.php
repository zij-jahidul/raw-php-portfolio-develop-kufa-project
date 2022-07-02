<?php
require_once 'includes/db.php';
$id = $_GET['exprience_id'];
$delete_query = "DELETE FROM expriences WHERE id = $id";
$delete_messages_conntect_form_db = mysqli_query($db_conntect,$delete_query);
header("location: exprience.php");
?>
