<?php

    if (isset($_POST['RealizarEncuesta']))
    {
        header('location: ..\Presentacion\FrmRealizarEncuesta.php');
    }
    if (isset($_POST['ConsultarReporte']))
    { 
        header('location: ..\Presentacion\FrmConsultarReporte.php');
    }
    if(isset($_POST['ConsultarGrafica'])){
        header('location: ..\Presentacion\FrmConsultarGrafica.php');
    }
?>