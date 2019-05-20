<?php
    include_once('conexion.php');
    
        function ListarPreguntas(){
    
            $CadenaConexion = ConectarABD();
      
            $Consulta = "Select Id_Preguntas, Pregunta, Tipo_Pregunta from tbl_preguntas";
       
            $ResultadoConsulta = @mysqli_query($CadenaConexion,$Consulta)
            or die ("Error en la consulta, verifique: ".@mysqli_error($CadenaConexion));
      
            return $ResultadoConsulta;
        }
        
    @mysqli_close($CadenaConexion);
?>