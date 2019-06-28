<?php
	session_start();
	include 'funcphp/lg_ses.php';

?>

	<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>

	<html xmlns='http://www.w3.org/1999/xhtml'>
 
   <head>
   	<link rel='shortcut icon' type='image/x-icon' href='logopontocom.png' />
    <link rel='stylesheet' type='text/css' href='css/style.css'/>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <style type='text/css'>
    </style>
     <title> Pontocom Informática </title>
   </head>
  
	<body>

	
		<div class='container martop'>
		<div class='lgbox'>
			<h1 class='t1'> Pontocom Informática </h1>
			<div>
			<form action='funcphp/lg.php' method='POST'>
			<div class='lgbox lgbox2'>
			<input class='inStd inLg imgu' type='text' id='user_txt' name='user_txt' placeholder='| Usuário'> 
			<input class='inStd inLg imgp' type='password' id='pass_txt' name='pass_txt' placeholder='| Senha'>
			</div>
			<?php 
				if (isset($_SESSION['nao_login'])) {
					echo "<div class='container errorbox'>
							<h1 class='logerror'> Usuário ou senha não encontrado! </h1>
					</div>";
				}else{
				
				}
			?>
			<button class='btn btnl' type='submit'>Entrar</button> 
			</form>
			</div>
		</div>
		</div>
	</body>
</html>