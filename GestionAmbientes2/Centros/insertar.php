<!DOCTYPE html>
<html class="no-js">
<head>
  <title></title>
  <link rel="stylesheet" type="text/css" href="../../css/home2.css">
  <link href="../../bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
</head>
<body>
  <div class="margin" id="margin">
    <P>Sistema de Verificacion de Ambientes</P>
  </div>
   <div class="margin5" id="margin5">
    <form name="form1" method="post" action="CRUD/registrar.php"><br><br>
      <p2 id="p2"><center>Formulario de Registro</center></p2>
      <table width="200" border="1"><br><br>
        ID Centro:
        <input type="text" name="ID" id="ID" required="">
        Centro:
        <input type="text" name="centronombre" id="centronombre" required="">
        ID de Ciudad:
        <input type="text" name="IDciudad" id="IDciudad" required="">

        <input type="submit" name="Guardar" id="Guardar" value="Enviar">
      </table>
    </form>
    <p><a href="/ProyectoADSI/GestionAmbientes2/Centros/centro.php" id="volver">Volver menu principal</a></p>
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