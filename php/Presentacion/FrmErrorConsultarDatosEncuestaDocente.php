<!DOCTYPE html>
<html>
    <head>
        <title>
            Sistema de Encuestas
        </title>
        <link rel="stylesheet" href="../../css/estilosVolverAEncuesta.css" type="text/css" />
        <link rel="icon" type="image/png" href="..\..\IconImages\IconoEncuesta.png" />
    </head>

    <body>
        <div class="ContenedorFormulario">
            <div class="EncabezadoFormularioE">
                <img src="..\..\IconImages\IconoError.png" />
                    <h2>¡No Hay Encuestas Para Este Docente!</h2>
                    <h2>¡Por Favor, Verifiqué!</h2>
            </div> 
            <form method="POST" class="FormularioVolver" action="..\..\index.php" id="FormularioGrupo">
                <div class="ContenedorBoton">
                    <input class="btnVolverE" type="submit" name="Volver"  value="Volver">
                </div>
            </form>
        </div> 
    </body>
</html>