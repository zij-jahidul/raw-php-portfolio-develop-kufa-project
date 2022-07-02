<?php

require 'includes/db.php';
$id = $_GET['id'];

$soft_delete_query = "UPDATE visitor_messages SET delete_status = 2 WHERE id = $id";
$soft_delete_messages_conntect_form_db = mysqli_query($db_conntect,$soft_delete_query);

header("location: contact_view.php");


?>
