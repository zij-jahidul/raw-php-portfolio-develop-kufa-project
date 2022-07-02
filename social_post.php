<?php
require 'includes/db.php';
$social_link = $_POST['social_link'];
$social_icon = $_POST['social_icon'];
$insert_social_query = "INSERT INTO socials (social_link,social_icon) VALUES ('$social_link' , '$social_icon')";
mysqli_query($db_conntect ,$insert_social_query);
header("location: social.php");
?>
