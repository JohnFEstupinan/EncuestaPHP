<?php
    include ('conexion.php');
    class Asignacion{

        function ObtenerCantidadAsignacionPorGrupo(){
        
            $CadenaConexion = ConectarABD();

            $Consulta = "Select * from tbl_asignacion Where Num_Grupo = 4";

            $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
            or die ("Error al realizar la consulta: ".mysqli_error($CadenaConexion));

            $CantidadDeFilas = mysqli_num_rows($ResultadoConsulta)
             or die ("Error al obtener la cantidad de filas: ".mysqli_error($CadenaConexion));

            return $CantidadDeFilas;
        }
    }
?>