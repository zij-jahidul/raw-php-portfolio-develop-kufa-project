<?php

require 'includes/db.php';
$id = $_GET['id'];

$read_query = "UPDATE visitor_messages SET status = 1 WHERE id = $id";
$read_messages_conntect_form_db = mysqli_query($db_conntect,$read_query);


header("location: contact_view.php");


?>
