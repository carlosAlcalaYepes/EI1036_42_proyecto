<?php
    header('Content-type: application/json');
    $min=$_REQUEST["min"];
    $max=$_REQUEST["max"];

    echo"Comprobancion precios";
    print_r($min);
    print_r($max);

    include(dirname(__FILE__)."/includes/conector_BD.php");
    $query = "SELECT * FROM cliente WHERE nombre=? AND contraseña=?";
    $valor = array($_REQUEST['min'],$_REQUEST['max']);

    
    $datos = ejecutarSQL($query,$valor);

    if(is_array($datos)){
        echo json_encode($datos);
    }
    else{
        echo "<script>alert('No hay resultados para esos precios');</script>"; 
    }
    
    
?>