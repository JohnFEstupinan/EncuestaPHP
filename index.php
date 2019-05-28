<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=devic-widt,initial-sacle=1.0">
        <link rel="stylesheet" href="css/estilosIndex.css" type="text/css" />
        <link rel="icon" type="image/png" href="IconImages\IconoEncuesta.png" />
        <title>Sistema de Encuestas</title>
    </head>
    <body>
        <div class="ContenedorFormulario">
            <div class="ContenedorTitulo">
                <p class="TituloEncuesta">¡..Bienvenido..!</p>
            </div>
            <div class="EncabezadoFormulario">
                <h2>Por favor seleccione, la operación a realizar</h2>
            </div> 

            <form method="POST" class="FormularioGrupo" action="php\LogicaNegocio\ControlOpcion.php" id="FormularioGrupo">
                <div class="ContenedorBoton">                    
                    <input class="btnEnviar" type="submit" name="RealizarEncuesta" value="Realizar Encuesta"> 
                    <input class="btnEnviar" type="submit" name="ConsultarReporte"  value="Consultar Encuesta - Para Docentes">
                    <input class="btnEnviar" type="submit" name="ConsultarGrafica"  value="Ver Gráfica de Resultados">
                </div>
            </form>
        </div>   
    </body>
</html>