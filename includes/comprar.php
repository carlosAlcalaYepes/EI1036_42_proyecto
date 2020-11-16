<?php

function comprar()
{
    global $pdo;

    $datos = $_POST;
    $query = "INSERT INTO compra (fecha, id_cliente, id_producto)
                          VALUES (?,?,?)";
    try { 
        $consult = $pdo -> prepare($query);
        $hoy = getdate();
        $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];

        
        foreach($_SESSION['cesta'] as $id){
            $a = $consult->execute(array($fecha, $_SESSION["id_usuario"], $id));
        }

        if (1>$a) echo "<h1> Inserción incorrecta </h1>";
        else{
            echo "<h1> La compra se ha realizado correctamente! </h1>";
            $_SESSION["cesta"] = array();
        } 
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

?>