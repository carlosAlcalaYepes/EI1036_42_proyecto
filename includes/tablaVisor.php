<?php
print"<script type='text/javascript' src='/javaScript/verCesta.js'></script>";
print"<script type='text/javascript' src='/javaScript/visor.js'></script>";

error_reporting(0);

function tablaVisor(){
    
    print"
    <input list='list' name='list' onchange='mostrarEnVisor(this)'>
    ";

    print"
    <datalist id='list'>
    </datalist>
    ";

    //formulario de precios
    print"
    <label>Precio minimo</label>
		<input type='number' step='0.01' name='min' id='min' class='item_requerid' size='20' min='0.01'/>

    <label>Precio maximo</label>
		<input type='number' step='0.01' name='max' id='max' class='item_requerid' size='20' min='0.01'/>
         
         <input type='button' value='Buscar' onclick='precioMinMAx()'>
    ";


    print"
    <div class='visor' id='visor' >
    </div>";

    //Cesta de compra
    print"
    <div class='cestaCompra' id='cestaCompra' style='display:none'>
        
        <h4>Cesta de compra  <button type = 'button' id='XX' onclick='cerrarCesta()'> X </button> </h4>
        
        <ul id='cesta'>

        </ul>
        <form action='?action=realizar_compra&productos_cesta=' id='formulario' method='POST'>
        <td><button onclick='borarrLocalStorage()' class='botonleermas3' type='submit'> Comprar</button></td>
        </form>
    </div>";

    
    
    
}

?>