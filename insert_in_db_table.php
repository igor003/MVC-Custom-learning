<?php
require 'my_db.php';
$data = $_POST;
//var_dump($data);
$query = "SELECT `id` FROM `table_nr_mini` WHERE nr_mini ='".$data['mini']."' ";
$sql = mysqli_query($mydb,$query);
$row = mysqli_fetch_assoc($sql);
//var_dump($row);

$query = "SELECT `id` FROM `table_terminal` WHERE Terminal ='".$data['terminal']."' ";
$sql = mysqli_query($mydb,$query);
$row1 = mysqli_fetch_assoc($sql);
//var_dump($row1);

$query = "SELECT `id` FROM `table_nr_presetei` WHERE nr_presetei ='".$data['preseta']."' ";
$sql = mysqli_query($mydb,$query);
$row2 = mysqli_fetch_assoc($sql);
//var_dump($row2);


$query = "SELECT `id` FROM `table_sez` WHERE sez ='".$data['sez']."' ";
$sql = mysqli_query($mydb,$query);
$row3 = mysqli_fetch_assoc($sql);
//var_dump($row3);

//INSERT

$query = "INSERT INTO terminal_proprietes (`id_nr_mini`,
                                           `id_terminal`,
                                           `id_nr_presetei`,
                                           `id_sez`,
                                           `calibrarea_sus`,
                                           `calibrarea_jos`) 
         VALUES ('".$row['id']."',
                 '".$row1['id']."',
                 '".$row2['id']."',
                 '".$row3['id']."',
                 '".$data['calibrarea_sus']."',
                 '".$data['calibrarea_jos']."')";
$sql = mysqli_query($mydb,$query);
//echo $query;
header('Location:/option.php');


//$query = "INSERT INTO terminal_proprietes (`id_terminal`) VALUES (''".$row1."'')";
//$sql = mysqli_query($mydb,$query);
//
//$query = "INSERT INTO terminal_proprietes (`id_nr_presetei`) VALUES (''".$row2."'')";
//$sql = mysqli_query($mydb,$query);
//
//
//$query = "INSERT INTO terminal_proprietes (`id_sez`) VALUES (''".$row3."'')";
//$sql = mysqli_query($mydb,$query);
//
//
//$query = "INSERT INTO terminal_proprietes (`calibrarea_sus`) VALUES (''".$data['calibrarea_sus']."'')";
//$sql = mysqli_query($mydb,$query);
//
//$query = "INSERT INTO terminal_proprietes (`calibrarea_jos`) VALUES (''".$data['calibrarea_jos']."'')";
//$sql = mysqli_query($mydb,$query);
////header('Location:/option.php');
?>








