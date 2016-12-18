<?php
require 'my_db.php';
$data = $_POST;
$terminal = $data['ID'];
$query = "INSERT INTO terminal_proprietes (`id_nr_mini`,
                                           `id_terminal`,
                                           `id_nr_presetei`,
                                           `id_sez`,
                                           `calibrarea_sus`,
                                           `calibrarea_jos`) 
         VALUES ('".$data['mini']."',
                 '".$data['terminal']."',
                 '".$data['preseta']."',
                 '".$data['sez']."',
                 '".$data['calibrarea_sus']."',
                 '".$data['calibrarea_jos']."')";

$sql = mysqli_query($mydb,$query);

header('Location:/option.php');
?>








