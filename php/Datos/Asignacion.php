<?php
    include_once ('conexion.php');



        function ObtenerDatosAsignacionPorGrupo($GrupoDigitado,$IteracionesCompetencia){
            $CadenaConexion = ConectarABD();

            $Consulta = "Select * from tbl_asignacion Where Num_Grupo = $GrupoDigitado order by Id_Competencia Limit $IteracionesCompetencia , 1 ";
            
            $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
            or die ("Error al realizar la consulta: ".@mysqli_error($CadenaConexion));

            $Fila = @mysqli_fetch_array($ResultadoConsulta,MYSQLI_ASSOC);
                
            return $Fila;
        }

        function CantidadDeAsignacionesPorGrupo($GrupoDigitado){
            $CadenaConexion = ConectarABD();

            $Consulta = "SELECT COUNT(Id_Competencia) from tbl_asignacion where Num_Grupo = $GrupoDigitado";

            $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
            or die ("Error al realizar la consulta: ".@mysqli_error($CadenaConexion));

            return $ResultadoConsulta;
        }

    @mysqli_close($CadenaConexion);
?>