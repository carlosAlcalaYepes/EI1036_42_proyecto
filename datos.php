<?php
include(dirname(__FILE__)."/includes/conector_BD.php");

    header('Content-type: application/json');
    $result = $pdo->prepare("SELECT * FROM producto;");
    $result->execute();
    $datos = $result->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($datos);
?>