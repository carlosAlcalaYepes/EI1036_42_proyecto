<?php
print"<script type='text/javascript' src='/javaScript/verCesta.js'></script>";
print"<script type='text/javascript' src='/javaScript/visor.js'></script>";

error_reporting(0);

function tablaVisor(){
    
    print"
    <input list='list' name='lista' id='lista' onchange='mostrarEnVisor(this)'>
    ";
    
    print"
    <datalist id='list'>
    </datalist>
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