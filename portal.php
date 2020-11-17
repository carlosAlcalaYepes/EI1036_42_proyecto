<?php
    //view_form.php

/**
 * * Descripción: Proyecto
 * *
 * * 
 * *
 * * @author  Maria Jesús y Carlos Alcalá Yepes
 * * @copyright 2020 Carlos.Alcalá y Maria Jesús.Prior
 * * @license http://www.fsf.org/licensing/licenses/gpl.txt GPL 2 or later
 * * @version 1

 * */

session_start();

include(dirname(__FILE__)."/includes/ejecutarSQL.php");
include(dirname(__FILE__)."/partials/header.php");
include(dirname(__FILE__)."/partials/menu.php");

include(dirname(__FILE__)."/includes/conector_BD.php");
include(dirname(__FILE__)."/includes/table2html.php");

include(dirname(__FILE__)."/includes/registrar_usuario.php");
include(dirname(__FILE__)."/includes/autentificar_usuario.php");
include(dirname(__FILE__)."/includes/insertar_producto.php");
include(dirname(__FILE__)."/includes/ver_cesta.php");
include(dirname(__FILE__)."/includes/comprar.php");
include(dirname(__FILE__)."/includes/upload.php");


if (isset($_REQUEST['action'])) $action = $_REQUEST["action"];
else $action = "home";

$central = "Partials/centro.php";

switch ($action) {
    case "home":
        $central = "/partials/centro.php";
        break;
    case "login": 
        $central = "/partials/login.php"; //formulario login 
        break;
    case "do_login":
        $central = autentificar_usuario(); //fijar $_SESSION["usuario"]
        break;
    case "registrar_usuario":
        $central = "/partials/registro_usuario.php"; //formulario usuarios
        break;
    case "insertar_usuario":
        $central = registrar_usuario("cliente"); //tabla usuarios
        break;
    case "listar_productos":
        $central = table2html("producto"); //tabla productos
        break;
    case "registrar_producto":
        $central = "/partials/registrar_producto.php"; //formulario producto
        break;
    case "insertar_producto":
        $central = insertar_producto("producto"); //tabla productos
        break;
    case "ver_cesta":
        $central = ver_cesta(); //cesta en $_SESSION["cesta"]
        break;
    case "encestar":
        array_push($_SESSION['cesta'],$_REQUEST["producto"]);
        //$central=encestar_producto($id_usuario,$producto); pensamos que esto no hace falta.
        $central = table2html("producto");
        break;
    case "borrar":
        //unset($_SESSION['cesta'][$_REQUEST["producto_borrar"]]);
        foreach (array_keys($_SESSION['cesta'], $_REQUEST["producto_borrar"]) as $key) {
            unset($_SESSION['cesta'][$key]);
            break;
        }

        $central = ver_cesta();
        break;
    case "realizar_compra":
        //lee de la url y lo mete en $_SESSION['cesta']
        $_SESSION['cesta']=$_REQUEST['producto_cesta'];
        
        $central = comprar(); //cesta en $_SESSION["cesta"]
        break;
    case "upload":
        upload();
        $central = "/partials/registrar_producto.php";
        break;
        
    default:
        echo"Error";
        $data["error"] = "Accion No permitida";
        $central = "/partials/centro.php";
}

if ($central <> "") include(dirname(__FILE__).$central);

include(dirname(__FILE__)."/partials/footer.php");
?>