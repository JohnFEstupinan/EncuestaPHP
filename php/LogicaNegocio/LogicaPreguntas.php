<?php
    include_once('C:\xampp\htdocs\ProyectoAmbientesWeb\php\Modelo\Preguntas.php');

    function RetornaPreguntas(){
        
        $RetornaResultadosPreguntas = ListarPreguntas();

        return $RetornaResultadosPreguntas;
    }
?>