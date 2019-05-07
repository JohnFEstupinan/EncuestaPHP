<?php
    include_once('conexion.php');

    function  GuardarEncuesta($GrupoDigitado,$IdCompetencia,$IdDocente){
        $CadenaConexion = ConectarABD();

        $Consulta ="INSERT INTO `tbl_copiaen`('Num_Grupo','Id_Competencia','Id_Docente') 
        VALUES ($GrupoDigitado,$IdCompetencia,$IdDocente) ";

        echo "Consulta ".$Consulta."<br/> ";

        $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
        or die ('Error al realizar la consulta: '.@mysqli_error($CadenaConexion));

    }
?>