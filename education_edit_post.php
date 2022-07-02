<?php
require 'includes/db.php';
$education_id = $_POST['education_id'];
$education_year = $_POST['edu_year'];
$education_description = $_POST['edu_description'];
$education_per = $_POST['edu_per'];

$update_query = "UPDATE educations SET edu_year = '$education_year' , edu_description = '$education_description' , edu_per = '$education_per'  WHERE id = $education_id";
mysqli_query($db_conntect,$update_query);
header("location: education.php");
?>
