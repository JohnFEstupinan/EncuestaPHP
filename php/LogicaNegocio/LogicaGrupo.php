<?php
    include_once('..\Datos\Grupo.php');

    function ValidarExisteGrupoLogica($GrupoDigitado){
        return ValidarExisteGrupo($GrupoDigitado);
    }

    function ObtenerIdGrupoLogica($GrupoDigitado){        
        return ObtenerIdGrupo($GrupoDigitado);
    }

    function MostrarDatosEncuesta($Grupo,$NombreCompetencia,$NombreDocente){
?>
<!DOCTYPE html>
<html>
        <head>
            <title></title>
            <link rel="stylesheet" href="../../css/estilosDatosEncuesta.css" type="text/css" />
        </head>
        <body>
            <table  class="DatosEncuesta">
                <thead>
                    <tr>
                        <td colspan="2" class="TituloDatosEncuesta">Datos Encuesta</td> 
                    </tr>
                </thead>
                                
                <tbody>
                    <tr>
                        <td class="Dato">Grupo:</td>
                        <td class="TipoDeDato"> <?php echo utf8_decode($Grupo) ?> </td>
                    </tr>
                    <tr>
                        <td class="Dato">Competencia:</td>
                        <td class="TipoDeDato"> <?php echo utf8_decode($NombreCompetencia) ?> </td>
                    </tr>
                    <tr>
                        <td class="Dato">Docente:</td>
                        <td class="TipoDeDato"> <?php echo utf8_decode($NombreDocente) ?> </td>
                    </tr>                
                </tbody>
            </table>
        </body>
</html> 
<?php
    }
?>