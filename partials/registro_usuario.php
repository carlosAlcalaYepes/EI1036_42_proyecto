<main>
	<form class="form_usuario" action="?action=insertar_usuario" method="POST">

		<legend>Datos registro</legend>
		<br/>

		<label for="nombre">Nombre</label>
		<br/>
		<input type="text" name="nombre" class="item_requerid" size="20" maxlength="25" value=""
		 placeholder="Miguel" required/>
		<br/>

		<label for="apellidos">Apellidos</label>
		<br/>
		<input type="text" name="apellidos" class="item_requerid" size="20" maxlength="50" value=""
		 placeholder="Alcala" required/>
		<br/>

		<label for="direccion">Dirección</label>
		<br/>
		<input type="text" name="direccion" class="item_requerid" size="20" maxlength="50" value=""
		 placeholder="avenida estacion" required/>
		<br/>

		<label for="ciudad">Ciudad</label>
		<br/>
		<input type="text" name="ciudad" class="item_requerid" size="20" maxlength="50" value=""
		 placeholder="Requena" required/>
		<br/>

		<label for="zip_code">Zip Code</label>
		<br/>
		<input type="text" name="zip_code" class="item_requerid" size="20" maxlength="5" value=""
		 placeholder="12345" required/>
		<br/>

		<label for="foto_file">Foto</label>
		<br/>
		<input type="text" name="foto_file" class="item_requerid" size="20" maxlength="25" value=""
		 placeholder="" required/>
		<br/>

		<label for="contraseña">Contraseña</label>
		<br/>
		<input id="contraseña" oninput="validarcontraseña()" type="password" name="contraseña" class="item_requerid" size="20" maxlength="25" value=""
		required/>
		<p id="pContra"></p>

	
		
	
		<br/>
		<p><input id="enviar" type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
</main>