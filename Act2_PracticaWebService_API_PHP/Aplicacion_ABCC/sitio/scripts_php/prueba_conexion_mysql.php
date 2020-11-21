
<?php

    include('conexion_bd.php');
    //include_once
    //require
    //require_once

    $con= new ConexionBD();

    $conexion = $con->getConexion();

    var_dump($conexion);

?>