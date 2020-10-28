<main>
	<form class="form_producto" action="?action=insertar_producto" method="POST">

		<legend>Datos registro</legend>
		<br/>
		
		<label for="nombre">Nombre</label>
		<br/>
		<input type="text" name="nombre" class="item_requerid" size="20" maxlength="25" value=""
		 placeholder="Peras 1 kilo" />
		<br/>

		<label for="imagen">Foto</label>
		<br/>
		<input type="text" name="imagen" class="item_requerid" size="20" maxlength="500" value=""
		 placeholder="" />
		<br/>
	
		<br/>
		<p><input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
</main>