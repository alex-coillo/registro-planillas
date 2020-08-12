<?php
include("conexion.php");
if(isset($_POST['ca']) && !empty($_POST['ca'])){
      echo "valor 1";
      $ca = $_POST['ca'];
      echo $ca."\n";
}
else{
      
      $ca=0;
      echo "cero";
      echo $ca."\n";
}


if (isset($_POST['programa']) && !empty($_POST['programa'])&&
    isset($_POST['docente']) && !empty($_POST['docente'])&&
    isset($_POST['asignatura']) && !empty($_POST['asignatura'])&&
    isset($_POST['pp']) && !empty($_POST['pp'])&&
    isset($_POST['vc']) && !empty($_POST['vc'])&&
    
    isset($_POST['comunicacion']) && !empty($_POST['comunicacion'])&&
    isset($_POST['e']) && !empty($_POST['e'])) {
      
      $programa = $_POST['programa'];
      $docente = $_POST['docente'];
      $asignatura = $_POST['asignatura'];
      $pp = $_POST['pp'];
      $vc = $_POST['vc'];
     
      $comunicacion = $_POST['comunicacion'];
      $e = $_POST['e'];


      $fecha=date('Y-m-d');
      $usuario='usuariope';
      

      
      


      $cone= new mysqli($dbHost,$dbUser,$dbPass,$dbName) or die("Problemas en la conexión");

      mysqli_set_charset($cone,'utf8');
      mysqli_query($cone,"CALL insertar_datos('$programa','$docente','$asignatura','$pp','$vc','$ca','$comunicacion','$e','$fecha','$usuario')");
     // header("location: index.php");  
      mysqli_close($cone);
} else {
        echo "Problemas al insertar los datos... generales";  
}
?>