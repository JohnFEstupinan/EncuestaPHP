<?php
    include_once('C:\xampp\htdocs\ProyectoAmbientesWeb\php\Datos\Preguntas.php');

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
                            if($row['Tipo_Pregunta'] == 1){
                ?>  
                <tr>
                                <td class="TipoDeDatoP"> <?php echo $row['Id_Preguntas'] ?></td>
                                <td class="TipoDeDato"> <?php echo $row['Pregunta'] ?></td>
                                <td>
                                    <select name="Respuesta[<?php $row['Id_Preguntas']?>]" class="ComboValoracion">                       
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
                    <td class="TipoDeDatoP"> <?php echo $row['Id_Preguntas'] ?></td>
                    <td colspan="2" class="TipoDeDatoOB"> <?php echo $row['Pregunta'] ?></td>                                    
                </tr>

                <tr>
                    <td colspan="3">
                        <textarea class="TextAreaOB" rows="10" cols="50" placeholder="OBSERVACIONES" name="Respuesta[<?php $row['Id_Preguntas']?>]"></textarea>
                    </td>
                </tr>
                    <?php   }                               
                        }
                    ?>
            </tbody>
        </table>
                    
<?php
        }
 ?>