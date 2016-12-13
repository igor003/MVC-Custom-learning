<?php
require 'my_db.php';
$query = "SELECT *
          FROM `terminal_proprietes` tp 
          INNER JOIN table_terminal tt ON tp.id_terminal = tt.id 
          INNER JOIN table_nr_presetei tn ON tp.id_nr_presetei = tn.id 
          INNER JOIN table_nr_mini tm ON tp.id_nr_mini = tm.id";
$user = mysqli_query($mydb,$query);
$return= array();
while($row = mysqli_fetch_assoc($user)){	
	$return[] = select($row['id'],
		               $row['Terminal'],
		               $row['nr_presetei'],
		               $row['nr_mini'],
		               $row['sez'],
		               $row['calibrarea_sus'],
	                   $row['calibrarea_jos']);
}
function select($id,$row2,$row3,$row4,$row5,$row6,$row7){
	return "
		<tr>
			<td class='id'>".$id."</td>
			<td class='terminal'>".$row2."</td>
			<td class='nr_presetei'>".$row3."</td>
			<td class='nr_mini'>".$row4."</td>
			<td class='sez'>".$row5."</td>
			<td class='calibrarea_sus'>".$row6."</td>
			<td class='Calibrarea_jos'>".$row7."</td>
			<td class='action'>
				<a href='update_db.php?id =".$id."'>
			        <button class='btn btn-info'>Update</button>
               </a><a href='delete_db.php?id=".$id."'>
			        <button class='btn btn-warning'>Delete</button>
			    </a>
			</td>
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

<a href="/option.php"<button class="btn btn-warning">На главную</button></a>
<a href="/add_to_db.php"><button class='btn btn-warnung'>Добавить запись </button></a>
 	<div class="table-responsive"> 
    <table class="table table-bordered">
		<caption><h1>База данных</h1></caption>
		<tr>
		<th>ID</th>
		<th>Terminal</th>
		<th>Nr presetei</th>
		<th>Nr mini</th>	
		<th>Sez</th>
		<th>Calibrarea sus</th>
		<th>Calibrarea jos</th>
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
