<?php
	require 'my_db.php';
	$data = $_POST;
	$errors = array();
$errors2 = array();
	if(isset($data["btn_reg"])){
	//	echo(strlen($data["pass_1"]));

		if($data["log_1"] == ""){
			$errors[] = "Introduceti login !";
		}elseif( strlen($data["log_1"]) < '5' ){
			$errors[] = "Loginul introdus este pre scurt !";
		}
			
			$_SESSION['current_user'] = $data["log_1"];
		
		if($data["pass_1"] == ""){
			$errors[] = "Introduceti parola!";
		}elseif( strlen($data["pass_1"]) < '5' ){
			$errors[] = "Parola introdusa este pre scurta !";
		}
		if(empty($errors)){
			$query = "SELECT users.login FROM users WHERE login ='".$data["log_1"]. "'";
			$user = mysqli_query($mydb,$query);
			$row = mysqli_fetch_assoc($user);
			if(isset($row)){

				global $errors;
				$errors[] =" Utilizator cu asa login este inregistrat !";
			}else{
				mysqli_query($mydb,
				" INSERT INTO `users` (`login`,`password`) VALUES ('".$data['log_1'] ."','".$data['pass_1'] ."')" );
				$errors2[] = "Ați înregistrat cu succes ";
			}
		}else{
//		echo '<div style="color: red;">'.var_dump($errors).'</div>';
//			echo"<script>message('".array_shift($errors)."', 'error')</script>";

		}
	}

	if(isset($data["btn_log"])){
	//	$errors = array();
		if($data["log_2"] == ""){
			
			$errors[] = "Introduceti login !";
		}elseif($data["pass_2"] == ""){
			
			$errors[] = "Introduceti parola !";
		}if( strlen($data["pass_2"]) < '5' ){
			
			$errors[] = "parola introdusa este prea scurta !";
		}
		if(empty($errors)){
			$query = "SELECT users.login, users.password FROM users WHERE login ='".$data["log_2"]. "' AND password ='".$data["pass_2"]. "'";
			$user = mysqli_query($mydb,$query);
			$row = mysqli_fetch_assoc($user);
			if(isset($row)){
				$_SESSION['logged_user'] = $row;
				header('Location: option.php');
			}else{
				 $errors[] = "Nu casca gura !";
			}
		}

    }
?>
<!DOCTYPE html>
<html lang="en">
<head>

	<meta charset="UTF-8">
	<title>Document</title>
	<?php require'heders.php'?>

	<script>
		$(function(){
            $(".btn_1 ").on("click", function(){
               if ($(".form_reg").is(":visible")){
				   $(".form_reg").slideUp();
				   $(".btn_2").removeAttr("disabled")
				    
				} else {
				$(".form_reg").slideDown();
				$(".btn_2").attr("disabled","disabled");
				}
              
           })       
        })
		$(function(){
            $(".btn_2 ").on("click", function(){
               if ($(".form_log").is(":visible")){
				   $(".form_log").slideUp();
				   $(".btn_1").removeAttr("disabled");
				    
				} else {
				$(".form_log").slideDown();
				$(".btn_1").attr("disabled","disabled");
				}
              
           })       
        })

		function message(mesage, type) {
			console.log(mesage);
            var timeout = 2000;
            var div = document.createElement('div');
			  
            switch (type) {
                case 'succes':
                    div.className = "success";
                    break;
                case 'info':
                     div.className = "info";
                    break;
                case 'warning':
                     div.className = "warning";
                    break;
                case 'error':
                     div.className = "error";
                    break;
            };
            div.innerHTML = mesage;
            var rightBlock = $(".right-block");
            console.log(rightBlock);
            rightBlock.append(div);
            setTimeout(function(){
                $(div).slideUp( 1500 , function(){
                      $(div).remove();
                });
		    }, timeout);
        };
        <?php
		
		if(!empty($errors)){?>
		
			$( function(){
				message('<?php echo implode("<br>",$errors) ?>', "error");
			});
		<?php
		}
		?>
		 <?php
		
		if(!empty($errors2)){?>
		
			$( function(){
				message('<?php echo implode("<br>",$errors2) ?>', "succes");
			});
		<?php
		}
		?>
            
                
        
</script>

</head>
<body>
<div class="right-block">

    </div>
   
	<div class="buttons">
		<button class="btn btn-primary btn_1">Зарегистрироваться</button>
		<button class=" btn btn-primary btn_2">Войти</button>
	</div>
	<div class="form_reg">
		<div class="col-xs-4 col-xs-offset-4">
			<form action="" method="post">
				<div class="form-group">
  					<label for="usr">Introduceti loginul</label>
 					 <input type="text" name="log_1"class="form-control" id="usr">
				</div>
				<div class="form-group">
  					<label for="usr">Introduceti parola</label>
 					 <input type="password" name="pass_1" class="form-control" id="usr">
				</div>	
				<button class=" btn btn-success " type="submit" name="btn_reg">Submit</button>
			</form>
		</div>
	</div>
	<div class="form_log">
		<div class="col-xs-4 col-xs-offset-4">
			<form action="" method="post">
				<div class="form-group">
					<label for="usr">Introducrti login</label>
					 <input type="text" name="log_2" class="form-control" id="usr">
				</div>	
				<div class="form-group">
					<label for="usr">Introduceti parola</label>
					 <input type="password" name="pass_2" class="form-control" id="usr">
				</div>	
				<!-- <label for="log_2">Введите логин</label>
				<input type="text" name="log_2"><br>
				<label for="pass_2">Введите пароль</label>
				<input type="password" name="pass_2"><br> -->
				<button class=" btn btn-primary " type="submit" name="btn_log">Intra</button>
			</form>
		</div>
	</div>
   
</body>

</html>
	

