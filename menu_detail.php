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
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
	<script type="text/javascript" src="js/main.js"></script>
	<title> Pontocom Informática </title>
</head>

<body>
	<div class='container'>
		<div class='box tbbox'>
			<h1 class='t1'> Painel de administração</h1>
			<div>
				<input class="inStd inTo" type="text" readonly value=" <?php echo $dados['nm_maq'], '-', $dados['nm_cliente']; ?>">
			</div>
			<?php include 'modules/menu_lateral.php'; ?>
			<div class="content">
				<form action="funcphp/atualizar_pedido.php" method="POST">
					<div class="">
						<div class='coluna'>
							<div class="lbTx inTx">
								<label>ID: <?php echo $dados['id']; ?></label>
								<input hidden="hidden" name="id_txt" value="<?php echo $dados['id']; ?>">
							</div>
							<div class="lbTx inTx">
								<label>Cliente:</label>
								<input class='input_borderless' name="cliente_txt" value='<?php echo $dados['nm_cliente']; ?>' required="required" />
							</div>
							<div class="lbTx inTx">
								<label>Máquina:</label>
								<input class='input_borderless' name="maquina_txt" value='<?php echo $dados['nm_maq']; ?>' required="required" />
							</div>
						</div>
						<div class='coluna'>
							<div class="lbTx inTx">
								<label>Data de entrada:</label>
								<input class='input_borderless input_date' type="date" id="ent_dt" name="ent_dt" value='<?php echo $dados['dt_ent']; ?>' title="Digite a data de entrada do pedido" min="<?php echo $dados['dt_ent']; ?>" required="required" />
							</div>
							<div class="lbTx inTx">
								<label>Data de saída(previsão):</label>
								<input class='input_borderless input_date' type="date" id="sai_dt" name="sai_dt" value='<?php echo $dados['dt_sai']; ?>' title="Digite a data de previsão de saída após a data de entrada" required="required" />
							</div>
							<div class="lbTx inTx">
								<label>Valor do serviço: R$</label>
								<input class='input_borderless input_date' name="valor_txt" value='<?php echo $dados['vl_serv']; ?>' pattern="\d+,\d{2}" title="Deve ser escrito na forma xxx,xx" required="required" />
							</div>
						</div>
						<div class='coluna'>
							<div class="lbTx inTx">
								<label>Status: </label>
								<select class='input_borderless' id="dd_txt" name="dd_txt" class="lbTx lbTxCad" type="text" required="required">
									<?php
									if ('Aberto' == $dados['status']) {
										echo "<option value='Aberto' selected='selected'>Aberto</option>
												<option value='Fechado'>Fechado</option>";
									} else {
										echo "<option value='Fechado' selected='selected'>Fechado</option>
										<option value='Aberto'>Aberto</option>";
									}
									?>
								</select>
							</div>
							<div class="lbTx inTx">
								<label>Situação: </label>
								<input class='input_borderless' name="st_txt" value='<?php echo $dados['situacao']; ?>' required="required" />
							</div>
							<div class="lbTx inTx">
								<label>Cadastrado por: <?php echo $dados['usuario']; ?></label>
							</div>
						</div>
					</div>
					<div>
						<fieldset class='coluna fscxTx'>
							<legend class='lgTil'>Problemas encontrados</legend>
							<textarea class='cxTx' name="problemas_txt" required="required"><?php echo $dados['problemas']; ?></textarea>
						</fieldset>
						<fieldset class='coluna fscxTx'>
							<legend class='lgTil'>Soluções</legend>
							<textarea class='cxTx' name="solucao_txt" required="required"><?php echo $dados['solucoes']; ?></textarea>
						</fieldset>
						<fieldset class='coluna fscxTx'>
							<legend class='lgTil'>Peças trocadas</legend>
							<textarea class='cxTx' name="pecas_txt" required="required"><?php echo $dados['pecas']; ?></textarea>
						</fieldset>
					</div>
					<div class="container">
						<input class="btn btnc" type="submit" id="bt_enviar" name="bt_Enviar" value="Atualizar pedido">
				</form>
				<button class="btn btne" type="submit" formaction="funcphp/deletar_pedido.php" id="bt_delete" name="bt_del" value="<?php echo $dados['id']; ?>">Excluir pedido</button>
			</div>

		</div>
	</div>
</body>

</html>