<?php
    session_start();
    if($_SESSION['autenticado'] == false){
        header("location:../vista/login_usuario.php");
    }
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>BAJA ALUMNOS</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
        <script src='main.js'></script>
        <style>
            #customers {
                font-family: Arial, Helvetica, sans-serif;
                border-collapse: collapse;
                width: 100%;
            }

            #customers td, #customers th {
                border: 1px solid #ddd;
                padding: 8px;
            }

            #customers tr:nth-child(even){background-color: #f2f2f2;}

            #customers tr:hover {background-color: #ddd;}

            #customers th {
                padding-top: 12px;
                padding-bottom: 12px;
                text-align: left;
                background-color: #4CAF50;
                color: white;
            }
        </style>
    </head>
    <body>
    
        <?php
            require_once('header.html');
        ?>

        <h4 style="background-color: red;
                    color: white; 
                    text-align:center; 
                    padding:15px; 
                    margin-bottom:15px;
                    border: 0px;"> MODIFICAR ALUMNOS ALUMNOS</h4>

        <table id="customers" >

            <tr>  <th>Num. Control</th><th>Nombre</th><th>Primer Ap.</th><th>Segundo Ap.</th><th>Edad</th><th>Semestre</th><th>Carrera</th> <th>ACCIONES</th></tr>

            <?php

                include('../scripts_php/conexion_bd.php');

                $con = new ConexionBD();
                $conexion = $con->getConexion();
                //var_dump($conexion);
                $sql = "SELECT * FROM alumnos";

                $res = mysqli_query($conexion, $sql);
                //var_dump($res);

                if(mysqli_num_rows($res)>0){

                            //mysqli_fetch_row
                    while( $fila = mysqli_fetch_assoc($res) ){
                            printf("<tr><td>".$fila['Num_Control']."</td>".
                                        "<td>".$fila['Nombre_Alumno']."</td>".
                                        "<td>".$fila['Primer_Ap_Alumno']."</td>".
                                        "<td>".$fila['Segundo_Ap_Alumno']."</td>".
                                        "<td>".$fila['Edad']."</td>".
                                        "<td>".$fila['Semestre']."</td>".
                                        "<td>".$fila['Carrera']."</td>".
                                "<td> <a href='../vista/formulario_cambios2.php?nc=%s'>Editar</a> <td/> </tr>", $fila['Num_Control'] );
                    }

                }else{
                    //no hay datos
                }

            ?>
        </table>
    </body>
</html>