<?php

    session_start();
    include('alumnoDAO.php');

    


    $nc = $_POST['caja_num_control'];
    $n = $_POST['caja_nombre'];
    $pa = $_POST['caja_primer_ap'];
    $sa = $_POST['caja_segundo_ap'];
    $e = $_POST['caja_edad'];
    $s = 5; //select_semestre
    $c = $_POST['caja_carrera'];


    //validacion de datos POR CAMPO !!!!!!!!!!!!!!!!!!!
   $datos_validos = false;
   //validacion de NUMERO DE CONTROL
    if(strlen($nc)>0 && is_numeric($nc)){ 
        $datos_validos = true;
    }else{
        $datos_validos = false;
        $_SESSION['errorNunControl'] = "* ¡Dato incorrecto (no letras)!";
        $_SESSION['datoNumControl']=$nc;
    }

    //validacion de NOMBRE
    if(strlen($n)>0 && ctype_alpha($n)){ 
        $datos_validos = true;
    }else{
        $datos_validos = false;
        $_SESSION['errorNombre'] = "* ¡Dato incorrecto (no numeros)!";
        $_SESSION['datoNombre'] = $n;
    }

    if($datos_validos){
        $aDAO = new AlumnoDAO();

    $aDAO->agregarAlumno($nc, $n, $pa, $sa ,$e, $s, $c);
    }else{

        //Cerar conexion
        //$_SESSION['errorNombre'] = "* ¡Dato incorrecto (no numeros)!";
       // $_SESSION['datoNombre'] = $n;
        header('location:../vista/formulario_altas.php');


    }
   
    
?>