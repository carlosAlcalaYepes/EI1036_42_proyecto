
<main class="form_producto">
	<script type="text/javascript" src="/javaScript/subirFichero.js"></script>
	<script type="text/javascript" src="/javaScript/validacion.js"></script>
	<form  action="?action=insertar_producto" method="POST">

		<legend>Datos registro</legend>
		<br/>
		
		<label for="nombre">Nombre</label>
		<br/>
		<input type="text" name="nombre" class="item_requerid" size="20" maxlength="25" value=""
		 placeholder="Peras 1 kilo" required/>
		<br/>

		<label for="precio">Precio</label>
		<br/>
		<input type="number" step="0.01" name="precio" class="item_requerid" size="20" min="0.01" value=""
		 placeholder="0.50" required/>
		<br/>

		<label for="imagen">Foto</label>
		<br/>
		<input type="text" name="imagen" class="item_requerid" size="20" maxlength="500" value="URL"
		 placeholder="URL" required/>
		<br/>
		<br/>
		
		<p><input type="submit" value="Enviar">
		<input type="reset" value="Deshacer">
		</p>
	</form>
	<br/>
	<button type="button" onclick="abrirForm()">Subir imagen</button>
	<div class="ventanaImagen" id="ventanaImagen" style="display:none">
			<button type = "button" id="X" onclick="cerrar()"> X </button>
			<form action="?action=upload" method="post" enctype="multipart/form-data">
			Selecciona	una	imagen:
			<br/>
			<input id="imagen" oninput="validarimagen()" onchange= "handleFiles(event)" type="file" accept="image/*" name="fileToUpload" id="upload">
			<br/>
			<canvas id="canvas" width="100" height="100"></canvas>
			<br/>
			<input onclick="cerrar()" type="submit" value="SUBIR" name="submit">
			</form>
		</div>
</main>