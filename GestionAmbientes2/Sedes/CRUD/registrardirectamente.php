<?php
//CONEXI�N A LA BASE DE DATOS
//Datos de conexi�n
$hostname_db = "localhost";
$database_db = "aprendiz";
$username_db = "root";
$password_db = "";
// Creaci�n del Objeto y entregando los datos a los atributos
// Se crea el objeto a de la clase mysql
$a = new mysqli($hostname_db, $username_db, $password_db,$database_db);
// Se verifica si hay alg�n erro en la conexion
if ($a->connect_errno) {
    printf("Fallo en la conexion a la base de datos: %s\n", $a->connect_error);
    exit();
}
// Consulta en SQL
//$query = "SELECT * FROM estudiantes";
$query = "INSERT INTO `estudiantes` (`idcedula`, `nombre`,`direccion`,`telefono`) VALUES ('7', 'Ernesto','calle 68','232' )";
$a->query($query);

?>