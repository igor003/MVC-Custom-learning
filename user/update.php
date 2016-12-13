<?php
require '../my_db.php';
$id = $_GET['id'];
$data_updated = $_POST;
$_SESSION["errors"] = array();

if(strlen($data_updated['login1']) < "5"){
	$_SESSION["errors"][]="Введён кароткий   логин!";
}
if(strlen($data_updated['password1']) < "5"){
	$_SESSION["errors"][]="Введён кароткий пароль!";
}
if(empty($_SESSION["errors"])){
	
	$query =  "UPDATE `users` SET `login`='".$data_updated['login1']."',`password`='".$data_updated['password1']."' WHERE id =".$id;
    $sql = mysqli_query($mydb,$query );
//	echo $query;
   header('Location: /user/list.php');
	exit;
		
}
 header('Location: /user/edit.php?id='.$id);

?>
