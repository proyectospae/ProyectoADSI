<?php
    class conexion{
        function listadopreguntas(){
            $host = "localhost";
            $user = "root";
            $pw = "";
            $db = "dbtest";

            $con = mysql_connect($host, $user, $pw) or die("No se puede conectar a la base de Datos ");
            mysql_select_db($db, $con) or die ("No se a Encontrado Datos ");
            $query ="SELECT * FROM preguntas";
            $resuldato = mysql_query($query);

            while($file = mysql_fetch_array($resuldato)) {
                echo "$fila[id_Pregunta] <br>";
            }
        }
    }
?>