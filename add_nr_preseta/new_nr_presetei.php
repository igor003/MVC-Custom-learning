<?php
require'../my_db.php';
$data = $_POST;
if($data['new_nr_presetei'] !==''){
    $query ="INSERT INTO `table_nr_presetei` (`nr_presetei`)
							     VALUES ('".$data['new_nr_presetei'] ."' )";
    $sql = mysqli_query($mydb, $query);
    header('Location:/option.php');
}else{
    header('Location:/add_nr_presetei/add_nr_presetei_to_db.php');
 }

 ?>