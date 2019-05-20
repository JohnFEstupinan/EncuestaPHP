<?php
include_once('conexion.php');


function  GuardarEncuesta($GrupoDigitado, $IdCompetencia, $IdDocente, $Respuesta)
{
    $CadenaConexion = ConectarABD();

    foreach ($Respuesta as $IdPregunta => $ValorPregunta) {
       $Consulta =  "INSERT INTO tbl_copiaen (Num_Grupo,Id_Competencia,Id_Docente,Id_Preguntas,Evaluacion) VALUES ($GrupoDigitado,$IdCompetencia,$IdDocente,$IdPregunta,'$ValorPregunta')";
        @mysqli_query($CadenaConexion, $Consulta) or die("Error al guardar la encuesta en la BD,
        revisar la consulta: " .@mysqli_error($CadenaConexion));
    }
}

@mysqli_close($CadenaConexion);
