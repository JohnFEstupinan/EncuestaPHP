<?php
    include_once('C:\xampp\htdocs\ProyectoAmbientesWeb\php\Datos\Grupo.php');

    function ValidarExisteGrupoLogica($GrupoDigitado){
        return ValidarExisteGrupo($GrupoDigitado);
    }

    function CantidadDeAsignacionesPorGrupoLogica($GrupoDigitado){
        while ($Cantidad = @mysqli_fetch_array(CantidadDeAsignacionesPorGrupo($GrupoDigitado),MYSQLI_ASSOC)){
            return $Cantidad['COUNT(Id_Competencia)'];
        }
    }
?>