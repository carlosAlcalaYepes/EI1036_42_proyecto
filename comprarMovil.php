<?php


include(dirname(__FILE__)."/includes/conector_BD.php");
header('Content-type: application/json');

$query = "INSERT INTO compra (fecha, id_cliente, id_producto) VALUES (?,?,?)";

try { 
    $consult = $pdo -> prepare($query);
    $hoy = getdate();
    $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];

    $array = explode(",", $_REQUEST['productos']);

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





/*
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

function comprar()
{
    global $pdo;

    $datos = $_POST;
    $query = "INSERT INTO compra (fecha, id_cliente, id_producto)
                          VALUES (?,?,?)";
    try { 
        $consult = $pdo -> prepare($query);
        $hoy = getdate();
        $fecha = $hoy['year']."-".$hoy['mon']."-".$hoy['mday'];

        $array = explode(",", $_SESSION['cesta']);
        

        foreach($array as $id){
            $a = $consult->execute(array($fecha, $_SESSION["id_usuario"], $id));
        }

        if (1>$a) echo "<h1> Inserción incorrecta </h1>";
        else{
            //compra realizada
            echo "<h1> Compra realizada correctamente. Los productos comprados son: </h1>";
            global $pdo;

            $query = "SELECT * FROM  producto;";
            
            $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);

            if (is_array($rows)){
            
                print '<table><thead>';
                foreach($rows[0] as $key => $value) {
                    echo "<th>", $key,"</th>";
                }
                print "</thead>";

                $query = "SELECT * FROM  producto where id_producto=?;";

                foreach ($array as $linea) {
                    $valor = array($linea);

                    $a=ejecutarSQL($query,$valor);
                    
                    print "<tr>";
                    $contar = 0;
                    foreach ($a[0] as $val) {
                        //Si es el campo imagen se trata distinto
                        if($contar==2){
                            echo "<td><img src='$val' width='150' height='90'/> </td>";
                        }
                        else echo "<td>", $val, "</td>";
                        $contar = $contar + 1;              
                    }
                    
                    print "</tr>";
                }
                print "</table>";
                
            }  
            else print "<h1> No hay resultados </h1>"; 
            $_SESSION["cesta"] = array();
        } 
    
    } catch (PDOExeption $e) {
        echo ($e->getMessage());
    }
}*/

?>