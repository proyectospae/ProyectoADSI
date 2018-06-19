<?php
require('conexion.php');

if($_POST){
$sql="INSERT INTO formularioinstructor (nombres, apellidos, cedula, cargo, correo, pregunta1, pregunta2, pregunta3, pregunta4, pregunta5, pregunta6, departamento, ciudades, centros, sede, ambientes, ficha, jornada) VALUES('$_POST[txtNombres]','$_POST[txtApellidos]','$_POST[txtCedula]','$_POST[txtCargo]','$_POST[txtCorreo]','$_POST[cbopreg1]','$_POST[cbopreg2]','$_POST[cbopreg3]','$_POST[cbopreg4]','$_POST[cbopreg5]','$_POST[cbopreg6]','$_POST[txtDepartamento]','$_POST[txtCiudades]','$_POST[txtCentros]','$_POST[txtSede]','$_POST[txtAmbiente]','$_POST[txtFicha]','$_POST[txtJornada]')";
$resultado = $mysqli->query($sql);
if($resultado){
    echo"Insertado Exitosamente";
}else{
    echo "no se inserto ni mierda";   
}
}else{
    echo "error";
}

?>