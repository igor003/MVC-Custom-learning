<?php
$data = $_GET["id"];
require '../my_db.php';

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
		require"../heders.php";
	?>
        <link rel="stylesheet" href="/css/index.css">
    </head>
    <body>
   		<form action="/user/update.php?id=<?php echo $data?>"method="post">
            <div class="col-xs-4 col-xs-offset-4">
                <div class="form-group">
                    <label for="usr">Логин</label>
                    <input value="<?php echo $updated_user['login']?>" name="login1" type="text" class="form-control" id="usr">
                </div>
                <div class="form-group">
                    <label for="usr">Пароль</label>
                    <input value="<?php echo $updated_user['password']?>" name="password1" type="text" class="form-control" id="usr">
                </div>
                <button class="btn btn-success" type="submit" name="submit_bt">Зарегистрировать</button>
            </div>
        </form>
    </body>
   </html>
    

