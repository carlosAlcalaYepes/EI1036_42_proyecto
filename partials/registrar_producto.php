<main>
	<h1>Datos de registro: </h1>
	<form class="form_producto" action="?action=registrar_producto" method="POST">

		<legend>Datos básicos</legend>

		<label for="nombre">Nombre</label>
		<br/>
		<input type="text" name="nombre" class="item_requerid" size="20" maxlength="25" value=""
		 placeholder="Miguel" />
		<br/>

		<label for="foto_file">Foto</label>
		<br/>
		<input type="text" name="foto_file" class="item_requerid" size="20" maxlength="25" value=""
		 placeholder="" />
		<br/>
	
		<br/>
		<p><input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
</main>