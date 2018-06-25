<!DOCTYPE html>
<html class="no-js">
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../../../css/home2.css">
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
$db="dbtest";

$conexion = new mysqli($host,$usuario,$password,$db);
$sql = "select * from centro";
$query=$conexion->query($sql);
 	
	echo "<p>Centros Registrados</p>";	
	$tbHtml="";
	
	if($query->num_rows>0){
		
	        echo "<center><table border='1px'>
             <header>
                <tr>
                  <th>Centro</th>
                  <th>ID</th>
                  </tr>
            </header>";
		
		while($res=$query->fetch_array())
		{
         echo '<tr>
		
        <td>'.$res['CentroNom'].'</td>
        <td>'.$res['idCentro'].'</td>
		
	</tr>
	';
		}
		$tbHtml.= "</table>";
	}
	else
	{
	echo "<br>No hay resultados";
	}
	//cambiar los datos por productos
	
?>
<p><a href=/ProyectoADSI/GestionAmbientes2/Centros/centro.php id="volver"><br>Volver menu principal</a></p>
  </div>
    <script src="../bootstrap/js/jquery-1.9.1.min.js"></script> 
    <script src="../bootstrap/js/bootstrap.min.js"></script> 
    <script src="../assets/scripts.js"></script> 
</body> 
</html> 