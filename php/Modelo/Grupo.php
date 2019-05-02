<?php
   include('conexion.php');

   class Grupo {

      function ValidarExisteGrupo($GrupoDigitado){

         $CadenaConexion = ConectarABD();
         
         $Consulta = "Select * From tbl_grupo where Num_Grupo = $GrupoDigitado";

         if(isset($GrupoDigitado)){

            $ResultadoConsulta = mysqli_query($CadenaConexion,$Consulta);
            if($fila = mysqli_num_rows($ResultadoConsulta) == 1){
               return $fila;
            }else{
               return 0;
            }

         }else{
            echo "Nada en la caja de texto";
            header('location: ../index.php');
         }
      }

      function ObtenerGrupoPorId($NumGrupo){
    
         $CadenaConexion = ConectarABD();
   
         $Consulta = "Select Id_Grupo  from tbl_grupo  where Num_Grupo = $NumGrupo";
   
         $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
         or die ("Error en la consulta, verifique: ".@mysqli_error($CadenaConexion));
   
         return $ResultadoConsulta;
      }

      
   }
   
   @mysqli_close($CadenaConexion);
?>