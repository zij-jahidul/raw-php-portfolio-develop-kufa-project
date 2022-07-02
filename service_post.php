<?php
require 'includes/db.php';
$service_icon = $_POST['service_icon'];
$service_title = $_POST['service_title'];
$service_description = $_POST['service_describtion'];
$insert_service_query = "INSERT INTO services (service_icon,service_title, service_describtion) VALUES ('$service_icon' , '$service_title' , '$service_description')";
mysqli_query($db_conntect ,$insert_service_query);
header("location: services_view.php");
?>
