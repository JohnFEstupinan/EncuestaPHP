<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>
            Encuesta
        </title>
    </head>
    <body>
        
            <?php
                /*
                    Archivos que hacen referencia a las funciones necesarias
                */
                include_once('C:\xampp\htdocs\ProyectoAmbientesWeb\php\Datos\Grupo.php');
                include_once('C:\xampp\htdocs\ProyectoAmbientesWeb\php\Datos\Asignacion.php');
                include_once('C:\xampp\htdocs\ProyectoAmbientesWeb\php\Datos\Competencia.php');
                include_once('C:\xampp\htdocs\ProyectoAmbientesWeb\php\Datos\Docente.php');
                include_once('LogicaEncuesta.php');
                include_once('LogicaGrupo.php');
                include_once('C:\xampp\htdocs\ProyectoAmbientesWeb\php\Presentacion\FrmPreguntas.php');
            ?>

            <?php
                    
                    $GrupoDigitado = $_POST['Grupo'];
                    $respuesta = isset($_POST['respuesta']) ? $_POST['respuesta'] : null;
                    $IteracionCompetencia = isset($_POST['IteracionesCompetencia']) ? $_POST['IteracionesCompetencia'] : 0;
                    $IdCompetencia = isset($_POST['IdCompetencia']) ? $_POST['IdCompetencia'] : null;
                    $IdDocente = isset($_POST['IdDocente']) ? $_POST['IdDocente'] : null;

                    if(ValidarExisteGrupoLogica($GrupoDigitado)){

                        $IdGrupo = ObtenerIdGrupo($GrupoDigitado);
                        $CantidadAsignacion = CantidadDeAsignacionesPorGrupoLogica($GrupoDigitado);

                        echo "<h2>Datos Encuesta<br/></h2>";
                        echo "Grupo: ".$IdGrupo."<br/>";

                        if($respuesta != null){
                            GuardarEncuestaLogica($GrupoDigitado,$IdCompetencia,$IdDocente,$Respuesta);
                        }

                        $Asignacion = ObtenerDatosAsignacionPorGrupo($GrupoDigitado,$IteracionCompetencia);

                        $IdCompetencia = $Asignacion['Id_Competencia'];
                        $IdDocente = $Asignacion['Id_Docente'];

                        if($IdCompetencia == ""){
                            echo "Termino la Encuesta";
            ?>
                            <form  action="..\..\index.php" method="POST">
                                <input type="submit" name="Volver" value="Nueva Encuesta">    
                            </form>
                <?php   
                            die;    
                        }else{
                            $NombreCompetencia = ObtenerCompetenciaPorId($IdCompetencia);
                            $NombreDocente = ObtenerDocentePorId($IdDocente);
                            echo "Competencia: ".$NombreCompetencia."<br/>";
                            echo "Docente: ".$NombreDocente."<br/>";
                            $TraerPreguntas = RetornaPreguntas();
                        }
                ?>
            <?php
                    
                    }else{
                        echo "<script>alert('No Existe Grupo, Verifique..!');
                        </script>";
                    }
            ?>

            <form action="GrupoControl.php" method="POST">
                <?php                    
                        MostrarPreguntas($TraerPreguntas);                        
                ?>
                <input name="Grupo" type="hidden" value="<?php echo $GrupoDigitado ?>">
                <input name="IdCompetencia" type="hidden" value="<?php echo $IdCompetencia ?>">
                <input name="IdDocente" type="hidden" value="<?php echo $IdDocente ?>">
                <input name="IteracionesCompetencia" type="hidden" value=<?php echo (++$IteracionCompetencia) ?>>
                <input name="Enviar" type="submit" value="Enviar Encuesta">
            </form>
    </body>
</html>