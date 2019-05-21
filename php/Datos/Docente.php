<?php
    include_once('conexion.php');

        function ObtenerDocentePorId($IdDocente){

            $CadenaConexion = ConectarABD();

            $Consulta = "Select NomApell_Docente from tbl_docente where Id_Docente = $IdDocente";

            $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
            or die ("Error en la consulta, verifique: ".@mysqli_error($CadenaConexion));
            
            while ($Resultado = @mysqli_fetch_array($ResultadoConsulta,MYSQLI_ASSOC)){
                return $Resultado['NomApell_Docente'];
            }
           
         
        }

        function ObtenerDatosDocente($IdDocente){

            $CadenaConexion = ConectarABD();

            $Consulta = "Select NomApell_Docente from tbl_docente where Id_Docente = $IdDocente";

            $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
            or die ("Error en la consulta, verifique: ".@mysqli_error($CadenaConexion));

            return $ResultadoConsulta;
         
        }
        
    @mysqli_close($CadenaConexion);
?>