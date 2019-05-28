<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=devic-widt,initial-sacle=1.0">
        <link rel="stylesheet" href="../../css/estilosIndex.css" type="text/css" />
        <link rel="icon" type="image/png" href="IconImages\IconoEncuesta.png" />
        <title>Encuesta</title>
    </head>
    <body>
        <div class="ContenedorFormulario">
            <div class="ContenedorTitulo">
                <p class="TituloEncuesta">Realizar Encuesta</p>
            </div>
            <div class="EncabezadoFormulario">
                <h2>Digite el grupo al que pertenece</h2>
            </div> 

            <form method="POST" class="FormularioGrupo" action="..\LogicaNegocio\GrupoControl.php" id="FormularioGrupo">
                <input class="txtGrupo" id="txtGrupo" name="Grupo" type="text" required pattern="[0-9]{1,99}" title="NO ingrese letras o cualquier caracter especial.¡SOLO NÚMEROS!">
                
                <div class="ContenedorBoton">
                     <input class="btnEnviar" type="submit" name="Ingresar"  value="Ingresar">
                </div>

            </form>
        </div>   
    </body>
</html>