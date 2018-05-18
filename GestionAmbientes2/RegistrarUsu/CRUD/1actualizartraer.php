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
//CONEXIÓN A LA BASE DE DATOS
//Datos de conexión
$zz= $_POST ['idsede'];

$hostname_db = "localhost";
$database_db = "modelo";
$username_db = "root";
$password_db = "";

// Creación del Objeto y entregando los datos a los atributos
$z = new mysqli($hostname_db, $username_db, $password_db,$database_db);
$sql = "select * from sedes where idSedes='$zz'";
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
  <h1>Formulario de Actualizaci&oacute;n</h1><br><br>
  <table width="200" border="1">
       <tr>
        ID
        <input type="text" name="idsede" nombre="idsede" required="" value="<?php echo $res['idSedes'];?>">
    </tr>
      
    <tr>
        &nbsp;&nbsp;Sede:
        <input type="text" name="sedenom" id="sedenom" required="" value="<?php echo $res['SedesNom']; } }?>">
    </tr>
      
    <tr>
      <input type="submit" name="Guardar" id="Guardar" value="Actualizar">
    </tr>
  </table>
  <p>
    <label for=""></label>
  </p>
</form>
<p><a href="http://localhost:8080/ProyectoADSI/GestionAmbientes2/Sedes/sedes.php" id="volver">Volver menu principal</a></p>
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
