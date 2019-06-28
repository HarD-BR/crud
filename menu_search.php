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
					<h1 class="t1 tTitulo">Lista de pedidos</h1>
				</div>
				
				<div class="menuL" id="menu_lateral">
					<div class="panelH">
						<img class="HeaderLogo BLK" src="img_repo/logopontocom.png">
						<label class="panelHlabel">Logado como: <?php  echo $_SESSION['usuarioNome'] ?></label>
					<form class="inBLK" method="POST" action="funcphp/lg_out.php">
						<button class='btn btne btnS' type='submit'>SAIR</button>
					</form>
					<button class="btn btnMenu BLK" type="button" onclick="location.href='perfil.php'">Perfil</button>
					<button class="btn btnMenu BLK" type="button" onclick="location.href='cad_ped.php'">Cadastrar pedidos</button>
					<button class="btn btnMenu BLK" type="button" onclick="location.href='menu_search.php'">Lista de pedidos</button>
					<button class="btn btnMenu BLK" type="button" onclick="location.href='menu_inativo.php'">Lista de pedidos inativos</button>
					<button class="btn btnMenu BLK" type="button" onclick="location.href='menu_concluido.php'">Lista de pedidos concluídos</button>
					</div>
				</div>
				<div class="content">
					<input class='inStd inSrc' type='text' id='camp_busca' placeholder="Pesquisar...">
					<?php
					if(isset($_SESSION['pedidocriado'])) {
							echo "<div class='container aceitobox'>
							<h1 class='logerror'> Pedido criado! </h1>
							</div>";
							unset($_SESSION['pedidocriado']);
					} 
					if(isset($_SESSION['pedidoatualizado'])) {
							echo "<div class='container aceitobox'>
							<h1 class='logerror'> Pedido atualizado! </h1>
							</div>";
							unset($_SESSION['pedidoatualizado']);
					}
					if(isset($_SESSION['pedidodeletado'])) {
							echo "<div class='container errorbox'>
							<h1 class='logerror'> Pedido deletado! </h1>
							</div>";
							unset($_SESSION['pedidodeletado']);
					}
					?>
				<div class='tab_scrl'>
					<table id="tabelaResultado" class="tabRes">
						<tr><th>ID</th><th>Cliente</th><th>Consultar</th><th>Excluir</th></tr><br/>
				<?php
				include "funcphp/conn.php";
				$executa = "SELECT * FROM pedidos WHERE status='Aberto' ORDER BY id";
				$query=$con->query($executa);

				while($dados=mysqli_fetch_object($query)){
					echo "<td>" .$dados->id. "</td>";
					echo "<td>" .$dados->nm_maq. "</td>";
					echo "<td><form method='POST' action='menu_detail.php' id='campos_del'><button class='btn btna' type='submit' name='bt_det' value=".$dados->id.">Consultar</button></form></td>";			
					echo "<td><form method='POST' action='funcphp/deletar_pedido.php' id='campos_del'><button class='btn btne' type='submit' name='bt_del' value=".$dados->id.">Excluir</button></form></td></tr>";
				}
				?>
					</table>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>