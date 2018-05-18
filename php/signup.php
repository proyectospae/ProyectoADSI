<?php
session_start();
require_once 'class.user.php';
$reg_user = new USER();
if($reg_user->is_logged_in()!="")
{
  $reg_user->redirect('home.php');
}
if(isset($_POST['btn-signup']))
{
  $uname = trim($_POST['txtuname']); 
  $email = trim($_POST['txtemail']); 
  $upass = trim($_POST['txtpass']); 
  $code = md5(uniqid(rand()));
  $stmt = $reg_user->runQuery("SELECT * FROM tbl_users WHERE userEmail=:email_id");
  $stmt->execute(array(":email_id"=>$email)); $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if($stmt->rowCount() > 0)
  {
    $msg = "<div class='alert alert-error'>
    <button class='close' data-dismiss='alert'>&times;</button>
    <strong>Lo Siento !</strong>Este Email ya se Encuentra Registrado, Por Favor Intente Otro.</div>";
  }
  else
  {
    if($reg_user->register($uname,$email,$upass,$code))
    {
      $id = $reg_user->lasdID();     
      $key = base64_encode($id); 
      $id = $key;
      $message = "Hola $uname,<br/><br/>Bienvenido <br/>Para completar su registro, haga clic en el enlace siguiente<br/>
      <br/><br/><a href='http://localhost:8080/ProyectoADSI/php/verify.php?id=$id&code=$code'>Haga clic AQUÍ para activar.
      </a><br/><br/>Gracias,";
      $subject = "Confirm Registration";
      $reg_user->send_mail($email,$message,$subject);
      $msg = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button>
      <strong>Exito!</strong> Hemos enviado un correo electrónico a $email. 
      Haga clic en el enlace de confirmación en el correo electrónico para crear su cuenta.</div>";
    }
    else
    {
      echo "sorry , Query could no execute...";
    }      
  } 
}

?>
<!DOCTYPE html>
<html>
<head>
  <title>Registrate</title>
  <link rel="stylesheet" type="text/css" href="../css/signup.css">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body id="login">
  <div class="container" id="container">
    <?php if(isset($msg)) echo $msg; ?>
    <form class="form-signin" method="post">
      <h2 class="form-signin-heading">Registrate</h2><hr/>
      <p>Nombre de Usuario</p>
      <input type="text" class="input-block-level" id="padding" placeholder="&#128272;Nombre de Usuario" name="txtuname" required /><br> 
      <br><p>Ingrese Email</p>
      <input type="email" class="input-block-level" id="padding" placeholder="&#128272;Ingrese Email" name="txtemail" required /> <br>
      <br><p>Contraseña</p>
      <input type="password" class="input-block-level" id="padding" placeholder="&#128272;Contraseña" name="txtpass" required /><br><br>
      <button class="btn btn-large btn-primary" type="submit" name="btn-signup">Registrate</button><br><br>  
      <a href="index.php" class="btn-btn-large"><p>Atras</p></a>
      </form>
    </div>
    <script src="../bootstrap/js/jquery-1.9.1.min.js"></script> 
    <script src="../bootstrap/js/bootstrap.min.js"></script> 
    <script src="../assets/scripts.js"></script>
  </body> 
</html> 
