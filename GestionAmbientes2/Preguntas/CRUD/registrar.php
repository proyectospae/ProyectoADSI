<!DOCTYPE html>
<html class="no-js">
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../../../css/home.css">
  <link href="../../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
  <div class="margin" id="margin">
    <P>Sistema de Verificacion de Ambientes</P>
  </div>
   <div class="margin6" id="margin6">
   	<p2 id="p2"><center><br>Ciudad Registrada</center></p2><br><br>
<?php
// Recibe los datos enviados desde html
echo "<center></center><br><center>";
$a=$_POST["preguntas"];

echo $a."<br>";


//CONEXI�N A LA BASE DE DATOS
//Datos de conexi�n
$hostname_db = "localhost";
$database_db = "modelo";
$username_db = "root";
$password_db = "";
// Creaci�n del Objeto y entregando los datos a los atributos
// Se crea el objeto a de la clase mysql
$z = new mysqli($hostname_db, $username_db, $password_db,$database_db);
// Se verifica si hay alg�n erro en la conexion

if ($z->connect_errno) {
    printf("Fallo en la conexion a la base de datos: %s\n", $a->connect_error);
    exit();
}
// Consulta en SQL
$query = "INSERT INTO `preguntas` (`Nom_Pregunta`) VALUES ('$a')";
$z->query($query);
//echo $z;
?>
<p><a href="http://localhost:8080/ProyectoADSI/GestionAmbientes2/Preguntas/preguntas.php" id="volver"><br>Volver menu principal</a></p>
  </div>
 <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#">S.V.A  Administrador </a>
               </ul>
             </li>
           </ul>
         </div>
       </div>
     </div> 
   </div>
   <footer>
        <div class="pull-right hidden-xs">
            S.V.A&nbsp;&nbsp;SENA&nbsp;&nbsp;
        </div>
        <strong>&nbsp;A.D.S.I &copy; 2016&nbsp;-&nbsp;2018<a href="#"></a>.</strong>
    </footer>
    <script src="../bootstrap/js/jquery-1.9.1.min.js"></script> 
    <script src="../bootstrap/js/bootstrap.min.js"></script> 
    <script src="../assets/scripts.js"></script> 
</body> 
</html> 

