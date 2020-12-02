<?php

function autentificar_usuario()
{
    
    global $pdo;

    $datos = $_POST;

    $query = "SELECT * FROM cliente WHERE nombre=? AND contraseña=?";
    try { 
        $valor = array($_REQUEST['nombre'],$_REQUEST['contraseña']);
        $a=ejecutarSQL($query,$valor);//SUpongo que es un array, pero con valor o solo indices?

        if($a==NULL){
            echo "Autentificación fallida";
        }
        else{
            //print_r($a);
            $_SESSION["usuario"] = $a[0]['rol'];
            $_SESSION["id_usuario"] = $a[0]['id_cliente'];
            $_SESSION["cesta"] = array();
            echo "Autentificación correcta";

            echo "<form class='form_usuario' action='?action=home' method='POST'>
                    <p><input type='submit' value='Entrar al perfil'></p>
                    </form>
            ";

            //print_r($_SESSION["usuario"]);
            //print_r($_SESSION["id_usuario"]);
        }
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }


   
}


    


?>