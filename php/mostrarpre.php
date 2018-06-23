<?php

    $host="localhost";
    $usuario="root";
    $password="";
    $db="dbtest";

    $conexion = new mysqli($host,$usuario,$password,$db);
    $sql = "select * from preguntas";
    $query=$conexion->query($sql);
    
          if($query->num_rows>0){
            
          while($res=$query->fetch_array())
          {
          echo '<tr><table border= 1x>
          <td>'.$res['id_Pregunta'].'. '.$res['Nom_Pregunta'].'</td>
          <td></td>
          </tr></table>
          ';
          }

          }
          else
          {
          echo "<center><br>No hay resultados";
          }
    ?>
    