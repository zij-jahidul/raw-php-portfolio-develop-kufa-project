<?php
require_once 'includes/db.php';
$about_id = $_GET['about_id'];
$delete_query = "DELETE FROM abouts WHERE id = $about_id";
$delete_messages_conntect_form_db = mysqli_query($db_conntect,$delete_query);
header("location: about.php");
?>
