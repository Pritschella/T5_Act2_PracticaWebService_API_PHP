<?php

    include('alumnoDAO.php');

    //validacion datos

    $aDAO = new AlumnoDAO();

    $nc = $_GET['nc'];

    $aDAO->eliminarAlumno($nc);
?>