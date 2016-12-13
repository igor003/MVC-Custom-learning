<?php
require'../my_db.php';
$data = $_POST;
if($data['new_nr_presetei'] !==''){
    $query ="INSERT INTO `table_nr_mini` (`nr_mini`)
							     VALUES ('".$data['new_nr_mini'] ."' )";
    $sql = mysqli_query($mydb, $query);
    header('Location:/option.php');
}else{
    header('Location:/add_nr_mini/add_nr_mini_to_db.php');
 }

 ?>