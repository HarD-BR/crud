<?php
include "funcphp/lg_chk.php";

$hr = time();
$dt = date('Y-m-d', $hr);

?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>

<html xmlns='http://www.w3.org/1999/xhtml'>

<head>
	<link rel='shortcut icon' type='image/x-icon' href='img_repo/icon_crud.png' />
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<meta http-equiv='Content-Type' content='text/html; charset=utf-8' />
	<script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js'></script>
	<script type="text/javascript" src="js/main.js"></script>
	<title>SISTEMA DE PEDIDOS</title>
</head>

<body>
	<div class='container'>
		<div class='box tbbox'>
			<h1 class='t1'> Painel de administração</h1>
			<div>
				<h1 class="t1 tTitulo">Cadastro de pedidos</h1>
			</div>
			<?php include "modules/menu_lateral.php"; ?>
			<div class="coluna contentCad">
				<form action="funcphp/gravar_pedido.php" method="POST" class="cadbox">
					<table class="tabCad">
						<tr>
							<td><label class="lbCad">Nome do cliente:</label></td>
							<td><input class="lbTx lbTxCad" type="text" id="cad_cliente_txt" name="cliente_txt" required="required" title="Digite o nome do cliente"></td>
						</tr>
						<tr>
							<td><label class="lbCad">Nome da máquina:</label></td>
							<td><input class="lbTx lbTxCad" type="text" name="maquina_txt" required="required" title="Digite o nome da máquina"><br /></td>
						</tr>
						<tr>
							<td><label class="lbCad">Data de entrada:</label></td>
							<td><input class="lbTx lbTxCad lbTxDt" type="date" id="ent_dt" name="ent_dt" min="<?php echo $dt ?>" required="required" title="Digite a data de entrada do pedido"><br />
							</td>
						</tr>
						<tr>
							<td><label class="lbCad">Data de saída(Previsao):</label></td>
							<td><input class="lbTx lbTxCad lbTxDt" type="date" id="sai_dt" name="sai_dt" required="required" title="Digite a data de previsão de saída após a data de entrada"><br /></td>
						</tr>
						<tr>
							<td><label class="lbCad">Valor do serviço:</label></td>
							<td><input class="lbTx lbTxCad" type="text" name="valor_txt" pattern="\d+,\d{2}" title="Deve ser escrito na forma xxx,xx" required="required"><br /></td>
						</tr>
						<tr>
							<td><label class="lbCad">Status:</label></td>
							<td><select name="dd_txt" class="lbTx lbTxCad" type="text">
									<option value="Aberto">Aberto</option>
									<option value="Fechado">Fechado</option>
								</select></td>
						</tr>
						<tr>
							<td><label class="lbCad">Situação do status:</label></td>
							<td><input class="lbTx lbTxCad" type="text" id="st_txt" name="st_txt" required="required" title="Digite a atual situação do pedido"></td>
						</tr>
					</table>

					<div class="container">
						<input class="btn btnc" type="submit" name="bt_Enviar" value="Cadastrar pedido">
						<input class="btn btna" type="button" onclick="location.href='menu_search.php'" name="bt_Voltar" value="Cancelar">
					</div>
				</form>
			</div>
		</div>
	</div>
</body>

</html>