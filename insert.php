
   <!DOCTYPE html>
   <html lang="en">
   <head>
   	<meta charset="UTF-8">
   	<title>Document</title>
   	<?php
		require"heders.php";   
	?>
   </head>
   <body>
	<form action="" method="post">
		<label for="login">Введите логин </label>
		<input type="text" name="login" ><br><br>
		<label for="password">Введите пароль</label>
		<input type="text" name="password"><br><br>
		<button class="btn btn-success" type="submit">Зарегистрироваться</button>
    </form>
	<a href="/list.php"><button class="btn btn-info">Таблица пользователей</button></a>
   </body>
   </html>
   
<?php

$data = $_POST;

require 'my_db.php';
$errors = array();
if($data["login"] == ""){
	$errors[]="Введите логин!";
}elseif(strlen($data["login"])<'5'){
	$errors[] ="Введёный логин слишком кароткий!";
}
if($data["password" ]== ""){
	$errors[]="Введите пароль!";
}elseif(strlen($data["password"])<'5'){
	$errors[]="Введённый пароль слищком кароткий";
}
if(empty($errors)){
mysqli_query($mydb," INSERT INTO `users` (`login`,`password`)
	                 VALUES ('".$data['login'] ."','".$data['password'] ."')" );
}
if(!empty($errors)){
	echo"<div style='color:red'>".implode("<br>",$errors)."</div>";
}


?>