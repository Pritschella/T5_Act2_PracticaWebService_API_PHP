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
    <title>ALTA ALUMNOS</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>

</head>
    <body>
    
        <?php
            require_once('header.html');
        
            echo "<p style=\"text-align:center; color:red;\"> REGISTRO .......... </p>";
        ?>

        <h4 style="background-color:#29C053; 
                    text-align:center; 
                    padding:15px; 
                    margin-bottom:15px;
                    border: 0px;"> AGREGAR ALUMNOS</h4>

        <form method="POST" action="../scripts_php/procesar_altas.php" style="width:80%; padding-left:10%;">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputEmail4">Numero de control</label>

                    <span style="color:red;">
                    <?php echo isset($_SESSION['errorNumControl']);?> </span>

                    <input type="text" class="form-control" id="inputEmail4" placeholder="Numero de control" 
                            name="caja_num_control" 
                            value="<?php echo isset($_SESSION['datoNumControl']); ?>">

                </div>
                <div class="form-group col-md-6">
                <label for="inputPassword4">Nombre</label>

                <span style="color:red;">
                    <?php echo isset($_SESSION['errorNombre'])?$_SESSION['errorNombre']: "" ?> </span>
                
                <input type="text" class="form-control" id="inputPassword4" placeholder="Nombre"
                            name="caja_nombre"
                            value="<?php echo isset($_SESSION['datoNombre']); ?>">
                </div>
            </div>

            <div class="form-group">
                <label for="inputAddress">Primer Apellido</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Primer AP"
                        name="caja_primer_ap">
            </div>
            <div class="form-group">
                <label for="inputAddress2">Segundo Apellido</label>
                <input type="text" class="form-control" id="inputAddress2" placeholder="Segundo AP"
                        name="caja_segundo_ap">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCity">Edad</label>
                    <input type="text" class="form-control" id="inputEdad" name="caja_edad">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputState">Semestre</label>
                    <select id="inputState" class="form-control"  name="select_semestre">
                        <option selected>Elige opcion...</option>
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                    </select>
                </div>
                <div class="form-group col-md-2">
                <label for="inputZip">Carrera</label>
                <input type="text" class="form-control" id="inputZip"  name="caja_carrera">
                </div>
            </div>
            
            <button type="submit" class="btn btn-primary" >GUARDAR ALUMNO</button>
        </form>

    </body>
</html>

<?php
    unset($_SESSION['errorNumControl']);
    unset($_SESSION['datoNumControl']);

    unset($_SESSION['errorNombre']);
    unset($_SESSION['datoNombre']);
?>