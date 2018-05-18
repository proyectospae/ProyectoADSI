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
  $statusY = "Y"; 
  $statusN = "N";
  $stmt = $user->runQuery("SELECT userID,userStatus FROM tbl_users WHERE userID=:uID AND tokenCode=:code LIMIT 1"); 
  $stmt->execute(array(":uID"=>$id,":code"=>$code));   
  $row=$stmt->fetch(PDO::FETCH_ASSOC);    
  if($stmt->rowCount() > 0)
  {
    if($row['userStatus']==$statusN)
    {
      $stmt = $user->runQuery("UPDATE tbl_users SET userStatus=:status WHERE userID=:uID");
      $stmt->bindparam(":status",$statusY); 
      $stmt->bindparam(":uID",$id); 
      $stmt->execute();
      $msg = "<div class='alert alert-success'><button class='close' data-dismiss='alert'>&times;</button>
      <strong>Guau!</strong>  Su cuenta está activada: <a href='index.php'>Login</div>";
    }
    else
    {
      $msg = "<div class='alert alert-error'><button class='close' data-dismiss='alert'>&times;</button>
      <strong>Lo Siento !</strong>  Su cuenta ya está activada: <a href='index.php'>Entre</div>";
    }
  }
  else
  {
    $msg = "<div class='alert alert-error'><button class='close' data-dismiss='alert'>&times;</button>
    <strong>Lo Siento !</strong>  No se encontró la cuenta: <a href='signup.php'>Registrate aquí</a> </div>";
  }
} 

?>
<!DOCTYPE html>
<html>
<head>
  <title>Confirm Registration</title>
  <link rel="stylesheet" type="text/css" href="../css/verify.css">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body id="login">
  <div class="container">
    <?php if(isset($msg)) { echo $msg; } ?>
  </div>
  <script src="../bootstrap/js/jquery-1.9.1.min.js"></script> 
  <script src="../bootstrap/js/bootstrap.min.js"></script> 
  <script src="../assets/scripts.js"></script>
</body> 
</html> 
 
