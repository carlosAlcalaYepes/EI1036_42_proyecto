<main>
	<h1>Datos de registro: </h1>
	<form class="form_usuario" action="?action=registrar_usuario" method="POST">

		<legend>Datos básicos</legend>

		<label for="nombre">Nombre</label>
		<br/>
		<input type="text" name="nombre" class="item_requerid" size="20" maxlength="25" value=""
		 placeholder="Miguel" />
		<br/>

		<label for="apellido">Apellidos</label>
		<br/>
		<input type="text" name="apellido" class="item_requerid" size="20" maxlength="50" value=""
		 placeholder="Alcala" />
		<br/>

		<label for="direccion">Dirección</label>
		<br/>
		<input type="text" name="direccion" class="item_requerid" size="20" maxlength="50" value=""
		 placeholder="avenida estacion" />
		<br/>

		<label for="ciudad">Ciudad</label>
		<br/>
		<input type="text" name="ciudad" class="item_requerid" size="20" maxlength="50" value=""
		 placeholder="Requena" />
		<br/>

		<label for="email">Email</label>
		<br/>
		<input type="text" name="email" class="item_requerid" size="20" maxlength="25" value=""
		 placeholder="kiko@ic.es" />
		<br/>

		<label for="zip_code">Zip Code</label>
		<br/>
		<input type="text" name="zip_code" class="item_requerid" size="20" maxlength="5" value=""
		 placeholder="123456" />
		<br/>

		<label for="foto_file">Foto</label>
		<br/>
		<input type="text" name="foto_file" class="item_requerid" size="20" maxlength="25" value=""
		 placeholder="" />
		<br/>

		<label for="contraseña">Clave</label>
		<br/>
		<input type="password" name="contraseña" class="item_requerid" size="8" maxlength="25" value=""
		/>
	
		
	
		<br/>
		<p><input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
</main>