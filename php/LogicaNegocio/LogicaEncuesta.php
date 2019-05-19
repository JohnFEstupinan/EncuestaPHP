<?php
    include_once('C:\xampp\htdocs\ProyectoAmbientesWeb\php\Datos\Encuesta.php');
    function  GuardarEncuestaLogica($GrupoDigitado,$IdCompetencia,$IdDocente,$Respuesta){
       GuardarEncuesta($GrupoDigitado,$IdCompetencia,$IdDocente,$Respuesta);
       echo "Guardo encuentas";
    }
    
?>