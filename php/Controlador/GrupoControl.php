<?php
    include('php/Modelo/Grupo.php');
   
    class GrupoControl{

        function ValidarExisteGrupo(){
            $InstanciaGrupo = new Grupo;
            $InstanciaGrupoControl = new GrupoControl;

            if(isset($_POST['Ingresar'])){
                $MetodoValidar = $InstanciaGrupo -> ValidarExisteGrupo($_POST['Grupo']);
                $InstanciaGrupoControl -> RedireccionarAEncuesta($MetodoValidar); 
                $InstanciaGrupoControl -> RetornarIdGrupo(); 
                echo $InstanciaGrupoControl;                         
            }          
        }

        function RedireccionarAEncuesta($ValorRpta){
         
            if ($ValorRpta == 1){
               
               header('location: php/Encuesta.php');
            }else{
               echo "<script>
                     alert('El grupo digitado, NO existe.!, Por Favor Verifique');
                     window.location= '../../index.php'
                     </script>";
            }
   
        }

        function RetornarIdGrupo(){
            $InstanciaGrupo = new Grupo;
            $Idgrupo = $InstanciaGrupo -> ObtenerGrupoPorId($_POST['Grupo']);

           
            return $Idgrupo;
        }
       
    }

   
     
?>