<?php
include(dirname(__FILE__)."/includes/conector_BD.php");
$valor = array($_REQUEST["min"],$_REQUEST["max"]);
    header('Content-type: application/json');
    $result = $pdo->prepare("SELECT * FROM producto where precio betWeen ? and ?;");
    $result->execute($valor);
    $datos = $result->fetchAll(PDO::FETCH_ASSOC);
    if(is_array($datos)){
        echo json_encode($datos);
    }
    else{
        echo "error";
    }

?>

