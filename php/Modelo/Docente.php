<?php
    include('conexion.php');

    class Docente{

        function ObtenerNombreDocentePorId($IdDocente){

            $CadenaConexion = ConectarABD();

            $Consulta = "Select NomApell_Docente from tbl_docente where Id_Docente = $IdDocente";

            $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
            or die ("Error en la consulta, verifique: ".@mysqli_error($CadenaConexion));
            
            return $ResultadoConsulta;
        }
    }
?>