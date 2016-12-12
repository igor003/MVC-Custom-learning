<?
$data = $_POST;
$query = " INSERT INTO `terminal_proprietes` (`nr_presetei`,
	                                          `nr_mini`,`sez`,
	                                          `calibrarea_sus`,
	                                          `calibrarea_jos`)
	      VALUES ('".$data['nr_presetei'] ."',
	      	      '".$data['nr_mini'] ."',
	      	      '".$data['sez']."',
	      	      '".$dtat['calibrarea_sus']."',
	      	      '".$data['calibrarea_jos']."'
	      	      )" );
?>
