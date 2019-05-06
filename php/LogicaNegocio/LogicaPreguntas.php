<?php
    include_once('C:\xampp\htdocs\ProyectoAmbientesWeb\php\Datos\Preguntas.php');

    function RetornaPreguntas(){
        
        $RetornaResultadosPreguntas = ListarPreguntas();

        return $RetornaResultadosPreguntas;
    }
?>