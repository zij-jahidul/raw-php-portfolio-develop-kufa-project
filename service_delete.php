<?php
require_once 'includes/db.php';
$id = $_GET['service_id'];
$delete_query = "DELETE FROM services WHERE id = $id";
$delete_messages_conntect_form_db = mysqli_query($db_conntect,$delete_query);
header("location: services_view.php");
?>
