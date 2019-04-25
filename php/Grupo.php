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

   function RedireccionarAEncuesta(){
      if (ValidarExisteGrupo() == 1){
         header('location: Encuesta.php');
      }else{
         echo "<script>
                alert('El grupo digitado, NO existe.!, Por Favor Verifique');
                window.location= '../index.php'
               </script>";
         //echo "<script>alert('Usuario insertado exitosamente');</script>";
         //header('location: ../index.php');
      }

   }
   
   echo "Retorna: ".RedireccionarAEncuesta()();
?>


