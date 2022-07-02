<?php
require 'includes/db.php';
$exprience_icon = $_POST['exprience_icon'];
$exprience_number = $_POST['exprience_number'];
$exprience_title = $_POST['exprience_title'];
$insert_exprience_query = "INSERT INTO expriences (exprience_icon, exprience_number,exprience_title) VALUES ('$exprience_icon' , '$exprience_number' , '$exprience_title')";
mysqli_query($db_conntect ,$insert_exprience_query);
header("location: exprience.php");
?>
