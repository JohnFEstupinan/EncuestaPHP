<?php
    include_once('C:\xampp\htdocs\ProyectoAmbientesWeb\php\Datos\Preguntas.php');

    function RetornaPreguntas(){
        
        $RetornaResultadosPreguntas = ListarPreguntas();

        return $RetornaResultadosPreguntas;
    }
?>   

    <?php
        function MostrarPreguntas($ResultadoRetornarPreguntas){
    ?>
        <table border = "1" class="Datos_Preguntas">
            <thead>
                <tr align="center">
                    <td colspan="3"> <h2>Seccion Preguntas</h2> </td>
                </tr>
                <tr align="center">                                        
                    <td>Codigo</td>
                    <td>Pregunta</td>
                    <td>Valoracion</td>
                <tr>
            </thead>
            
            <tbody>        
                <?php   while ($row = @mysqli_fetch_array($ResultadoRetornarPreguntas, MYSQLI_ASSOC)) {
                                    $TipoDePregunta = $row['Tipo_Pregunta'];

                                    if($TipoDePregunta == 1){
                ?>  

                <tr>
                    <td> <?php echo $row['Id_Preguntas'] ?></td>
                    <td> <?php echo $row['Pregunta'] ?></td>
                    <td>
                        <select>                       
                            <option value="1">Nunca</option>
                            <option value="2">Casi Nunca</option>
                            <option value="3">A Veces</option>
                            <option value="4">Casi Siempre</option>
                            <option value="5">Siempre</option>
                        </select>

                    </td>
                </tr>
                <?php   }else{ ?>

                <tr>
                    <td> <?php echo $row['Id_Preguntas'] ?></td>
                    <td colspan="2"> <?php echo $row['Pregunta'] ?></td>                                    
                </tr>

                <tr>
                    <td colspan="3">
                        <textarea name="comentarios" rows="10" cols="50" placeholder="OBSERVACIONES" ></textarea>
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