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
	<div class="form_add_db">
		<form action="">
			<label for="terminal">Terminal</label>
			<input name="terminal" type="text"><br>
			<label for="nr_mini">Mini</label>
			<input name="nr_mini" type="text"><br>
			<label for="nr_presetei">Preseta</label>
			<input name="nr_presetei" type="text"><br>
			<label for="sez">Sez</label>
			<input name="sez" type="text"><br>
			<label for="calib_sus">Calibrarea sus</label>
			<input name='calib_sus' type="text"><br>
			<label for="calib_jos">Calibrarea jos</label>
			<input name='calib_jos' type="text"><br>
			<button class="btn btn-warning" type='submit'>Отправить</button>
		</form>
	</div>
</body>
</html>