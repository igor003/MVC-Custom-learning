<?php
require 'my_db.php';
$search = $_POST['search'];
$query="SELECT * FROM `table_terminal` WHERE `Terminal` = '".$search."'";
             
$sql =  mysqli_query($mydb,$query);  
$row = mysqli_fetch_assoc($sql);

$query = "SELECT *
          FROM `terminal_proprietes` tp 
          INNER JOIN table_terminal tt ON tp.id_terminal = tt.id 
          INNER JOIN table_nr_presetei tn ON tp.id_nr_presetei = tn.id 
          INNER JOIN table_nr_mini tm ON tp.id_nr_mini = tm.id
          INNER JOIN table_sez ts ON tp.id_sez = ts.id
          WHERE `id_terminal` = '".$row['ID']."'";
          $sql =  mysqli_query($mydb,$query);  
         
        while($result = mysqli_fetch_assoc($sql)){	
		$return[] = select($result['id_primary'],
			               $result['Terminal'],
			               $result['nr_presetei'],
			               $result['nr_mini'],
			               $result['sez'],
			               $result['calibrarea_sus'],
		                   $result['calibrarea_jos']);
	};
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
		</tr>
	";
	
};
	?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php require'heders.php';?>
</head>
<body>
	<div class="container">
		<div class="row">
			  <table class="table table-bordered">
		<caption><h1>Resultatul cautarii</h1></caption>
		<tr>
		<th>ID</th>
		<th>Terminal</th>
		<th>Nr presetei</th>
		<th>Nr mini</th>	
		<th>Sez</th>
		<th>Calibrarea sus</th>
		<th>Calibrarea jos</th>
		</tr>
		<?php
			foreach($return as $resault){
				echo $resault;
			}
		?>
		
	</table>
		</div>
	</div>
	<a href="database_table.php">
			<button class="btn btn-primary"> Inapoi</button>
	</a>

</body>
</html>