<?php

function autentificar_usuario()
{
    //Version1
    global $pdo;
    $datos=$_REQUEST;

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
    //version1

    //Version2
    global $pdo;

    $datos = $_REQUEST;

    $query = "SELECT * FROM cliente WHERE nombre=? AND contraseña=?
                          VALUES (?,?)";
    try { 
        $valor = array($_REQUEST['nombre'],$_REQUEST['contraseña']);
        $usuario=ejecutarSQL($query,$valor);//SUpongo que es un array, pero con valor o solo indices?
        if($usuario==NULL){
            echo "Autentificación fallida";
        }
        else{
            
            $_SESSION["usuario"] = $usuario['rol'];
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