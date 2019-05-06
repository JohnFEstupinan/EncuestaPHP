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
                include_once('C:\xampp\htdocs\ProyectoAmbientesWeb\php\Presentacion\FrmPreguntas.php');
            ?>

            <?php
                    $GrupoDigitado = $_POST['Grupo'];
                    $respuesta = isset($_POST['respuesta']) ? $_POST['respuesta'] : null;
                    
                    $ArrayDatosAsignacion = ObtenerDatosAsignacionPorGrupo($GrupoDigitado);    
                    $CantidadIteracionEncuestas = ObtenerCantidadAsignacionPorGrupo($GrupoDigitado);
                    $IdGrupo = ObtenerIdGrupo($GrupoDigitado);

                    $IdCompetencia ="";

                    if($CantidadIteracionEncuestas > 0){
                        echo "<h2>Datos Encuesta<br/></h2>";
                        echo "Grupo: ".$IdGrupo."<br/>";

                    if($respuesta != null){
                        echo "Hola";
                        //guardar_encuesta();
                    }

                    $Asignacion = ObtenerDatosAsignacionPorGrupo($GrupoDigitado);

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
                <input name="IteracionesCompetencia" type="text" value="<?php echo $GrupoDigitado ?>">
                <input name="Enviar" type="submit" value="Enviar Encuesta">
                <?php
                    }
                ?>

            </form>
    </body>
</html>