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
   <div class="margin9" id="margin9">
<?php
//CONEXI�N A LA BASE DE DATOS
//Datos de conexi�n
$zz= $_POST ['idnombre'];

$hostname_db = "localhost";
$database_db = "dbtest";
$username_db = "root";
$password_db = "";

// Creaci�n del Objeto y entregando los datos a los atributos
$z = new mysqli($hostname_db, $username_db, $password_db,$database_db);
$sql = "select * from centro where idCentro='$zz'";
$query=$z->query($sql);

if ($z->connect_errno) {
    printf("Fallo en la conexion a la base de datos: %s\n", $a->connect_error);
    exit();
}
// Consulta en SQL
  if($query->num_rows>0)
  {
    while($res=$query->fetch_array())
    {
       
?>
<form name="form1" method="post" action="2actualizar.php">
  <form name="form1" method="post" action="2actualizar.php">
  <h1>Formulario de Actualizaci&oacute;n</h1><br><br>
  <table width="200" border="1">
    <tr>
        ID
        <input type="text" name="idnombre" nombre="idnombre" required="" value="<?php echo $res['idCentro']; ?>">
    </tr>
      
    <tr>
        &nbsp;&nbsp;Centro:
        <input type="text" name="centronombre" id="centronombre" required="" value="<?php echo $res['CentroNom']; } } ?>">
    </tr>
    <tr>
     <input type="submit" name="Guardar" id="Guardar" value="Actualizar">
    </tr>
  </table>
  <p>
    <label for=""></label>
  </p>
</form>
<p><a href="/ProyectoADSI/GestionAmbientes2/Centros/centro.php" id="volver">Volver menu principal</a></p>
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





