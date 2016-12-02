<?php
require 'my_db.php';
$id = $_GET['id'];
//$mydb = mysqli_connect('localhost', 'root','','prilojuha');
$query = "DELETE FROM `users` WHERE id =".$id;
mysqli_query($mydb,$query);
 header('Location: /list.php');
?>
