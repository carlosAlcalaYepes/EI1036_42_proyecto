<?php
error_reporting(0);
function table2html($table)
{
    global $pdo;

    $query = "SELECT * FROM  $table;";
    
    $rows = $pdo->query($query)->fetchAll(\PDO::FETCH_ASSOC);

    if (is_array($rows)) {/* Creamos un listado como una tabla HTML*/
        print '<table><thead>';
        foreach($rows[0] as $key => $value) {
            echo "<th>", $key,"</th>";
        }
        echo"<th> Añadir a la cesta</th>";
        print "</thead>";
        foreach ($rows as $row) {
            print "<tr>";
            $contar = 0;
            foreach ($row as $key => $val) {
                if($contar==2){
                    echo "<td><img src='$val' width='150' height='90'/> </td>";
                }
                else echo "<td>", $val, "</td>"; 
                $contar = $contar + 1;               
            }
            //deberiamos comprobar si el producto ya esta en la cesta y marcarlo de alguna manera.
            $string= "?action=encestar&id_usuario=".$_SESSION['id_usuario']."&producto=".$row['id_producto'];
            echo "<form action='$string' method='POST'>
            <td><button class='botonleermas' type='submit'> Añadir</button></td>
            </form>
            ";
            print "</tr>";
        }
        print "</table>";
    } 
    else
        print "<h1> No hay resultados </h1>"; 
}

?>