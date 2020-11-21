<?php
    class ConexionBD{
        private $conexion;

        private $host = 'localhost:3306';
        private $usuario = 'root';
        private $contraseña = 'Berenice';
        private $bd = 'Usuarios_BD_Escuela';

        public function __construct(){
            $this->conexion = mysqli_connect($this->host, $this->usuario, $this->contraseña, $this->bd);

            if(!$this->conexion)
                die("Error en conexion: ". mysqli_connect_error() . mysqli_connect_errno()); 
        }
        public function getConexion(){ return $this->conexion;}
    }

?>