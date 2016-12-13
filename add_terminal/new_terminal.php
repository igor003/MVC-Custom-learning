<?php
require '../my_db.php';
$data = $_POST;
if($data['new_terminal'] !==''){
    $query ="INSERT INTO `table_terminal` (`Terminal`)
							     VALUES ('".$data['new_terminal'] ."' )";
    $sql = mysqli_query($mydb, $query);
    header('Location:/option.php');
}else{
    header('Location:/add_terminal/add_terminal_to_db.php');
}

?>
