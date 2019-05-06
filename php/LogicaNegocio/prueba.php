<?php
        include_once('C:\xampp\htdocs\ProyectoAmbientesWeb\php\Modelo\Grupo.php');
        include_once('FormularioPreguntas.php');

        $GrupoDigitado = $_POST['Grupo'];
        $ArrayDatosGrupo = ValidarExisteGrupo($GrupoDigitado);
       

       if($ArrayDatosGrupo != null){ ?>
          
<table border = "1" class="Datos_Grupo">
    <thead>
        <tr>
            <td colspan="2">Datos Grupo</td>
        <tr>
    </thead>

    <tbody>
   
                        <tr>
                            <td> Grupo: </td>
                            <td> <?php echo $row['Id_Grupo'] ?></td>
                        </tr>
                                                    
    
                    
    </tbody>
</table>
<?php
FormularioPreguntas();
?>
   
<?php
       }else{
           echo "<script>
                alert('Error, No se encotraron coincidencias en la busqueda, verifique su grupo');
                </script>
           ";
           header('location: C:\xampp\htdocs\ProyectoAmbientesWeb\index.php');
       }

?>
       
       while ($fila = @mysqli_fetch_array($ArrayDatosAsignacion,MYSQLI_ASSOC)){
                $IdCompetencia = $fila['Id_Competencia'];
                $IdDocente = $fila['Id_Docente'];

                $ArrayDatosDocente =  ObtenerDocentePorId($IdDocente);
                $ArrayDatosCompetencia =  ObtenerCompetenciaPorId($IdCompetencia);

               while ($fila = @mysqli_fetch_array($ArrayDatosDocente,MYSQLI_ASSOC)){
                echo "Datos".$fila['Id_Docente']." ".$fila['NomApell_Docente'];
                
               }
          
               while ($fila = @mysqli_fetch_array($ArrayDatosCompetencia,MYSQLI_ASSOC)){
                echo "Datos".$fila['Id_Competencia']." ".$fila['Nom_Competencia'];
                
                }
                die;
            }
