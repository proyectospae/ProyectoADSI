<?php
session_start(); require_once 'class.user.php';
$user_login = new USER();
if($user_login->is_logged_in()!="")
{
  $user_login->redirect('opcioninstru.php');
}
if(isset($_POST['btn-login']))
{
  $email = trim($_POST['txtemail']);
  $upass = trim($_POST['txtupass']);
  if($user_login->login($email,$upass))
  {
    $user_login->redirect('opcioninstru.php');
  }
}
?> 
 
<!DOCTYPE html>
<html>
<head>
  <title>Inicio de Sesion</title>
  <link rel="stylesheet" type="text/css" href="../css/index.css">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">  
</head>
<body id="login">
  <div class="container" id="container1" style="">
    <?php
    if(isset($_GET['inactive']))
    {
      ?>
      <div class='alert alert-error'>
        <button class='close' data-dismiss='alert'>&times;</button>
        <strong>Lo siento!</strong>
        Esta cuenta no está activada. Verificar la Cuenta de Correo y Activarla.
      </div>
      <?php
    }
    ?>
    <form class="form-signin" method="post">
      <?php
      if(isset($_GET['error']))
      {
        ?>
        <div class='alert-success'>
          <button class='close' data-dismiss='alert'>&times;</button>
          <strong>¡Usuario no Registrado, Email o Contraseña erronea!</strong>
        </div>
        <?php
      }
      ?>
      <br>
      <h2 class="form-signin-heading">Iniciar Sesion</h2><hr/>
      <p>Ingresa Email</p>
      <input type="email" class="input-block-level" id="email" placeholder="&#128272;Ingresa Email" name="txtemail" required/>
      <br><br><p>Contraseña</p>
      <input type="password" class="input-block-level" id="password1" placeholder="&#128272;Contraseña" name="txtupass" required/>
      <button class="btn btn-large btn-primary" type="submit" name="btn-login">Iniciar Sesion</button>
      <a href="signup.php" class="btn-large"><p>Registrate</p></a>
      <a href="fpass.php" class="olvidastes"><p>¿Olvidaste la Contraseña?</p></a>
    </form>
  </div>
  <script src="../bootstrap/js/jquery-1.9.1.min.js"></script> 
  <script src="../bootstrap/js/bootstrap.min.js"></script> 
  <script src="../assets/scripts.js"></script> 
</body> 
</html>
