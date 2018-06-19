<?php
session_start(); require_once 'class.user2.php';
$user_home = new USER();
if(!$user_home->is_logged_in())
{
    $user_home->redirect('index2.php');
}
$stmt = $user_home->runQuery("SELECT * FROM tbl_admin WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html class="no-js">
<head>
  <title><?php echo $row['userName']; ?></title>
  <link rel="stylesheet" type="text/css" href="../css/home.css">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
  <div class="margin" id="margin">
    <P>Sistema de Verificacion de Ambientes</P>
  </div>
  <div class="margin11" id="margin11">
    <p><a href="/ProyectoADSI/login/home2.php" id="link2">Datos Verificacion</a></p>
    <p><a href="/ProyectoADSI/GestionAmbientes2/Preguntas/preguntas.php" id="link2">Modificar Preguntas de Lista de Chequeo</a></p>
    <p><a href="/ProyectoADSI/GestionAmbientes2/RegistrarUsu/registrarusu.php" id="link2">Registrar Nuevo Usuario</a></p>
  </div>
  <input type="submit" name="btnGuardar" value="Guardar" id="boton">
 <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#">S.V.A  Administrador </a>
          <div class="nav-collapse collapse">
            <ul class="nav pull-right">
              <li class="dropdown">
                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="icon-user"></i>
                  <?php
                  echo $row['userName'];
                  ?>
                  <i class="caret"></i>
                </a>
                <ul class="dropdown-menu">
                  <li>
                   <a tabindex="-1" href="logout2.php">Cerrar sesión</a>
                 </li>
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
