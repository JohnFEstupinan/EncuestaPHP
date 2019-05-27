<?php
    include_once('conexion.php');

    function  GuardarEncuesta($GrupoDigitado, $IdCompetencia, $IdDocente, $Respuesta){
        $CadenaConexion = ConectarABD();

        foreach ($Respuesta as $IdPregunta => $ValorPregunta) {
            $Consulta =  "INSERT INTO tbl_copiaen (Num_Grupo,Id_Competencia,Id_Docente,Id_Preguntas,Evaluacion) VALUES ($GrupoDigitado,$IdCompetencia,$IdDocente,$IdPregunta,'$ValorPregunta')";

            @mysqli_query($CadenaConexion, $Consulta) or die("Error al guardar la encuesta en la BD,
            revisar la consulta: " .@mysqli_error($CadenaConexion));
        }
    
    }

    function ConsultarObservacionesDocente($Id_Docente){
        $CadenaConexion = ConectarABD();

        $Consulta = "Select Evaluacion from tbl_copiaen where Id_Preguntas = 23 AND Id_Docente = $Id_Docente";

        $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta) 
        or die ("Error al Consultar las Observaciones: ".@mysqli_error($CadenaConexion));

        return $ResultadoConsulta;
    }

    function PromedioPorGrupo($Id_Docente){
        $CadenaConexion = ConectarABD();

        $Consulta = "SELECT Num_Grupo, ROUND(AVG(Evaluacion),1) as 'PromedioGrupo' FROM tbl_copiaen WHERE Id_Docente = $Id_Docente AND Id_Preguntas BETWEEN 1 AND 22 GROUP BY Num_Grupo";

        $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta) 
        or die ("Error al Consultar las Observaciones: ".@mysqli_error($CadenaConexion));

        return $ResultadoConsulta;
    }

    function PromedioGeneralDocente($Id_Docente){
        $CadenaConexion = ConectarABD();

        $Consulta = "Select Id_Docente, ROUND(AVG(Evaluacion),1) as 'PromedioGeneral' from tbl_copiaen where Id_Preguntas BETWEEN 1 and 22 AND Id_Docente = $Id_Docente";

        $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta) 
        or die ("Error al Consultar las Observaciones: ".@mysqli_error($CadenaConexion));

        return $ResultadoConsulta;
    }

    function ValidarSiExisteEncuesta($Id_Docente){
        $CadenaConexion = ConectarABD();

        $Consulta = "SELECT * FROM `tbl_copiaen` WHERE Id_Docente = $Id_Docente";   

        $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta) 
        or die ("Error al intentar validar si existe la encuesta: ".@mysqli_error($CadenaConexion));
     
        $can = @mysqli_fetch_row($ResultadoConsulta);

        if($can != ""){
            return true;
        }else{
            return false;
        }
    }
      
    @mysqli_close($CadenaConexion);
?>