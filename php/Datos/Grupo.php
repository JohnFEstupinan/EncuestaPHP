<?php
   include_once('conexion.php');

   function ObtenerGrupoPorNumGrupo($GrupoDigitado){
      
      $CadenaConexion = ConectarABD();

      $Consulta = "Select * From tbl_grupo Where $GrupoDigitado";

      $RespuestaConsulta = @mysqli_query($CadenaConexion,$Consulta) 
      or die ("Error al realizar la consulta: ".@mysqli_error($CadenaConexion));

      return $RespuestaConsulta;

   }

   function ObtenerIdGrupo($GrupoDigitado){
         $CadenaConexion = ConectarABD();

         $Consulta = "Select Id_Grupo From tbl_grupo where Num_Grupo = $GrupoDigitado";

         $ResultadoConsulta = mysqli_query($CadenaConexion, $Consulta);

         if($IdGrupo = @mysqli_fetch_array($ResultadoConsulta,MYSQLI_ASSOC)){
            return $IdGrupo['Id_Grupo'];
         }else{
            return $IdGrupo;
         }
   }
   
   @mysqli_close($CadenaConexion);
?>
