<?php
require_once 'class.user.php';
$user = new USER();
if(empty($_GET['id']) && empty($_GET['code']))
{
  $user->redirect('index.php');
}
if(isset($_GET['id']) && isset($_GET['code']))
{
  $id = base64_decode($_GET['id']);
  $code = $_GET['code'];
  $stmt = $user->runQuery("SELECT * FROM tbl_users WHERE userID=:uid AND tokenCode=:token");
  $stmt->execute(array(":uid"=>$id,":token"=>$code)); 
 	$rows = $stmt->fetch(PDO::FETCH_ASSOC);
  if($stmt->rowCount() == 1)
  {
    if(isset($_POST['btn-reset-pass']))
    {
      $pass = $_POST['pass']; 
 	 	 	$cpass = $_POST['confirm-pass'];
      if($cpass!==$pass)
      {
        $msg = "<center><div class='alert alert-block'><button class='close' data-dismiss='alert'>&times;</button>
        <strong>Lo Siento!</strong>  La contraseña no coincide.</div></center>";
      }
      else
      {
        $password = md5($cpass); 
 	 	 	 	$stmt = $user->runQuery("UPDATE tbl_users SET userPass=:upass WHERE userID=:uid"); 
 	 	 	 	$stmt->execute(array(":upass"=>$password,":uid"=>$rows['userID']));
        $msg = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button>
        Contraseña cambiada.</div>";
        header("refresh:5;index.php");
      }
    }
  }
  else
  {
    $msg = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button>No se encontró una cuenta, inténtalo de nuevo</div>";
  }
} 
 
?>
<!DOCTYPE html>
<html>
<head>
  <title>Password Reset</title>
  <link rel="stylesheet" type="text/css" href="../css/resetpass.css">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body id="login">
  <div class="container" id="container">
    <div class='alert alert-success'>
      <strong>Hola !</strong>
      <?php echo $rows['userName']
      ?> 
      estás aquí para restablecer tu contraseña.
    </div>
    <form class="form-signin" method="post">
      <h3 class="form-signin-heading">Restablecimiento de contraseña.</h3><hr/>
      <?php
      if(isset($msg))
      {
        echo $msg;
      }
      ?>
      <input type="password" class="input-block-level" id="contraseña" placeholder="&#128272;Nueva contraseña" name="pass" required /><br><br>
      <input type="password" class="input-block-level" id="contraseña" placeholder="&#128272;Confirmar nueva contraseña" name="confirm-pass" required /><hr/> 
      <button class="btn btn-large btn-primary" type="submit" name="btn-reset-pass">Restablecer su contraseña</button><br><br><br>
      <a href="index.php" class="btn-btn-large"><center>Atras</center></a>
    </form>
  </div>
  <script src="../bootstrap/js/jquery-1.9.1.min.js"></script> 
  <script src="../bootstrap/js/bootstrap.min.js"></script> 
  <script src="../assets/scripts.js"></script>
</body> 
</html> 
 
