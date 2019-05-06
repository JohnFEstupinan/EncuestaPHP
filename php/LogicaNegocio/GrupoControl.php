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
        $IdCompetencia = "";
        $IdDocente = "";
    
        
        $ArrayDatosAsignacion = ObtenerDatosAsignacionPorGrupo($GrupoDigitado);    
        $CantidadIteracionEncuestas = ObtenerCantidadAsignacionPorGrupo($GrupoDigitado);
        $IdGrupo = ObtenerIdGrupo($GrupoDigitado);

        if($CantidadIteracionEncuestas > 0){

         /* if($respuesta != null){
              guardar_encuesta();
          }*/

          $Asignacion = ObtenerDatosAsignacionPorGrupo($GrupoDigitado);

          $IdCompetencia = $Asignacion['Id_Competencia'];
          $IdDocente = $Asignacion['Id_Docente'];

          $NombreCompetencia = ObtenerCompetenciaPorId($IdCompetencia);
          $NombreDocente = ObtenerDocentePorId($IdDocente);

 ?>
        <table border = "1" class="Datos_Grupo">
          <thead>
              <tr>
                  <td colspan="2">Datos Grupo</td>
              <tr>
          </thead>
      
            <tbody>
         
                <tr>
                    <td> Grupo: </td>
                     <td> <?php echo $IdGrupo?></td>
                </tr>
                 <tr>
                    <td> Competencia: </td>
                    <td> <?php echo $NombreCompetencia?></td>
                </tr>
                <tr>
                        <td> Docente: </td>
                        <td> <?php echo $NombreDocente?></td>
                </tr>                
            </tbody>
            
        </table>

<?php
        echo FormularioPreguntas();
        }else{
            echo "Revise Grupo";
         /*   echo "
            <script>
                alert('Grupo Digitado No Existe, Revise');            
            </script>
            ";*/
          // header('location: ..\..\index.php');
        }
       
?>