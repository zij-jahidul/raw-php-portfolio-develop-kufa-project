<?php
require 'includes/db.php';
$service_id = $_POST['service_id'];
$service_icon = $_POST['service_icon'];
$service_title = $_POST['service_title'];
$service_describtion = $_POST['service_describtion'];

$update_query = "UPDATE services SET service_icon = '$service_icon' , service_title = '$service_title' , service_describtion = '$service_describtion'  WHERE id = $service_id";
mysqli_query($db_conntect,$update_query);
header("location: services_view.php");
?>
