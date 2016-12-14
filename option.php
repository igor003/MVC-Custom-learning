<?php
require '/my_db.php';
$query = "SELECT DISTINCT `Terminal` FROM `table_terminal`;";
$sql = mysqli_query($mydb,$query );
$return= array();
while($row = mysqli_fetch_assoc($sql)){
	$return[] = $row['Terminal'];
}
asort($return);


$query1 = "SELECT DISTINCT `nr_mini` FROM `table_nr_mini` ORDER BY nr_mini;";
$sql1 = mysqli_query($mydb,$query1);
$return1 = array();
while($row1 = mysqli_fetch_assoc($sql1)){
 	$return1[] = $row1['nr_mini'];
}	





 $query2 ="SELECT DISTINCT `nr_presetei` FROM `table_nr_presetei` ORDER BY `nr_presetei`;";
$sql2 = mysqli_query($mydb,$query2);;
$return2 = array();
while($row2 = mysqli_fetch_assoc($sql2)){
 	 $return2[]= $row2['nr_presetei'];
}



$query3 = "SELECT DISTINCT `sez` FROM `table_sez`;";
$sql3 = mysqli_query($mydb,$query3);
$return3 = array();
while($row3 = mysqli_fetch_assoc($sql3)){
	$return3[] = $row3['sez'];
}
asort($return3);



$data_option = $_POST;
$query = "SELECT tp.calibrarea_sus , tp.calibrarea_jos 
         FROM `terminal_proprietes` tp  INNER JOIN table_terminal tt ON tp.id_terminal = tt.id 
         							    INNER JOIN table_nr_presetei tn ON tp.id_nr_presetei = tn.id
         							    INNER JOIN table_nr_mini tm ON tp.id_nr_mini = tm.id 
         							    INNER JOIN table_sez ts ON tp.id_sez = ts.sez
										WHERE tn.nr_presetei = '".$data_option['nr_presetei']."' 
										AND tm.nr_mini ='".$data_option['mini']."' 
										AND ts.sez = '".$data_option['sez']."' 
										AND tt.terminal = '".$data_option['terminal']."'" ;
$calibrarea = mysqli_query($mydb,$query);
$b = mysqli_fetch_assoc($calibrarea);


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>'
	<?php
	require"/heders.php";
	?>
	<script>
		$(".btn-primary").on('click',function(){
			$(".result_2").show;
		})
	</script>
</head>
<body>
<a href="user/list.php">
	<button class="btn btn-success">
		 Пользователи
	</button>
</a>
<a href="/database_table.php">
	<button class="btn btn-info">
		База данных
	</button>
</a>
<div class="form">
	<form action="" method="post">
		<div class="form-group">
			<label for="sel1">Terminal:</label>
		    <select name="terminal"value="terminal" class="form-control" id="sel1">
		    	<option value="" selected disabled ></option>
			    <?php
					foreach($return as $resault){
						echo"<option value=".$resault.">".$resault."</option>";
					}
				?>
			</select>
		</div>

		<div class="form-group">
			<label for="sel2">Mini:</label>
		    <select name="mini"class="form-control" id="sel2">
		    	<option value="" selected disabled ></option>
			    <?php
					foreach($return1 as $resault){
						echo"<option value=".$resault.">".$resault."</option>";
					}
				?>
			</select>
		</div>
	
		<div class="form-group">
			<label for="sel3">Preseta nr:</label>
		    <select name="nr_presetei"class="form-control" id="sel3">
		    	<option value="" selected disabled ></option>
			    <?php
					foreach($return2 as $resault){
						echo"<option value=".$resault.">".$resault."</option>";
					}
				?>
			</select>
		</div>
		<div class="form-group">
			<label for="sel4">Sez:</label>
		    <select name="sez"class="form-control" id="sel4">
		    	<option value="" selected disabled ></option>
			    <?php
					foreach($return3 as $resault){
						echo"<option value=".$resault.">".$resault."</option>";
					}
				?>
			</select>
		</div>
	<button class="btn btn-primary " type="submit" name="submit_option">Отправить</button>
</form>
</div>
<?php
	if($b){
?>
<div class="result">
	Calibrarea sus: <?=$b['calibrarea_sus']?>
	Calibrarea jos: <?=$b['calibrarea_jos']?>
</div>
<?php
	}else{
?>
	<div class="result_2">
		Форма заполнена неверно!!!
	</div>
<?php
	}
?>
</body>
</html>