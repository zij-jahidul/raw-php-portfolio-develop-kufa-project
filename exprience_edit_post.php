<?php
require 'includes/db.php';
$exprience_id = $_POST['exprience_id'];
$exprience_icon = $_POST['exprience_icon'];
$exprience_number = $_POST['exprience_number'];
$exprience_title = $_POST['exprience_title'];

$update_query = "UPDATE expriences SET exprience_icon = '$exprience_icon' , exprience_number = '$exprience_number'  , exprience_title = '$exprience_title' WHERE id = $exprience_id";
mysqli_query($db_conntect,$update_query);
header("location: exprience.php");
?>
