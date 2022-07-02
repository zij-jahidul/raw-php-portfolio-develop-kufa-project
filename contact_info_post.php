<?php
require 'includes/db.php';
$contact_address = $_POST['contact_address'];
$contact_number = $_POST['contact_number'];
$contact_email = $_POST['contact_email'];
$insert_service_query = "INSERT INTO contacts (contact_address,contact_number, contact_email) VALUES ('$contact_address' , '$contact_number' , '$contact_email')";
mysqli_query($db_conntect ,$insert_service_query);
header("location: contact_information.php");
?>
