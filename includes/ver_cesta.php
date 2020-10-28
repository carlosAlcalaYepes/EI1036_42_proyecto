<?php
error_reporting(0);
function ver_cesta()
{
    global $pdo;

    $query = "SELECT * FROM  producto;";
    
    $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    
    print '<table><thead>';
    foreach($rows[0] as $key => $value) {
        echo "<th>", $key,"</th>";
    }
    echo"<th> Borrar de la cesta</th>";
    print "</thead>";

    $query = "SELECT * FROM  producto where id_producto=?;";

    foreach ($_SESSION['cesta'] as $linea) {
        $valor = array($linea);

        $a=ejecutarSQL($query,$valor);
        
        print "<tr>";
        $contar = 0;
        print_r($a);
        foreach ($a[0] as $val) {

            //Si es el campo imagen se trata distinto
            if($contar==2){
                echo "<td><img src='$val' width='150' height='90'/> </td>";
            }
            else echo "<td>", $val, "</td>";
            $contar = $contar + 1;
                        
        }
        //boton de borrar
        $string= "?action=borrar&producto_borrar=".$a[0]['id_producto'];
        echo $a[0]['id_producto'];
        echo "<form action='$string' method='POST'>
        <td><button class='botonleermas2' type='submit'> Borrar</button></td>
        </form>
        ";
        } 
        print "</tr>";
    }
    print "</table>";

    
//error_reporting(0);
/*
function ver_cesta()
{
    global $pdo;

    $query = "SELECT * FROM  producto;";

    
    $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);
    

    if (is_array($rows)) {/* Creamos un listado como una tabla HTML
        print '<table><thead>';
        foreach($rows[0] as $key => $value) {
            echo "<th>", $key,"</th>";
        }
        echo"<th> Borrar de la cesta</th>";
        print "</thead>";
        foreach ($rows as $row) {
            print "<tr>";
            $esta=false;
            $contar = 0;
            foreach ($row as $key => $val) {
                if(array_search($val, $_SESSION['cesta']) || $esta ){
                    if($contar==2){
                        echo "<td><img src='$val' width='150' height='90'/> </td>";
                    }
                    else echo "<td>", $val, "</td>";
                    $contar = $contar + 1;
                    $esta=true; 
                }
                else break;                
            }
            if($esta){
                $string= "?action=borrar&producto=".$row['id_producto'];
                echo "<form action='$string' method='POST'>
                <td><button class='botonleermas2' type='submit'> Borrar</button></td>
                </form>
                ";
            } 
            print "</tr>";
        }
        print "</table>";
    } 
    else
        print "<h1> No hay resultados </h1>"; 
}
*/
?>