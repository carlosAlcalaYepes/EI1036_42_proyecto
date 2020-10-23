<main>
	<h1>Gestion de Usuarios </h1>
	<form class="form_usuario" action="./portal.php?action=do_login" method="POST">
		<fieldset>
			<legend>Datos básicos</legend>
			<label for="nombre">Nombre</label>
			<br/>
			<input type="text" name="nombre" class="item_requerid" size="20" maxlength="25"  placeholder="Miguel" />
			<br/>
			<label for="contraseña">Contraseña</label>
			<br/>
			<input type="password" name="contraseña"  class="item_requerid" size="20" maxlength="25" />
			<br/>
		</fieldset>
		<p>
		<input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
</main>