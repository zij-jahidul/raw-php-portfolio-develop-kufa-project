<?php
require 'includes/db.php';
$contact_id = $_POST['contact_id'];
$contact_address = $_POST['contact_address'];
$contact_number = $_POST['contact_number'];
$contact_email = $_POST['contact_email'];

$update_query = "UPDATE contacts SET contact_address = '$contact_address' , contact_number = '$contact_number' , contact_email = '$contact_email'  WHERE id = $contact_id";
mysqli_query($db_conntect,$update_query);
header("location: contact_information.php");
?>
