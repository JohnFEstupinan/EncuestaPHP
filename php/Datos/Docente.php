<?php
    include_once('conexion.php');

        function ObtenerDocentePorId($IdDocente){
            $CadenaConexion = ConectarABD();

            $Consulta = "Select NomApell_Docente from tbl_docente where Id_Docente = $IdDocente";

            $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
            or die ("Error en la consulta, verifique: ".@mysqli_error($CadenaConexion));
            
           While($Resultado = @mysqli_fetch_array($ResultadoConsulta,MYSQLI_ASSOC)){
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

        function ObtenerIdDocente($IdDocente){
            $CadenaConexion = ConectarABD();

            $Consulta = "Select Id_Docente from tbl_docente where Id_Docente = $IdDocente";

            $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
            or die ("Error en la consulta, verifique: ".@mysqli_error($CadenaConexion));
            
            foreach(@mysqli_fetch_array($ResultadoConsulta,MYSQLI_ASSOC) as $Resultado){
                return $Resultado['Id_Docente'];
            }         
        }
        
    @mysqli_close($CadenaConexion);
?>