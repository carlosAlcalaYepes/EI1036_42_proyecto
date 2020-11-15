<?php

function insertar_producto($table)
{
    global $pdo;

    $datos = $_POST;
    $query = "INSERT INTO $table (nombre, imagen, precio)
                          VALUES (?,?, ?)";

    if($_REQUEST['imagen']!='URL'){
        try { 
            $consult = $pdo -> prepare($query);
            $a = $consult->execute(array($_REQUEST['nombre'],$_REQUEST['imagen'], $_REQUEST['precio']));
    
            if (1>$a) echo "<h1> Inserción incorrecta de url </h1>";
            else echo "<h1> Producto registrado! </h1>";
        
        } catch (PDOExeption $e) {
            echo ($e->getMessage());
        }
    }
    else{
        try { 
            print_r($_SESSION['foto']);
            $consult = $pdo -> prepare($query);
            $a = $consult->execute(array($_REQUEST['nombre'],$_SESSION['foto'], $_REQUEST['precio']));
            if (1>$a) echo "<h1> Inserción incorrecta de la imagen</h1>";
            else echo "<h1> Producto registrado! </h1>";
        
        } catch (PDOExeption $e) {
            echo ($e->getMessage());
        }
    }
    
}

?>