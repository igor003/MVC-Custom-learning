<?php
	require '../my_db.php';
?>
   <!DOCTYPE html>
   <html lang="en">
	   <head>
		<meta charset="UTF-8">
		<title>Document</title>
<?php
	require"../heders.php";
	$data = $_POST;
	var_dump($data);
	if(isset($data["btn_insert_submit"])){
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
	}
?>

		   <link rel="stylesheet" href="../css/index.css">
		   <script src="/libs/jquery-1.12.3.js"></script>
   </head>
   <body>
   <div class="form_2">
		<form action="" method="post">
			<div class="form-group">
				<label for="usr">Введите логин</label>
				<input name="login" type="text" class="form-control" id="usr">
			</div>
<!--			<label for="login">Введите логин </label>-->
<!--			<input type="text" name="login" ><br><br>-->
			<div class="form-group">
				<label for="usr">Введите пароль</label>
				<input name="password" type="text" class="form-control" id="usr">
			</div>
<!--			<label for="password">Введите пароль</label>-->
<!--			<input type="text" name="password"><br><br>-->
			<button name="btn_insert_submit" class="btn btn-success" type="submit">Зарегистрироваться</button>
		</form>
	   <br>
   <a href="/user/list.php"><button class="btn btn-info">Таблица пользователей</button></a>
    </div>
	
   </body>
   </html>
   


