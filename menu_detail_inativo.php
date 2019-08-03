<?php
    include 'funcphp/lg_chk.php';
    include 'funcphp/conn.php';

    $sql = 'SELECT pedidos.*, usuario.usuario FROM pedidos INNER JOIN usuario ON usuario.id_usuario=pedidos.fk_id_usuario WHERE id= :IDPED';

    $stmt = $con->prepare($sql);
    $stmt->bindParam(':IDPED', $ped_id);

    $ped_id = $_POST['bt_det'];

    $stmt->execute();
    $dados = $stmt->fetch();

?>
<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>

	<html xmlns='http://www.w3.org/1999/xhtml'>
 
   <head>
    <link rel='shortcut icon' type='image/x-icon' href='img_repo/icon_crud.png' />
    <link rel='stylesheet' type='text/css' href='css/style.css'/>
    <meta http-equiv='Content-Type' content='text/html; charset=utf-8'/>
  	<script type="text/javascript" src="js/main.js"></script>  
    <title> Pontocom Informática </title>
   </head>
  
	<body>
		<div class='container'>
			<div class='box tbbox'>
				<h1 class='t1'> Painel de administração</h1>
				<div>
					<input class="inStd inTo" type="text" readonly value=" <?php echo $dados['nm_maq'],'-', $dados['nm_cliente']; ?> - Inativo">
				</div>
				<?php include 'modules/menu_lateral.php'; ?>
				<div class="content">
					<div class="">
						<div class='coluna'>
							<div class="lbTx inTx">
								<label>ID: <?php echo $dados['id']; ?></label>
							</div>
							<div class="lbTx inTx">
								<label>Cliente: <?php echo $dados['nm_cliente']; ?></label>
							</div>
							<div class="lbTx inTx">
								<label>Máquina: <?php echo $dados['nm_maq']; ?></label>
							</div>					
						</div>
						<div class='coluna'>
							<div class="lbTx inTx">
								<label>Data de entrada: <?php echo date('d/m/Y', strtotime($dados['dt_ent'])); ?></label>
							</div>
							<div class="lbTx inTx">
								<label>Data de saída(previsão): <?php echo date('d/m/Y', strtotime($dados['dt_sai'])); ?></label>
							</div>
							<div class="lbTx inTx">
								<label>Valor do serviço: R$<?php echo $dados['vl_serv']; ?></label>
							</div>					
						</div>
						<div class='coluna'>
							<div class="lbTx inTx">
								<label>Status: <?php echo $dados['status']; ?></label>
							</div>
							<div class="lbTx inTx">
								<label>Situação: <?php echo $dados['situacao']; ?></label>
							</div>
							<div class="lbTx inTx">
								<label>Cadastrado por: <?php echo $dados['usuario']; ?></label>
							</div>
						</div>
					</div>
					<div>
						<fieldset class='coluna fscxTx'>
							<legend class='lgTil'>Problemas encontrados</legend>
							<textarea class='cxTx' name="problemas_txt"><?php echo $dados['problemas']; ?></textarea>
						</fieldset>
						<fieldset class='coluna fscxTx'>
							<legend class='lgTil'>Soluções</legend>
							<textarea class='cxTx' name="solucao_txt"><?php echo $dados['solucoes']; ?></textarea>
						</fieldset>
						<fieldset class='coluna fscxTx'>
							<legend class='lgTil'>Peças trocadas</legend>
							<textarea class='cxTx' name="pecas_txt"><?php echo $dados['pecas']; ?></textarea>
						</fieldset>
					</div>
				</div>
		</div>
	</body>
</html>