<!DOCTYPE html>
<html>

<?php
    include('php\Controlador\GrupoControl.php');
    $InstanciaControlGrupo = new GrupoControl;
    $MetodoValidarGrupo = $InstanciaControlGrupo -> ValidarExisteGrupo();
?>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=devic-widt,initial-sacle=1.0">
        <link rel="stylesheet" href="css/estilosIndex.css" type="text/css" />
        <title>Encuesta</title>
    </head>

    <body>
        <div class="ContenedorTitulo">
            <p class="TituloEncuesta">Encuesta</p>
        </div>

        <div class="ContenedorFormulario">
            <div class="EncabezadoFormulario">
                <h2>Digite el grupo al que pertenece</h2>
            </div> 

            <form method="POST" class="FormularioGrupo" action="<?php echo $MetodoValidarGrupo;?>" id="FormularioGrupo">
                <input class="txtGrupo" id="txtGrupo" name="Grupo" type="text" required>
                
                <div class="ContenedorBoton">
                     <input class="btnEnviar" type="submit" name="Ingresar"  value="Ingresar">
                </div>

            </form>
        </div>    
    </body>
</html>