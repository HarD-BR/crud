<div class="menuL" id="menu_lateral">
	<div class="panelH">
		<img class="HeaderLogo BLK" src="img_repo/logo_crud.png">
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