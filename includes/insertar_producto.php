<?php

function insertar_producto($table)
{
    global $pdo;

    $datos = $_REQUEST;
    if (count($_REQUEST) < 8) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "INSERT INTO $table (nombre, foto_file)
                          VALUES (?,?)";
    try { 
        $consult = $pdo -> prepare($query);
        $a = $consult->execute(array($_REQUEST['nombre'], $_REQUEST['foto_file']));

        if (1>$a) echo "<h1> Inserción incorrecta </h1>";
        else echo "<h1> Producto registrado! </h1>";
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

?>