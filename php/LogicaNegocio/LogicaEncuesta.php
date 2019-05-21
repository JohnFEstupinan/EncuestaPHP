<?php
    include_once('C:\xampp\htdocs\ProyectoAmbientesWeb\php\Datos\Encuesta.php');

    function  GuardarEncuestaLogica($GrupoDigitado,$IdCompetencia,$IdDocente,$Respuesta){
      return  GuardarEncuesta($GrupoDigitado,$IdCompetencia,$IdDocente,$Respuesta);  
    }

    function ConsultarObservacionesDocenteLogica($Id_Docente){
        return ConsultarObservacionesDocente($Id_Docente);
    }

    function PromedioPorGrupoLogica ($Id_Docente){
      return PromedioPorGrupo($Id_Docente);
    }

    function PromedioGeneralDocenteLogica($Id_Docente){
      return PromedioGeneralDocente($Id_Docente);
    }

    function ValidarSiExisteEncuestaLogica($Id_Docente){
      return ValidarSiExisteEncuesta($Id_Docente);
    }
    
?>