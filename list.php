<?php
$mydb = mysqli_connect('localhost', 'root','','prilojuha');
$query = "SELECT * FROM `users`";
$user = mysqli_query($mydb,$query);
$return= array();
while($row = mysqli_fetch_assoc($user)){	
	$return[] = select($row['id'],$row['login'],$row['password']);
}
function select($id,$row2,$row3){
	return "
		<tr>
			<td class='id'>".$id."</td>
			<td class='login'>".$row2."</td>
			<td class='password'>".$row3."</td>
			<td class='action'><a href='/delete.php?id=".$id."'><button class='btn btn-danger del'>Delete</button></a> <a href='/update.php'><a href = '/edit.php?id=".$id."'><button class='btn btn-primary'>Update</button></a></td>
		</tr>
	";
	
}


//		$user = mysqli_query($mydb,$query2);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php
	require"heders.php";
	?>
	<style>
		tr{
			

		}

		.action{
			width:200px;
			text-align: center;
		}
		.id{
			width:40px;
			text-align: center;
			
		}
		.password{
			width:100px;
			text-align: center;
		}
		.login{
			width:100px;
			text-align: center;
		}
		.del{
			margin-right:12px;
		}
		
	</style>
</head>
<body>
<a href="/insert.php"><button class="btn btn-success">Добавить пользователя</button></a>
 	<div class="table-responsive"> 
    <table class="table table-bordered">
		<caption><h1>Таблица данных о пользователях</h1></caption>
		<tr>
		<th>ID</th>
		<th>Login</th>
		<th>Password</th>
		<th>Action</th>
		</tr>
		<?php
			foreach($return as $resault){
				echo $resault;
			}
		?>
		
	</table>
	</div>
</body>
</html>