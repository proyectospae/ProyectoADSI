<?php
session_start(); require_once 'class.user.php';
$user_home = new USER();
if(!$user_home->is_logged_in())
{
    $user_home->redirect('index.php');
}
$stmt = $user_home->runQuery("SELECT * FROM tbl_users WHERE userID=:uid");
$stmt->execute(array(":uid"=>$_SESSION['userSession']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html class="no-js">
<head>
  <title>Sistema de Verificacion de Ambientes</title>
  <link rel="stylesheet" type="text/css" href="../css/home.css">
  <link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
  <div class="margin" id="margin">
    <P>Sistema de Verificacion de Ambientes</P>
  </div>
  
  </div>
 <div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container-fluid">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <a class="brand" href="#">S.V.A  Instructor </a>
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
                   <a tabindex="-1" href="opcioninstru.php">Atras</a>
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
    <div class="margin12" id="margin12"><br>
    <?php
 
$host="localhost";
$usuario="root";
$password="";
$db="dbtest";

$conexion = new mysqli($host,$usuario,$password,$db);
$sql = "select * from formularioinstructor";
$query=$conexion->query($sql);
    
  $tbHtml="";
  
  if($query->num_rows>0){
    
          echo "<center><table border='1px'>
             <header>
                <tr>
                  
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>Cedula</th>
                  <th>Cargo</th>
                  <th>Correo</th>
                  <th>Pregunta 1</th>
                  <th>Pregunta 2</th>
                  <th>Pregunta 3</th>
                  <th>Pregunta 4</th>
                  <th>Pregunta 5</th>
                  <th>Pregunta 6</th>
                  
                  <th>Departamentos</th>
                  <th>Ciudades</th>
                  <th>Centros</th>
                  <th>Sede</th>
                  <th>Ambientes</th>
                  <th>Fichas</th>
                  <th>Jornadas</th>
                  </tr>
            </header>";
    
    while($res=$query->fetch_array())
    {
         echo '<tr>
        
        <td><center>'.$res['nombres'].'</td>
        <td><center>'.$res['apellidos'].'</td>
        <td><center>'.$res['cedula'].'</td>
        <td><center>'.$res['cargo'].'</td>
        <td><center>'.$res['correo'].'</td>
        <td><center>'.$res['pregunta1'].'</td>
        <td><center>'.$res['pregunta2'].'</td>
        <td><center>'.$res['pregunta3'].'</td>
        <td><center>'.$res['pregunta4'].'</td>
        <td><center>'.$res['pregunta5'].'</td>
        <td><center>'.$res['pregunta6'].'</td>
        
        <td><center>'.$res['departamento'].'</td>
        <td><center>'.$res['ciudades'].'</td>
        <td><center>'.$res['centros'].'</td>
        <td><center>'.$res['sede'].'</td>
        <td><center>'.$res['ambientes'].'</td>
        <td><center>'.$res['ficha'].'</td>
        <td><center>'.$res['jornada'].'</td>
        
        
        
  </tr>
  ';
    }
    $tbHtml.= "</table>";
  }
  else
  {
  echo "<center><br>No hay resultados";
  }

?>
<p>Listade Chequeo</p>
  </div>
    <script src="../bootstrap/js/jquery-1.9.1.min.js"></script> 
    <script src="../bootstrap/js/bootstrap.min.js"></script> 
    <script src="../assets/scripts.js"></script> 
</body> 
</html> 
