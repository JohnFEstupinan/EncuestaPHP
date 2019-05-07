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
                    $IteracionCompetencia = isset($_POST['IteracionesCompetencia']) ? $_POST['IteracionesCompetencia'] : null;
                    $IdCompetencia = isset($_POST['IdCompetencia']) ? $_POST['IdCompetencia'] : null;
                    $IdDocente = isset($_POST['IdDocente']) ? $_POST['IdDocente'] : null;

                    $ArrayDatosAsignacion = ObtenerDatosAsignacionPorGrupo($GrupoDigitado,$IteracionCompetencia);    
                    $ValidarExisteGrupo = ValidarExisteGrupoLogica($GrupoDigitado);

                    if($ValidarExisteGrupo){

                        $IdGrupo = ObtenerIdGrupo($GrupoDigitado);
                        $CantidadAsignacion = CantidadDeAsignacionesPorGrupoLogica($GrupoDigitado);

                        echo "<h2>Datos Encuesta<br/></h2>";
                        echo "Grupo: ".$IdGrupo."<br/>";

                        if($respuesta != null){
                            GuardarEncuestaLogica($GrupoDigitado,$IdCompetencia,$IdDocente);
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
                    // header('location: ..\..\index.php');
                    
                    }
                
            ?>

            <form action="GrupoControl.php" method="POST">
                <?php
                    if($IdCompetencia != ""){
                        MostrarPreguntas($TraerPreguntas);
                        
                ?>
                
                <input name="Grupo" type="text" value="<?php echo $GrupoDigitado ?>">
                <input name="IdCompetencia" type="text" value="<?php echo $IdCompetencia ?>">
                <input name="IdDocente" type="text" value="<?php echo $IdDocente ?>">
                <input name="IteracionesCompetencia" type="text" value=<?php echo (++$IteracionCompetencia) ?>>
                <input name="Enviar" type="submit" value="Enviar Encuesta">
                <?php
                    }
                ?>
            </form>
    </body>
</html>