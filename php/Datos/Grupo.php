<?php
   include_once('conexion.php');

   function ObtenerGrupoPorNumGrupo($GrupoDigitado){
      
      $CadenaConexion = ConectarABD();

      $Consulta = "Select Id_Grupo From tbl_grupo Where $GrupoDigitado";

      $RespuestaConsulta = @mysqli_query($CadenaConexion,$Consulta) 
      or die ("Error al realizar la consulta: ".@mysqli_error($CadenaConexion));

      foreach(@mysqli_fetch_array($RespuestaConsulta,MYSQLI_ASSOC) as $Fila){
         return $Fila["Id_Grupo"];
      }      

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

   function ValidarExisteGrupo($GrupoDigitado){
        
      $CadenaConexion = ConectarABD();

      $Consulta = "Select * from tbl_grupo Where Num_Grupo = $GrupoDigitado";

      $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
      or die ("Error al realizar la consulta: ".@mysqli_error($CadenaConexion));

      if (@mysqli_num_rows($ResultadoConsulta) == 1 ){
         return true;
      }else{
         return false;
      }

   }
   
   @mysqli_close($CadenaConexion);
?>
