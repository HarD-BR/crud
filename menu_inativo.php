<?php 	
	include "funcphp/lg_chk.php";
?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>

	<html xmlns='http://www.w3.org/1999/xhtml'>
 
   <head>
    <link rel='shortcut icon' type='image/x-icon' href='logopontocom.png' />
    <link rel='stylesheet' type='text/css' href='css/style.css'/>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script type="text/javascript" src="js/main.js"></script>  
    <title> Pontocom Informática </title>
   </head>
  
	<body>
		<div class='container'>
			<div class='box tbbox tbbox2'>
				<h1 class='t1'> Painel de administração | Pontocom Informática </h1>
				<div>
					<h1 class="t1 tTitulo">Lista de pedidos inativos</h1>
				</div>
				<?php include "menu_lateral.php"; ?>
				<div class="content">
					<input class='inStd inSrc' type='text' id='camp_busca' placeholder="Pesquisar...">
				<div class='tab_scrl'>
					<table id="tabelaResultado" class="tabRes">
						<tr><th>ID</th><th>Cliente</th><th>Consultar</th></tr><br/>
				<?php
				include "funcphp/conn.php";
				$executa = "SELECT * FROM pedidos WHERE status='Inativo' ORDER BY id";
				$query=$con->query($executa);

				while($dados=mysqli_fetch_object($query)){
					echo "<td>" .$dados->id. "</td>";
					echo "<td>" .$dados->nm_maq. "</td>";
					echo "<td><form method='POST' action='menu_detail_inativo.php' id='campos_del'><button class='btn btna' type='submit' name='bt_det' value=".$dados->id.">Consultar</button></form></td></tr>";
				}
				?>
					</table>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>