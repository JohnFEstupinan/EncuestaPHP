<?php
    include_once('conexion.php');
        
        function ObtenerCompetenciaPorId($IdCompetencia){
            
            $CadenaConexion = ConectarABD();

            $Consulta = "Select Nom_Competencia  from tbl_competencia where Id_Competencia = $IdCompetencia";

            $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
            or die ("Error en la consulta, verifique: ".@mysqli_error($CadenaConexion));

           while ($Resultado = @mysqli_fetch_array($ResultadoConsulta,MYSQLI_ASSOC)){
               return $Resultado['Nom_Competencia'];
           }
        }
        
    @mysqli_close($CadenaConexion);
?>