<?php
include "funcphp/conn.php";
include "funcphp/lg_chk.php";

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
				<h1 class="t1 tTitulo">Perfil</h1>
			</div>
			<?php include "modules/menu_lateral.php"; ?>
			<div class="content">
				<div class="coluna">
					<form action="funcphp/atualizar_perfil.php" id="form_perfil" method="POST" class="cadbox">
						<table class="tabCad">
							<tr>
								<td><label class="lbCad">Nome do usuario:</label></td>
								<td><input class="lbTx lbTxCad" type="text" name="usuario_txt" value="<?php echo $_SESSION['usuarioNome'] ?>" disabled="disabled"></td>
							</tr>
							<tr>
								<td><label class="lbCad">Senha atual:</label></td>
								<td><input class="lbTx lbTxCad" type="password" name="pswatual_txt" required="required"><br /></td>
							</tr>
							<tr>
								<td><label class="lbCad">Senha nova:</label></td>
								<td><input class="lbTx lbTxCad lbTxDt" type="password" id="pswnova_txt" name="pswnova_txt" required="required">
								</td>
							</tr>
							<tr>
								<td><label class="lbCad">Digite novamente a nova senha:</label></td>
								<td><input class="lbTx lbTxCad lbTxDt" type="password" id="repswnova_txt" name="repswnova_txt" required="required">
								</td>
							</tr>
						</table>
						<div class="container">
							<?php

							if (isset($_SESSION['senhaDiferente'])) {
								echo "<div class='container errorbox'>
							<h1 class='logerror'> Senha atual não encontrada! </h1>
							</div>";
								unset($_SESSION['senhaDiferente']);
							}
							if (isset($_SESSION['updateConfirmado'])) {
								echo "<div class='container aceitobox'>
							<h1 class='logerror'> Senha atualizada! </h1>
							</div>";
								unset($_SESSION['updateConfirmado']);
							}
							if (isset($_SESSION['updateNegado'])) {
								echo "<div class='container errorbox'>
							<h1 class='logerror'> Houve um problema ao atualizar! <br /> Error: " . $sql . "<br>" . $con->error . " ! </h1>
							</div>";
								unset($_SESSION['updateNegado']);
							}
							?>
							<label class="errorbox senhanova_hided" id="senhaerrada_txt">Senhas devem coincidir!</label>
							<input class="btn btnc" type="submit" id="bt_enviar" name="bt_Enviar" value="Alterar senha">
							<input class="btn btna" type="button" onclick="location.href='menu_search.php'" name="bt_Voltar" value="Cancelar">
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</body>

</html>