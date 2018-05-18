<?php
session_start();
require_once 'class.user.php';
$user = new USER();
if($user->is_logged_in()!="")
{
  $user->redirect('home.php');
}
if(isset($_POST['btn-submit']))
{
  $email = $_POST['txtemail'];
  $stmt = $user->runQuery("SELECT userID FROM tbl_users WHERE userEmail=:email LIMIT 1"); 
 	$stmt->execute(array(":email"=>$email));
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
  if($stmt->rowCount() == 1)
  {
    $id = base64_encode($row['userID']);
    $code = md5(uniqid(rand()));
    $stmt = $user->runQuery("UPDATE tbl_users SET tokenCode=:token WHERE userEmail=:email");
    $stmt->execute(array(":token"=>$code,"email"=>$email));
    $message= "Hola , $email <br/><br/>Nos solicitaron restablecer su contraseña,Si lo hace, 
    simplemente haga clic en el siguiente enlace para restablecer su contraseña, 
    si no solo ignore este correo electrónico,<br/><br/>Haga clic en siguiente vínculo para restablecer su contraseña<br/><br/>
    <a href='http://localhost:8080/ProyectoADSI/php/resetpass.php?id=$id&code=$code'>Haga clic aquí para restablecer la contraseña</a>
    <br/><br/>Gracias";
    $subject = "Password Reset";
    $user->send_mail($email,$message,$subject);
    $msg = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button>
    Hemos enviado un correo electrónico a $email, 
    Por favor, haga clic en el enlace de restablecimiento de contraseña en el correo electrónico para generar una nueva contraseña.
    </div>";
  }
  else
  {
    $msg = "<div class='alert alert-danger'><button class='close' data-dismiss='alert'>&times;</button><strong>Lo siento!</strong>
    este correo electrónico no se ha encontrado.</div>";
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <title>se te olvido tu Contraseña</title>
  <link rel="stylesheet" type="text/css" href="../css/fpass.css">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body id="login">
  <div class="container" id="container">
    <form class="form-signin" method="post">
      <h2 class="form-signin-heading">Se te Olvido tu Contraseña!</h2><hr/>
      <?php
      if(isset($msg))
      {
        echo $msg;
      }
      else
      {
        ?>
        <div class='alert alert-info'>
          Por favor, introduzca su dirección de correo electrónico.
          Recibirá un enlace por correo electrónico para crear una nueva contraseña.
        </div>
        <?php
      }
      ?>
      <p>Ingrese Email</p>
      <input type="email" class="input-block-level" placeholder="&#128272;Ingrese Email" name="txtemail" required/>
      <hr/>
      <button class="btn btn-danger btn-primary" type="submit" name="btn-submit">Generar Nueva Contraseña</button><br><br>
      <a href="index.php" class="btn-btn-large"><center>Atras</center></a>
    </form>
  </div>
  <script src="../bootstrap/js/jquery-1.9.1.min.js"></script> 
  <script src="../bootstrap/js/bootstrap.min.js"></script> 
  <script src="../assets/scripts.js"></script>
</body> 
</html> 
