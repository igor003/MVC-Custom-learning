<?php
require '../my_db.php';
$id = $_GET['id'];
$query = "DELETE FROM `users` WHERE id =".$id;
mysqli_query($mydb,$query);
 header('Location:/user/list.php');
?>