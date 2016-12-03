


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
					$(".result").css("dispaly","none");
					$(".result").append("<div>Calibrarea sus:" + result.calibrarea_sus + " \t\n Calibrarea jos:" + result.calibrarea_jos+"</div>")
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
		<button type="submit" class=" btn btn-primary ">Отправить</button>
	</form>
    <div class="result ">
    	
    </div>
</body>
</html>
