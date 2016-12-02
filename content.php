


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<?php
	require'heders.php';
	?>
	<script>
	$(function(){
		$(".form").on("submit",function(){
	        $.ajax({
                url: 'ajax_content.php', // url where to submit the request
                type : "POST", // type of action POST || GET
                dataType : 'json', // data type
                data : $(".form").serialize(), // post data || get data
                success : function(result) {
                    // you can see the result from the console
                    // tab of the developer tools
                   alert(result.calibrarea_sus  + result.calibrarea_jos);
                },
                error: function(xhr, resp, text) {
                    console.log(xhr, resp, text);
                }
            });
			return false;
		})
	});
	</script>
	<script src="jquery.paulund_modal_box.js"></script>
</head>
<body>
	 <a href="list.php"><button class="btn btn-success">Таблица пользователей</button></a>
	 <form class="form" action="content.php" method="post">
	 	<label for="terminal">Terminal</label>
	 	<input type="text" name="terminal">
	 	<label for="terminal">Miniaplicator</label>
	 	<input type="text" name="mini">
	 	<label for="terminal">Nr Presetei</label>
	 	<input type="text" name="preseta">
	 	<label for="terminal">Sez</label>
	 	<input type="text" name="sez">
<!--	 	<button class=" btn btn-primary" type="submit" name="submit">Отправить</button>-->
	 	<button type="submit" class=" btn btn-primary ">Отправить</button>

<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
        <h2>Calirarea sus:<?php echo $a['calibrarea_sus']?></h2><br>
	    <h2>Calirarea jos:<?php echo $a['calibrarea_jos']?></h2>
    </div>
  </div>
</div>
	 
	 </form>
<!--
	 <div class="info">
	 	<h2>Calirarea sus:<?php echo $a['calibrarea_sus']?></h2><br>
	    <h2>Calirarea jos:<?php echo $a['calibrarea_jos']?></h2>
	 </div>
-->
<!--
<?php
	if(isset($data['submit'])){
?>	
	<script>
		alert("Calibrarea sus:<?php echo $a['calibrarea_sus']?>\n\nCalibrarea jos:<?php echo $a['calibrarea_jos']?>");	
	</script>
<?php	
	}
?>
-->
</body>
</html>
