<?php

    include('conexion_bd.php');

    class AlumnoDAO{

        private $conexion;

        public function __construct(){
            $this->conexion = new ConexionBD();
        }

        //======================== METODOS PARA ABCC ===========================

        //------------------------ ALTAS -----------------------------------
        public function agregarAlumno($nc, $n, $pa, $sa ,$e, $s, $c){
            
            $sql = "INSERT INTO alumnos VALUES ('$nc', '$n', '$pa', '$sa', $e, $s, '$c')";

            //var_dump($sql);

            if(mysqli_query($this->conexion->getConexion(), $sql)){
                //echo "PERFECTO, CASI SOY ISC   =) ";
                //echo "<script> alert('Agregado con EXITO'); </script>";
                header('location:../vista/formulario_altas.php');
            }else{
                echo "¿SERA MUY TARDE PARA CAMBIAR DE CARRERA?????   =(    ";
                echo mysqli_error($this->conexion->getConexion());
            }
        }//agregar
        
        //------------------------ BAJAS -----------------------------------
        public function eliminarAlumno($nc){
            $sql = "DELETE FROM alumnos WHERE Num_Control='$nc'";
            //var_dump($sql);
            if(mysqli_query($this->conexion->getConexion(), $sql)){
                //echo "PERFECTO, CASI SOY ISC   =) ";
                //echo "<script> alert('Agregado con EXITO'); </script>";
                header('location:../vista/formulario_bajas.php');
            }else{
                echo "¿SERA MUY TARDE PARA CAMBIAR DE CARRERA?????   =(    ";
                echo mysqli_error($this->conexion->getConexion());
            }
        }//eliminar

        
        //------------------------ CAMBIOS -----------------------------------

        public function modificarAlumno($nc, $nom, $priap, $segap, $edad, $sem, $carr){
            $sql = "UPDATE alumnos set Nombre_Alumno=$nom, Primer_Ap_Alumno=$priap, Segundo_Ap_Alumno=$segap, Edad= $edad, Semestre=$sem, Carrera=$carr where Num_Control=$nc";
            
            if (mysqli_query($this->conexion->getConexion(), $sql)) {
                header('location:../vista/formulario_cambios.php');
            }else{
                echo "¿SERA MUY TARDE PARA CAMBIAR DE CARRERA?????   =(    ";
                echo mysqli_error($this->conexion->getConexion());
            }

        }


        //------------------------ CONSULTAS -----------------------------------



    }//class
?>