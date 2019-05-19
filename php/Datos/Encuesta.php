<?php
    include_once('conexion.php');

    function  GuardarEncuesta($GrupoDigitado,$IdCompetencia,$IdDocente,$Respuesta){
        $CadenaConexion = ConectarABD();

        foreach($Respuesta as $CodPregunta => $ValorPregunta)
        {
            $Consulta ="INSERT INTO `tbl_copiaen`('Num_Grupo','Id_Competencia','Id_Docente','Id_Preguntas' ,'Evaluacion') 
            VALUES ($GrupoDigitado,$IdCompetencia,$IdDocente,$CodPregunta,$ValorPregunta) ";
        }
       

        echo "Consulta ".$Consulta."<br/> ";

        $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
        or die ('Error al realizar la consulta: '.@mysqli_error($CadenaConexion));

    }

    @mysqli_close($CadenaConexion);
?>