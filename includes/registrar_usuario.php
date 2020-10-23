<?php

function registrar_usuario($table)
{
    global $pdo;

    $datos = $_REQUEST;
    if (count($_REQUEST) < 8) {
        $data["error"] = "No has rellenado el formulario correctamente";
        return;
    }
    $query = "INSERT INTO $table (nombre, apellidos, direccion, ciudad, email, zip_code, foto_file, contraseña)
                          VALUES (?,?,?,?,?,?,?,?)";
    try { 
        $consult = $pdo -> prepare($query);
        $a = $consult->execute(array($_REQUEST['nombre'], $_REQUEST['apellidos'],$_REQUEST['direccion'], $_REQUEST['ciudad'], $_REQUEST['email'], $_REQUEST['zip_code'], $_REQUEST['foto_file'], $_REQUEST['contraseña'] ));

        if (1>$a) echo "<h1> Inserción incorrecta </h1>";
        else echo "<h1> Usuario registrado! </h1>";

        $_SESSION["usuario"] = "normal";
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

?>