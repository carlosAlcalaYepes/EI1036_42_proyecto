<?php

function autentificar_usuario()
{
    /*version
    global $pdo;
    $datos=$_REQUEST;//$_POST

    $query= sprintf("SELECT * FROM cliente WHERE nombre='%s' AND contraseña='%s'", mysql_real_escape_string($datos['nombre'])
                                                                                 , mysql_real_escape_string($datos['contraseña']));
    $resultado= mysql_query($query);

    if(!$resultado){
        $mensaje = 'autentificación fallida';
    }

    else{
        $cliente=mysql_fetch_assoc($resultado);
        $_SESSION["usuario"]=$cliente['rol'];
    }
    version1*/

    //Version2
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

            //print_r($_SESSION["usuario"]);
            //print_r($_SESSION["id_usuario"]);
        }
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
    //Version2

   
}


    /*
    buscar usuario y passwd en DB y comparar con $_POST
    según el resultado fijar la variable de sesion o mostar error

    $_SESSION["usuario"] = role
    */


?>