<?php
    include('conexion.php');

    class Competencia{
        
        function ObtenerCompetenciaPorId($IdCompetencia){
            
            $CadenaConexion = ConectarABD();

            $Consulta = "Select Nom_Competencia from tbl_competencia where 	Id_Competencia = $IdCompetencia";

            $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
            or die ("Error en la consulta, verifique: ".@mysqli_error($CadenaConexion));

            return $ResultadoConsulta;
        }
    }
?>