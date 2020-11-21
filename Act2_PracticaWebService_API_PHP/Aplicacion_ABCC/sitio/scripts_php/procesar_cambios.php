<?php

    include('alumnoDAO.php');

    //validacion de datos

    $nc = $_POST['caja_num_controlc'];
    $n = $_POST['caja_nombrec'];
    $pa = $_POST['caja_primer_apc'];
    $sa = $_POST['caja_segundo_apc'];
    $e = $_POST['caja_edadc'];
    $s = $_POST['select_semestrec']; //select_semestre
    $c = $_POST['caja_carrerac'];

    $aDAO = new AlumnoDAO();

    $aDAO->modificarAlumno($nc, $n, $pa, $sa ,$e, $s, $c);
?>