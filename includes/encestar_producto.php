<?php

function encestar_producto()
{
    global $pdo;

    $datos = $_POST;
    $query = "INSERT INTO $table (nombre, imagen)
                          VALUES (?,?)";
    try { 
        $consult = $pdo -> prepare($query);
        $a = $consult->execute(array($_REQUEST['nombre'], $_REQUEST['imagen']));

        if (1>$a) echo "<h1> Inserción incorrecta </h1>";
        else echo "<h1> Producto registrado! </h1>";
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

?>