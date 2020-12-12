<?php


include(dirname(__FILE__)."/includes/conector_BD.php");
$_SESSION["id_usuario"] = "10";
print_r($_SESSION["id_usuario"]);
$query = "INSERT INTO compra (fecha, id_cliente, id_producto) VALUES (?,?,?)";
$array = explode(",", $_POST['productos']);
header('Content-type: application/json');
try { 
    $consult = $pdo -> prepare($query);
    $hoy = getdate();
    $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];

    

    $OK = array('resultado' => 'OK');
    $KO = array('resultado' => 'KO');

    foreach($array as $id){
        $a = $consult->execute(array($fecha, $_SESSION["id_usuario"], $id));
        if (1>$a){
            echo json_encode($KO); //{“resultado”: “KO”}
        }
    }
    echo json_encode($OK); //{“resultado”: “OK”}
} catch (PDOExeption $e) {
    echo ($e->getMessage());
}

?>