<script type="text/javascript" src="/javaScript/verCesta.js"></script>
<nav>
	<ul>
		<li>
			<a href="./portal.php?action=home">Home</a>
		</li>
		<li>
			<a href="?action=listar_productos">Productos</a>
		</li>

		<?php 
		
		 if (!isset($_SESSION['usuario'])){
			echo '<li><a href="?action=login">Autentificar</a></li>';
			echo '<li><a href="?action=registrar_usuario">Registrarme</a></li>';
		 }
		elseif (isset($_SESSION['usuario']) and $_SESSION['usuario'] == 'administrador')
			echo '<li><a href="?action=registrar_producto">Registrar Producto</a></li>';
		elseif (isset($_SESSION['usuario']))
			 //echo '<button onclick="verCesta()">Cesta de compra</button>'
			 echo '<img src="../img/cesta_negra.jpg" onclick="verCesta()" width="42" height="42" style="vertical-align:middle"/>'
		//    echo '<li><a href="?action=ver_cesta">Cesta de Compra</a></li>';
        ?>
	</ul>
</nav>