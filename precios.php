<?php
/*include(dirname(__FILE__)."/includes/ejecutarSQL.php");
echo"Comprobacion precios";

header('Content-type: application/json');
$min=$_REQUEST["min"];
$max=$_REQUEST["max"];

echo"Comprobacion precios";
print_r($min);
print_r($max);

include(dirname(__FILE__)."/includes/conector_BD.php");
$query = "SELECT * FROM producto WHERE precio BETWEEN ? and ? ";
$valor = array($_REQUEST['min'],$_REQUEST['max']);


$datos = ejecutarSQL($query,$valor);

if(is_array($datos)){
    echo json_encode($datos);
}
else{
    echo "<script>alert('No hay resultados para esos precios');</script>"; 
}*/
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

