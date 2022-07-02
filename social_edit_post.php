<?php
require 'includes/db.php';
$social_id = $_POST['social_id'];
$social_link = $_POST['social_link'];
$social_icon = $_POST['social_icon'];

$social_update_query = "UPDATE socials SET social_link = '$social_link' , social_icon = '$social_icon' WHERE id = $social_id";
mysqli_query($db_conntect,$social_update_query);
header("location: social.php");
?>
