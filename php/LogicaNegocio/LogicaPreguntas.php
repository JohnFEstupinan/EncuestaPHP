<?php
    include_once('..\Datos\Preguntas.php');

    function RetornaPreguntas(){
            return ListarPreguntas();
    }
?>  
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../css/estilosDatosPreguntas.css" type="text/css" />
        <title></title>
    </head>
</html>     

    <?php
        function MostrarPreguntas($ResultadoRetornarPreguntas){
    ?>
    
        <table class="DatosPreguntas">
            <thead>
                <tr>
                    <td colspan="3" class="TituloDatosPreguntas">Sección Preguntas</td>
                </tr>
                <tr>                                        
                    <td class="DatoP">Código</td>
                    <td class="DatoP">Pregunta</td>
                    <td class="DatoP">Valoración</td>
                <tr>
            </thead>
            
            <tbody>        
                <?php   foreach ($ResultadoRetornarPreguntas as $row) {
                    $IdPregunta = $row['Id_Preguntas'];
                   
                            if($row['Tipo_Pregunta'] == 1){
                ?>  
                <tr>
                    <td class="TipoDeDatoP"> <?php echo $IdPregunta; ?></td>
                    <td class="TipoDeDato"> <?php echo $row['Pregunta'];?></td>
                    <td>
                        <select name="Respuesta[<?php echo $IdPregunta;?>]" class="ComboValoracion">                       
                            <option value="1">Nunca</option>
                            <option value="2">Casi Nunca</option>
                            <option value="3">A Veces</option>
                            <option value="4">Casi Siempre</option>
                            <option value="5">Siempre</option>
                        </select>
                    </td>
                </tr>
                <?php       }else{ ?>
                <tr>
                    <td colspan="3">
                        <input type="text" class="TextAreaOB"  placeholder="OBSERVACIONES" name="Respuesta[<?php echo $IdPregunta; ?>]">
                    </td>
                </tr>
                <?php       }                               
                        }
                ?>
            </tbody>
        </table>
                    
<?php
        }
 ?>