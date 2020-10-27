<?php

function registrar_usuario($table)
{
    global $pdo;

    $datos = $_POST;
    //print_r ($_POST);


    $query = "INSERT INTO $table (nombre, apellidos, direccion, ciudad, foto_file, zip_code, rol, contraseña)
                          VALUES (?,?,?,?,?,?,?,?)";
    try { 
        
        $consult = $pdo -> prepare($query);
        $a = $consult->execute(array($_REQUEST['nombre'], $_REQUEST['apellidos'],$_REQUEST['direccion'], $_REQUEST['ciudad'], $_REQUEST['foto_file'], $_REQUEST['zip_code'], 'normal' ,$_REQUEST['contraseña'] ));

      
        if (1>$a) echo "<h1> Inserción incorrecta </h1>";
        else {
            echo "<h1> Usuario registrado! </h1>";
            echo "<form class='form_usuario' action='?action=home' method='POST'>
                    <p><input type='submit' value='Entrar al perfil'></p>
                    </form>
            ";
        }

        $_SESSION["usuario"] = "normal";
        
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}

?>