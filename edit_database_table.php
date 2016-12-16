<?php
require 'my_db.php';
$get_data = $_GET;
$query = "SELECT *
          FROM `terminal_proprietes`
          WHERE id_primary = '".$get_data['id_']."'";
$data_table = mysqli_query($mydb,$query);
$updated_table  = mysqli_fetch_assoc($data_table);
 


$query = "SELECT * FROM `table_terminal` 
          WHERE ID ='".$updated_table['id_terminal']."'";
$sql =  mysqli_query($mydb,$query);
$terminal = mysqli_fetch_assoc($sql);
 


$query = "SELECT * FROM `table_nr_presetei` 
          WHERE id ='".$updated_table['id_nr_presetei']."'";
$sql =  mysqli_query($mydb,$query);
$nr_presetei = mysqli_fetch_assoc($sql);


$query = "SELECT * FROM `table_nr_mini` 
          WHERE id ='".$updated_table['id_nr_mini']."'";
$sql =  mysqli_query($mydb,$query);
$nr_mini = mysqli_fetch_assoc($sql);


$query = "SELECT * FROM `table_sez` 
          WHERE id ='".$updated_table['id_sez']."'";
$sql =  mysqli_query($mydb,$query);
$sez = mysqli_fetch_assoc($sql);


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
	<br>
	<br>
	<br>

	<div class="col-xs-6 col-xs-offset-3">
		<form action="/insert_to_table_bd_updated_date.php" method="post">
			<div class="input-group">
  				<span class="input-group-addon" id="basic-addon1">Terminal</span>
  				<input name="udated_terminal" type="text" value ="<?php echo $terminal['Terminal']?>" class="form-control" aria-describedby="basic-addon1">
			</div>
<br>

			<div class="input-group">
				<span class="input-group-addon" id="basic-addon1">Preseta nr</span>
				<input name="updated_nr_preseta" type="text" value="<?php echo $nr_presetei['nr_presetei']?>" class="form-control"  aria-describedby="basic-addon1">
			</div>
<br>
		
			<div class="input-group">
			   <span class="input-group-addon" id="basic-addon1">Mini</span>
			   <input name="updated_nr_mini" type="text" value="<?php echo $nr_mini['nr_mini'] ?>" class="form-control"  aria-describedby="basic-addon1">
            </div>
<br>
			<div class="input-group">
			   <span class="input-group-addon" id="basic-addon1">Sez</span>
			   <input name="updated_sez" type="text" value="<?php echo $sez['sez']?>" class="form-control"  aria-describedby="basic-addon1">
			</div>
<br>
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