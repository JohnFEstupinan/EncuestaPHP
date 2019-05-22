<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/estilosBotonEnviarEncuesta.css" type="text/css" />
        <link rel="stylesheet" href="../../css/estilosVolverAEncuesta.css" type="text/css" />
        <link rel="icon" type="image/png" href="..\..\IconImages\IconoEncuesta.png" />
        <title>
            Encuesta
        </title>
    </head>
    <body>
        
            <?php
                /*
                    Archivos que hacen referencia a las funciones necesarias
                */
                include_once('..\Datos\Grupo.php');
                include_once('..\Datos\Asignacion.php');
                include_once('..\Datos\Competencia.php');
                include_once('..\Datos\Docente.php');
                include_once('LogicaEncuesta.php');
                include_once('LogicaGrupo.php');
                include_once('LogicaPreguntas.php');
                //include_once('C:\xampp\htdocs\ProyectoAmbientesWeb\php\Presentacion\FrmPreguntas.php');
            ?>

            <?php
                    
                    $GrupoDigitado = $_POST['Grupo'];                   
                    $IteracionCompetencia = isset($_POST['IteracionesCompetencia']) ? $_POST['IteracionesCompetencia'] : 0;
                    $Respuesta = isset($_POST['Respuesta']) ? $_POST['Respuesta'] : null;
                    $IdCompetencia = isset($_POST['IdCompetencia']) ? $_POST['IdCompetencia'] : null;
                    $IdDocente = isset($_POST['IdDocente']) ? $_POST['IdDocente'] : null;

                    if(ValidarExisteGrupoLogica($GrupoDigitado)){            
                        $Grupo = ObtenerIdGrupoLogica($GrupoDigitado);
           

                        if($Respuesta != null){                            
                            GuardarEncuestaLogica($GrupoDigitado,$IdCompetencia,$IdDocente,$Respuesta);
                        }

                        $Asignacion = ObtenerDatosAsignacionPorGrupo($GrupoDigitado,$IteracionCompetencia);

                        $IdCompetencia = $Asignacion['Id_Competencia'];
                        $IdDocente = $Asignacion['Id_Docente'];

                        if($IdCompetencia == ""){
                            header('location: ..\Presentacion\FrmEncuestaTerminada.php');
        
                            die;    
                        }else{
                            $NombreCompetencia = ObtenerCompetenciaPorId($IdCompetencia);
                            $NombreDocente = ObtenerDocentePorId($IdDocente);
                            $TraerPreguntas = RetornaPreguntas();
                        }                    
                    }else{
                        header('location: ..\Presentacion\FrmErrorIngresarGrupo.php');
                        die;        
                    }
            ?>
            <form action="GrupoControl.php" method="POST">
                <?php
                        MostrarDatosEncuesta($Grupo,$NombreCompetencia,$NombreDocente);                    
                        MostrarPreguntas($TraerPreguntas);                        
                ?>
                <input name="Grupo" type="hidden" value="<?php print $GrupoDigitado ?>">
                <input name="IdCompetencia" type="hidden" value="<?php print $IdCompetencia ?>">
                <input name="IdDocente" type="hidden" value="<?php print $IdDocente ?>">
                <input name="IteracionesCompetencia" type="hidden" value=<?php print (++$IteracionCompetencia) ?>>
                <input name="Enviar" type="submit" value="Enviar Encuesta" class="btnEnviar">
            </form>
    </body>
</html>