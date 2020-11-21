<?php

include('../scripts_php/conexion_bd.php');
$con = new ConexionBD();
$conexion = $con->getConexion();
$parametro=$_POST['parametro'];

$sql="SELECT * FROM alumnos WHERE Num_Control LIKE '%$parametro%' or Nombre_Alumno LIKE '%$parametro%' or Primer_Ap_Alumno LIKE '%$parametro%' or Segundo_Ap_Alumno LIKE '%$parametro%' or Edad LIKE '%$parametro%' or Semestre LIKE '%$parametro%' or Carrera LIKE '%$parametro%'";

$resultado=mysqli_query($conexion,$sql);

//var_dump($resultado);
if(mysqli_num_rows($resultado)>0){
    //mysqli_fetch_row
    require_once('../vista/formulario_consultas.php');
    ?>
    <table id="customers">
      <tr> <th>Num. Control</th> 
           <th>Nombre</th> 
           <th>Primer Ap.</th> 
           <th>Segundo Ap.</th>
           <th>Edad</th> 
           <th>Semestre</th> 
           <th>Carrera</th> 
        </tr>

    <?php
    
    while($fila=mysqli_fetch_assoc($resultado)){
        printf("<tr> <td>".$fila['Nombre_Alumno']."</td>".
                     "<td>".$fila['Num_Control']."</td>". 
                     "<td>".$fila['Primer_Ap_Alumno']."</td>".
                     "<td>".$fila['Segundo_Ap_Alumno']."</td>".
                     "<td>".$fila['Edad']."</td>".
                     "<td>".$fila['Semestre']."</td>".
                     "<td>".$fila['Carrera']."</td></tr>"     
        );
    }
}else{
    echo ('No hay registros que coincidan');
}

?>