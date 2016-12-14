<?php
require 'my_db.php';
$query = "SELECT DISTINCT `Terminal` FROM `table_terminal`";
$sql = mysqli_query($mydb,$query );
$return= array();
while($row = mysqli_fetch_assoc($sql)){
	$return[] = $row['Terminal'];
}
asort($return);


$query2 ="SELECT DISTINCT `nr_presetei` FROM `table_nr_presetei` ORDER BY `nr_presetei`";
$sql2 = mysqli_query($mydb,$query2);
$return2 = array();
while($row2 = mysqli_fetch_assoc($sql2)){
 	 $return2[]= $row2['nr_presetei'];
}


$query1 = "SELECT DISTINCT `nr_mini` FROM `table_nr_mini` ORDER BY nr_mini";
$sql1 = mysqli_query($mydb,$query1);
$return1 = array();
while($row1 = mysqli_fetch_assoc($sql1)){
 	$return1[] = $row1['nr_mini'];
}	


$query3 = "SELECT DISTINCT `sez` FROM `table_sez`";
$sql3 = mysqli_query($mydb,$query3);
$return3 = array();
while($row3 = mysqli_fetch_assoc($sql3)){
	$return3[] = $row3['sez'];
}
asort($return3);

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	
	<?php
	require'heders.php';
	?>
</head>
<body>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class=""><a href="/add_terminal/add_terminal_to_db.php">Add terminal</a></li>
        <li><a href="/add_nr_preseta/add_nr_presetei_to_db.php">Add nr presetei</a></li>
        <li><a href="/add_nr_mini/add_nr_mini_to_db.php">Add nr mini</a></li>
        <li><a href="/add_sez/add_sez_to_db.php">Add sez</a></li>
	  </ul>
	</div>
  </div>
</nav>

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3 ">
				<form action="insert_in_db_table.php" method="post">
					<div class="form-group">
						<label for="sel1">Terminal:</label>
					    <select name="terminal" class="form-control" id="sel1">
					    	<option value="" selected disabled ></option>
						    <?php
								foreach($return as $resault){
									echo"<option value=".$resault.">".$resault."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="sel1">Preseta:</label>
					    <select name="preseta" class="form-control" id="sel1">
					    	<option value="" selected disabled ></option>
						    <?php
								foreach($return2 as $resault){
									echo"<option value=".$resault.">".$resault."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="sel1">Mini:</label>
					    <select name="mini" class="form-control" id="sel1">
					    	<option value="" selected disabled ></option>
						    <?php
								foreach($return1 as $resault){
									echo"<option value=".$resault.">".$resault."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
						<label for="sel1">Sez:</label>
					    <select name="sez" class="form-control" id="sel1">
					    	<option value="" selected disabled ></option>
						    <?php
								foreach($return3 as $resault){
									echo"<option value=".$resault.">".$resault."</option>";
								}
							?>
						</select>
					</div>
					<div class="form-group">
	  					<label for="usr">Calibrarea sus:</label>
	 					 <input name="calibrarea_sus" type="text" class="form-control" id="usr">
					</div>
					<div class="form-group">
	  					<label for="usr">Calibrarea jos:</label>
	 					 <input name="calibrarea_jos" type="text" class="form-control" id="usr">
					</div>
					<input class="btn  btn-warning" type="submit">
				</form>
			</div>
		</div>
	</div>
	
</body>
</html>