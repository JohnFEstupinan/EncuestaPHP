<?php

   $GrupoDigitado = $_POST["Grupo"];
   echo "Ingreso a validar grupo ".$GrupoDigitado;
   $Consulta = "";

   if(isset($GrupoDigitado)){
      echo "Entro al if";    
   }else{
      echo "Entro al else";
      header('location: ../index.php');

   }
?>


