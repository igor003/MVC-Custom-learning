<?php
require 'my_db.php';
$query = "SELECT DISTINCT `Terminal` FROM `table_terminal`;";
$sql = mysqli_query($mydb,$query );
$a = mysqli_fetch_assoc($sql);
//var_dump($a) ;
$return= array();
while($row = mysqli_fetch_assoc($sql)){
 $return[] = "<option value='".$row['Terminal']."'>".$row['Terminal']."</option>";
}


$query1 = "SELECT DISTINCT `nr_mini` FROM `terminal_proprietes`;";
$sql1 = mysqli_query($mydb,$query1);
$a1 = mysqli_fetch_assoc($sql1);
$return1 = array();
//var_dump($return1);
while($row1 = mysqli_fetch_assoc($sql1)){
 	$return1[] = $row1['nr_mini'];
}	
asort($return1, SORT_NUMERIC );
	



$query2 = "SELECT DISTINCT `nr_presetei` FROM `terminal_proprietes`;";
$sql2 = mysqli_query($mydb,$query2);
$a2 = mysqli_fetch_assoc($sql2);
$return2 = array();
//var_dump($return1);
while($row2 = mysqli_fetch_assoc($sql2)){
 	$return2[] = $row2['nr_presetei'];
}
asort($return2, SORT_NUMERIC );



$query3 = "SELECT DISTINCT `sez` FROM `terminal_proprietes`;";
$sql3 = mysqli_query($mydb,$query3);
$a3 = mysqli_fetch_assoc($sql3);
$return3 = array();
//var_dump($return1);
while($row3 = mysqli_fetch_assoc($sql3)){
 	$return3[] = $row3['sez'];
}
asort($return3);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>'
	<?php
	require"heders.php";
	?>
	<style>
		form{
			width:200px;
			margin:auto;
			text-align:center;
		}
		option{
			margin-left:50%;
		}
	
	</style>
</head>
<body>
<form action="content.php" method="post">
<label for="terminal">Terminal</label>
	<select name="terminal" id="" value="Terminal">
	<option value="" selected disabled></option>
		<?php
			foreach($return as $resault){
				echo"<option value=".$resault.">".$resault."</option>";
			}
		?>
	</select><br>
	<label for="mini">Mini</label>
	<select name="mini" id="">
	<option value="" selected disabled></option>
		<?php
			foreach($return1 as $resault){
				echo"<option value=".$resault.">".$resault."</option>";
			}
		?>
	</select><br>
	<label for="nr_presetei">Preseta nr</label>
	<select name="nr_presetei" id="">
	<option value="" selected disabled></option>
		<?php
			foreach($return2 as $resault){
				echo"<option value=".$resault.">".$resault."</option>";
			}
		?>
	</select><br>
	<label for="sez">Sez</label>
	<select name="sez" id="">
<!--	<option value="" selected></option>-->
		<?php
			foreach($return3 as $resault){
				echo"<option value=".$resault.">".$resault."</option>";
			}
		?>
	</select><br>
	<button class="btn btn-primary " type="submit">Отправить</button>
	
</form>
</body>
</html>