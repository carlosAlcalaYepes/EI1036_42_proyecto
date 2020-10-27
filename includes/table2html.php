<?php

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
            foreach ($row as $key => $val) {
                echo "<td>", $val, "</td>";                
            }



            $string= "./portal.php?action=encestar&id_usuario="+$_SESSION["id_usuario"]+ "&producto="+$rows[0]['id_producto'];
            echo "<td><button href ='$string' class='boton_añadir' type='button'> Añadir</button></td>";
            print "</tr>";
        }
        print "</table>";
    } 
    else
        print "<h1> No hay resultados </h1>"; 
}

?>