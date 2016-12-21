<?php
require 'my_db.php';
$get_data = $_GET;
$query = "SELECT *
          FROM `terminal_proprietes`
          WHERE id_primary = '".$get_data['id_']."'";
$data_table = mysqli_query($mydb,$query);
$updated_table  = mysqli_fetch_assoc($data_table);
 


$query = "SELECT * FROM `table_terminal`";
$sql =  mysqli_query($mydb,$query);
$terminals=array();
while($row = mysqli_fetch_assoc($sql)){
	$terminals[] = $row;
}
 


$query = "SELECT * FROM `table_nr_presetei`";
$sql =  mysqli_query($mydb,$query);
while($row1 = mysqli_fetch_assoc($sql)){
	$nr_presetele[] =$row1;
}


$query = "SELECT * FROM `table_nr_mini`";
$sql =  mysqli_query($mydb,$query);
while( $row2 = mysqli_fetch_assoc($sql)){
	$miniapl[] = $row2;
}


$query = "SELECT * FROM `table_sez` ";
$sql =  mysqli_query($mydb,$query);
while($row3 = mysqli_fetch_assoc($sql)){
	$sezs[] = $row3;
}


?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php
require 'heders.php';
	?>
</head>
<body>
	<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class=""><a href="/add_terminal/add_terminal_to_db.php">Adăuga terminal</a></li>
        <li><a href="/add_nr_preseta/add_nr_presetei_to_db.php">Adăuga nr presetei</a></li>
        <li><a href="/add_nr_mini/add_nr_mini_to_db.php">Adăuga nr mini</a></li>
        <li><a href="/add_sez/add_sez_to_db.php">Adăuga sez</a></li>
	  </ul>
	</div>
  </div>
</nav>
	<br>
	<div class="col-xs-6 col-xs-offset-3">
		<form action="/insert_to_table_bd_updated_date.php?id=<?php echo $get_data['id_'] ?>" method="post">
			<div class="form-group">
				<label for="sel1">Terminal:</label>
				<select name="terminal"value="terminal" class="form-control" id="sel1">
					<?php
					foreach( $terminals as $one_terminal	){
						echo"<option value=".$one_terminal['ID']." ". ($updated_table['id_terminal']==$one_terminal['ID'] ? "selected='selected'" : "" ).">".$one_terminal['Terminal']."</option>";
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="sel1">Preseta nr</label>
				<select name="preseta"value="terminal" class="form-control" id="sel1">
					<?php
					foreach( $nr_presetele as $one_nr_presetei	){
						echo"<option value=". $one_nr_presetei['id']." ". ($updated_table['id_nr_presetei']== $one_nr_presetei['id'] ? "selected='selected'" : "" ).">". $one_nr_presetei['nr_presetei']."</option>";
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="sel1">Mini</label>
				<select name="mini"value="terminal" class="form-control" id="sel1">
					<?php

					foreach( $miniapl as $one_nr_mini	){
						echo"<option value=". $one_nr_mini['id']." ". ($updated_table['id_nr_mini'] == $one_nr_mini['id'] ? "selected='selected'" : "" ).">". $one_nr_mini['nr_mini']."</option>";
					}
					?>
				</select>
			</div>
			<div class="form-group">
				<label for="sel1">Sez</label>
				<select name="sez"value="terminal" class="form-control" id="sel1">
					<?php

					foreach( $sezs as $one_sez	){
						echo"<option value=". $one_sez['id']." ". ($updated_table['id_sez'] == $one_sez['id'] ? "selected='selected'" : "" ).">". $one_sez['sez']."</option>";
					}
					?>
				</select>
			</div>
			<div class="input-group">
						   <span class="input-group-addon" id="basic-addon1">Calibrarea sus</span>
						   <input name="updated_calibrarea_sus" type="text" value="<?php echo $updated_table['calibrarea_sus']?>" class="form-control"  aria-describedby="basic-addon1">
						</div>
			<br>
			<div class="input-group">
						   <span class="input-group-addon" id="basic-addon1">Calibrarea jos</span>
						   <input name="updated_calibrarea_jos" type="text" value="<?php echo $updated_table['calibrarea_jos']?>" class="form-control"  aria-describedby="basic-addon1">
						</div>
			<br>
		    <button class="btn btn-primary " type="submit" name="submit_updated_date">Отправить</button>
	    </form>
    </div>
</body>
</html> 