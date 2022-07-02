<?php
require 'includes/db.php';
$education_icon = $_POST['edu_year'];
$education_title = $_POST['edu_description'];
$education_description = $_POST['edu_per'];
$insert_service_query = "INSERT INTO educations (edu_year,edu_description, edu_per) VALUES ('$education_icon' , '$education_title' , '$education_description')";
mysqli_query($db_conntect ,$insert_service_query);
header("location: education.php");
?>
