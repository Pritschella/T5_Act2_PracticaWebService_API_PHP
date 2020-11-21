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
    <title>MODIFICAR ALUMNO</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>

</head>
    <body>
    
        <?php
            require_once('header.html');
        
            echo "<p style=\"text-align:center; color:red;\"> REGISTRO .......... </p>";


            include('../scripts_php/conexion_bd.php');
            $nc = $_GET['nc'];

            $con = new ConexionBD();
                $conexion = $con->getConexion();
                //var_dump($conexion);
                $sql = "SELECT * FROM alumnos WHERE num_control= $nc";

                $res = mysqli_query($conexion, $sql);

                if(mysqli_num_rows($res)>0){

                    //mysqli_fetch_row
            while( $fila = mysqli_fetch_assoc($res) ){
                                $nom=$fila['Nombre_Alumno'];
                                $priap=$fila['Primer_Ap_Alumno'];
                                $segap=$fila['Segundo_Ap_Alumno'];
                                $edad=$fila['Edad'];
                                $sem=$fila['Semestre'];
                                $carr=$fila['Carrera'];
                       
            }

        }else{
            //no hay datos
        }

        ?>

        <h4 style="background-color:#29C053; 
                    text-align:center; 
                    padding:15px; 
                    margin-bottom:15px;
                    border: 0px;"> MODIFICAR ALUMNO</h4>

        <form method="POST" action="../scripts_php/procesar_cambios.php" style="width:80%; padding-left:10%;">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Numero de control</label>
                    <input type="text" class="form-control" id="inputEmail4" placeholder="Numero de control" 
                            name="caja_num_controlc" readonly value="<?php echo $nc?>">
                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4">Nombre</label>
                <input type="text" class="form-control" id="inputPassword4" placeholder="Nombre"
                            name="caja_nombrec" value="<?php echo $nom ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputAddress">Primer Apellido</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Primer AP"
                        name="caja_primer_apc" value="<?php echo $priap ?>">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Segundo Apellido</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Segundo AP"
                        name="caja_segundo_apc" value="<?php echo $segap ?>">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Edad</label>
                    <input type="text" class="form-control" id="inputEdad" name="caja_edadc" value="<?php echo $edad ?>">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Semestre</label>
                    <select id="inputState" class="form-control"  name="select_semestrec" selected="<?php echo $sem ?>">
                        <option>Elige opcion...</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                        <option>6</option>
                        <option>7</option>
                        <option>8</option>
                        <option>9</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                <label for="inputZip">Carrera</label>
                <input type="text" class="form-control" id="inputZip"  name="caja_carrerac" value="<?php echo $carr ?>">
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary" >GUARDAR ALUMNO</button>
        </form>

    </body>
</html>