<?php
   include ('conexion.php');
      
      function ValidarExisteGrupo(){
         $Con = new Conexion;
         $CadenaConexion = $Con->ConectarABD();
         
         $GrupoDigitado = $_POST["Grupo"];

         $Consulta = "Select * From tbl_grupo where Num_Grupo = $GrupoDigitado";

         if(isset($GrupoDigitado)){

            $ResultadoConsulta = mysqli_query($CadenaConexion,$Consulta);
            if($fila = mysqli_num_rows($ResultadoConsulta) == 1){
               return $fila;
            }else{
               return 0;
            }
            
         }else{
            header('location: ../index.php');
         }
   }
   echo "Retorna: ".ValidarExisteGrupo();
?>


