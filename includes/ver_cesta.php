<?php
error_reporting(0);
function ver_cesta()
{
    global $pdo;

    $query = "SELECT * FROM  producto;";
    
    $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);

    if (is_array($rows)){
    
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
            foreach ($a[0] as $val) {

                //Si es el campo imagen se trata distinto
                if($contar==2){
                    echo "<td><img src='$val' width='150' height='90'/> </td>";
                }
                else echo "<td>", $val, "</td>";
                $contar = $contar + 1;
                            
            }
            //boton de borrar

            $string= "?action=borrar&producto_borrar=".$linea;
            //echo $string;
            echo "<form action='$string' method='POST'>
            <td><button class='botonleermas2' type='submit'> Borrar</button></td>
            </form>
            ";
            
            print "</tr>";
        }
        print "</table>";
        $compra ="?action=realizar_compra";
        echo "<form action='$compra' method='POST'>
            <td><button class='botonleermas3' type='submit'> Comprar</button></td>
            </form>
            ";
    }  
    else print "<h1> No hay resultados </h1>"; 
}
?>