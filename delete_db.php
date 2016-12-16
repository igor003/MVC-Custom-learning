<?php
require '/my_db.php';
$id = $_GET['id'];
$query = "DELETE FROM `terminal_proprietes` WHERE id_primary =".$id;
mysqli_query($mydb,$query);
 header('Location:/database_table.php');
?>