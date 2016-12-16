<?php
require '../my_db.php';
$data = $_POST;
if($data['new_sez'] !==''){
    $query ="INSERT INTO `table_sez` (`sez`)
			 VALUES ('".$data['new_sez']."' )";
    $sql = mysqli_query($mydb, $query);
    header('Location:/option.php');
}else{
    header('Location:/add_sez/add_sez_to_db.php');
}

?>