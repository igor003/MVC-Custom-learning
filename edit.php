<?php
$data = $_GET["id"];
require 'my_db.php';

$query = "SELECT `login`,`password` FROM `users` WHERE id =".$data;
$user = mysqli_query($mydb,$query);
$updated_user = mysqli_fetch_assoc($user);
 if($_SESSION["errors"]){
	 echo "<div style='color:red'>".implode('<br>',$_SESSION["errors"])."</div>";
 }
//print_r ($_SESSION);
?>
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
   		<form action="/update.php?id=<?php echo $data?>"method="post">
			<label for="login1">Логин</label>
			<input type="text" name="login1" value="<?php echo $updated_user['login']?>"><br><br>
			<label for="password1">Пароль</label>
			<input type="text" name="password1" value="<?php echo $updated_user['password']?>"><br><br>
			<button class="btn btn-success" type="submit" name="submit_bt">Зарегистрировать</button>	
        </form>
    </body>
   </html>
    

