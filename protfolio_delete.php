<?php
require_once 'includes/db.php';
$protfolio_id = $_GET['protfolio_id'];
$delete_query = "DELETE FROM protfolios WHERE id = $protfolio_id";
$delete_messages_conntect_form_db = mysqli_query($db_conntect,$delete_query);
header("location: protfolio_view.php");
?>
