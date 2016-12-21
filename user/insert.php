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
	if(isset($data["btn_insert_submit"])){
		$errors = array();
		if($data["login"] == ""){
			$errors[]="Introduceti loginul!";
		}elseif(strlen($data["login"])<'5'){
			$errors[] ="Loginul introdus este pre scurt!";
		}
		if($data["password" ]== ""){
			$errors[]="introduceti parola!";
		}elseif(strlen($data["password"])<'5'){
			$errors[]="Parola introdusa este pre scurta!";
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
				<label for="usr">Introduceti loginul</label>
				<input name="login" type="text" class="form-control" id="usr">
			</div>
			<div class="form-group">
				<label for="usr">Introduceti parola</label>
				<input name="password" type="text" class="form-control" id="usr">
			</div>
			<button name="btn_insert_submit" class="btn btn-success" type="submit">
Înregistrează-te</button>
		</form>
	   <br>
   <a href="/user/list.php"><button class="btn btn-info">Utilizatori</button></a>
    </div>
	
   </body>
   </html>
   


