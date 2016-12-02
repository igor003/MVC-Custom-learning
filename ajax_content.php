<?php
require 'my_db.php';
$data = $_POST;

$query = "SELECT tp.calibrarea_sus , tp.calibrarea_jos FROM `terminal_proprietes` tp INNER JOIN table_terminal tt ON tp.id_terminal = tt.id WHERE tp.nr_presetei = '".$data['preseta']."' AND tp.nr_mini ='".$data['mini']."' AND tp.sez = '".$data['sez']."' AND tt.terminal = '".$data['terminal']."'" ;
$calibrarea = mysqli_query($mydb,$query);
$a = mysqli_fetch_assoc($calibrarea);
echo json_encode($a);


