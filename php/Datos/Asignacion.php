<?php
    include_once ('conexion.php');

        function ObtenerCantidadAsignacionPorGrupo($GrupoDigitado){
        
            $CadenaConexion = ConectarABD();

            $Consulta = "Select * from tbl_asignacion Where Num_Grupo = $GrupoDigitado";

            $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
            or die ("Error al realizar la consulta: ".@mysqli_error($CadenaConexion));

            if (@mysqli_num_rows($ResultadoConsulta) > 0 ){
                 $CantidadDeFilas = @mysqli_num_rows($ResultadoConsulta);
            }else{
                 $CantidadDeFilas = 0;
            }
            return $CantidadDeFilas;
        }

        function ObtenerDatosAsignacionPorGrupo($GrupoDigitado){
            $CadenaConexion = ConectarABD();

            $Consulta = "Select * from tbl_asignacion Where Num_Grupo = $GrupoDigitado";

            $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
            or die ("Error al realizar la consulta: ".@mysqli_error($CadenaConexion));

            while($Resultado = @mysqli_fetch_array($ResultadoConsulta,MYSQLI_ASSOC)){
                return $Resultado;
            }

            return $Resultado;
        }
    @mysqli_close($CadenaConexion);
?>