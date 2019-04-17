<?php
 //include ("conexion.php");
 class ListarPreguntas {

        function ListarPreguntasABD(){
            
            $Con = new Conexion;
            $CadenaDeConexion = $Con->ConectarABD();
            $Consulta = "select * from tbl_preguntas";
            $ResultadoConsulta = mysqli_query($CadenaDeConexion,$Consulta) 
            or die ("Error en el resultado de la consulta: ".mysqli_errno($CadenaDeConexion));

           /* if(mysqli_errorno($CadenaDeConexion)){
                echo "Error en la conexion de la BD";

            }else{*/
                while( $ValorObtenido = mysqli_fetch_array($ResultadoConsulta)){
                    echo  $ValorObtenido["Pregunta"];
                }

          //  }
         

                   
         

                }             
    } 
    
?>