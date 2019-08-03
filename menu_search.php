<?php
    include 'funcphp/lg_chk.php';
?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>

	<html xmlns='http://www.w3.org/1999/xhtml'>
 
   <head>
    <link rel='shortcut icon' type='image/x-icon' href='img_repo/icon_crud.png' />
    <link rel='stylesheet' type='text/css' href='css/style.css'/>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
    <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
    <script type="text/javascript" src="js/main.js"></script>  
    <title> Pontocom Informática </title>
   </head>
  
	<body>
		<div class='container'>
			<div class='box tbbox tbbox2'>
				<h1 class='t1'>Painel de administração</h1>
				<div>
					<h1 class="t1 tTitulo">Lista de pedidos</h1>
				</div>
				<?php include 'modules/menu_lateral.php'; ?>
				<div class="content">
					<input class='inStd inSrc' type='text' id='camp_busca' placeholder="Pesquisar...">
					<?php
                    if (isset($_SESSION['pedidocriado'])) {
                        echo "<div class='container aceitobox'>
							<h1 id='logevento' class='logerror'> Pedido criado! </h1>
							</div>";
                        unset($_SESSION['pedidocriado']);
                    }
                    if (isset($_SESSION['pedidoatualizado'])) {
                        echo "<div class='container aceitobox'>
							<h1 id='logevento' class='logerror'> Pedido atualizado! </h1>
							</div>";
                        unset($_SESSION['pedidoatualizado']);
                    }
                    if (isset($_SESSION['pedidodesativado'])) {
                        echo "<div class='container errorbox'>
							<h1 id='logevento' class='logerror'> Pedido desativado! </h1>
							</div>";
                        unset($_SESSION['pedidodesativado']);
                    }
                    ?>
				<div class='tab_scrl'>
					<table id="tabelaResultado" class="tabRes">
						<tr><th>ID</th><th>Cliente</th><th>Consultar</th><th>Excluir</th></tr><br/>
				<?php
                include 'funcphp/conn.php';
                $sql = "SELECT * FROM pedidos WHERE status='Aberto' ORDER BY id";
                $stmt = $con->prepare($sql);
                $stmt->execute();
                while ($dados = $stmt->fetch()) {
                    echo '<td>'.$dados['id'].'</td>';
                    echo '<td>'.$dados['nm_maq'].'</td>';
                    echo "<td><form method='POST' action='menu_detail.php' id='campos_del'><button class='btn btna' type='submit' name='bt_det' value=".$dados['id'].'>Consultar</button></form></td>';
                    echo "<td><form method='POST' action='funcphp/deletar_pedido.php' id='campos_del'><button class='btn btne' type='submit' name='bt_del' value=".$dados['id'].'>Excluir</button></form></td></tr>';
                }
                ?>
					</table>
				</div>
				</div>
			</div>
		</div>
	</body>
</html>