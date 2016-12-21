<?php
require 'my_db.php';
$query = "SELECT *
          FROM `terminal_proprietes` tp 
          INNER JOIN table_terminal tt ON tp.id_terminal = tt.id 
          INNER JOIN table_nr_presetei tn ON tp.id_nr_presetei = tn.id 
          INNER JOIN table_nr_mini tm ON tp.id_nr_mini = tm.id
          INNER JOIN table_sez ts ON tp.id_sez = ts.id
          ";
$user = mysqli_query($mydb,$query);
$return= array();

while($row = mysqli_fetch_assoc($user)){	
	$return[] = select($row['id_primary'],
		               $row['Terminal'],
		               $row['nr_presetei'],
		               $row['nr_mini'],
		               $row['sez'],
		               $row['calibrarea_sus'],
	                   $row['calibrarea_jos']);
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
			<td class='action'>
				<a href='edit_database_table.php?id =".$id."'>
			        <button class='btn btn-info'>Update</button>
               </a><a href='delete_db.php?id=".$id."'>
			        <button class='btn btn-warning'>Delete</button>
			    </a>
			</td>
		</tr>
	";
	
};

$search = $_POST['search'];

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
		.search{
			/*position:absolute;
			top:10px;
			right:140px;*/
		}
		
	</style>
</head>
<body>
	<div class="row search">
		<div class="col-xs-4">
			<a href="/option.php"<button class="btn btn-warning btn-md"><span class="glyphicon glyphicon-arrow-left"></span></button></a>
			<a href="/add_to_db.php"><button class='btn btn-warnung'>Adăuga înregistrare </button></a>
		</div>
		<div class="col-xs-4 col-xs-offset-4">

			<form method="post" action="search.php" class="navbar-form navbar-left">
		        <div class="form-group">
		          <input name="search" type="text" class="form-control" placeholder="Search terminal">
		        </div>
		        <button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>


 	<div class="table-responsive"> 
    <table class="table table-bordered">
		<caption><h1>Bază de date</h1></caption>
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
