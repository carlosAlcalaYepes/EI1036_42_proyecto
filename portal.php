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
        $central = "<p>Todavia no puedo ver la cesta</p>"; //cesta en $_SESSION["cesta"]
        break;
    case "encestar":
        $central = "<p>Todavía no puedo añadir a la cesta</p>"; //tabla compras
        break;
    case "realizar_compra":
        $central = "<p>Todavía no puedo añadir a la cesta</p>"; //cesta en $_SESSION["cesta"]
        break;
    default:
        $data["error"] = "Accion No permitida";
        $central = "/partials/centro.php";
}

if ($central <> "") include(dirname(__FILE__).$central);

include(dirname(__FILE__)."/partials/footer.php");
?>