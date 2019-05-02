<?php
    include('conexion.php');
    
    class Preguntas{
        function ListarPreguntas(){
    
            $CadenaConexion = ConectarABD();
      
            $Consulta = "Select *  from tbl_preguntas ";
           // $Consulta = "Select Id_Preguntas, Pregunta  from tbl_preguntas ";
      
            $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
            or die ("Error en la consulta, verifique: ".@mysqli_error($CadenaConexion));
      
            return $ResultadoConsulta;
        }
    }
?>