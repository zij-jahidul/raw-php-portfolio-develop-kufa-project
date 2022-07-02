<?php

require 'includes/db.php';
$id = $_GET['id'];

$delete_query = "DELETE FROM visitor_messages WHERE id = $id";
$delete_messages_conntect_form_db = mysqli_query($db_conntect,$delete_query);

header("location: contact_restore.php");


?>
