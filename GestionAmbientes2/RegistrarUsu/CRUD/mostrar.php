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
    <div class="margin8" id="margin8">
<?php
 
$host="localhost";
$usuario="root";
$password="";
$db="modelo";

$conexion = new mysqli($host,$usuario,$password,$db);
$sql = "select * from sedes";
$query=$conexion->query($sql);
 	
	echo "<p>Ambientes Registrados</p>";	
	$tbHtml="";
	
	if($query->num_rows>0){
	        echo "<center><table border='1px'>
             <header>
                <tr>
                  <th>ID</th>
                  <th>Sedes</th>
                  </tr>
            </header>";
		while($res=$query->fetch_array())
		{
         echo '<tr>
		<td>'.$res['idSedes'].'</td>
        <td>'.$res['SedesNom'].'</td>
	</tr>
	';
		}
		$tbHtml.= "</table>";
	}
	else
	{
	echo "<center><br>No hay resultados";
	}
	//cambiar los datos por productos
?>
<p><a href="http://localhost:8080/ProyectoADSI/GestionAmbientes2/Sedes/sedes.php" id="volver"><br>Volver menu principal</a></p>
  </div>
    <script src="../bootstrap/js/jquery-1.9.1.min.js"></script> 
    <script src="../bootstrap/js/bootstrap.min.js"></script> 
    <script src="../assets/scripts.js"></script> 
</body> 
</html> 