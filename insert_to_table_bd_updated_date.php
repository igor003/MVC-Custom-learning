<?php
require 'my_db.php';
$data = $_POST;
$get_data = $_GET;
$query =  "UPDATE `terminal_proprietes` SET `id_terminal` = '".$data['terminal']."',
                                            `id_nr_mini` = '".$data['mini']."',
                                            `id_nr_presetei` = '".$data['preseta']."',
                                            `id_sez` = '".$data['sez']."',
                                             `calibrarea_sus` = '".$data['updated_calibrarea_sus']."',
                                             `calibrarea_jos` = '".$data['updated_calibrarea_jos']."'
                                             WHERE id_primary ='".$get_data['id']."'";
$sql = mysqli_query($mydb,$query );
header('Location: /database_table.php');
?>