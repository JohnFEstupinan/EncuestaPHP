<?php
class Conexion{
    /*
    Clase Conexion
    Variable $Server -> Contiene el servidor alojando la Base de Datos
    Variable $User -> Contiene el usuario de la Base de Datos
    Variable $Pass -> Contiene la contraseña de la Base de Datos
    Variable $BaseDeDatos -> Contiene el nombre  de la Base de Datos
    Funcion ConectarABD -> Funcion que realiza la conexion a la BD
    */
    function ConectarABD()
        {
            $Server = "localhost";
            $User = "root";
            $Pass = "";
            $BaseDeDatos="bdencuesta";

            $CadenaDeConexion = mysqli_connect($Server,$User,$Pass,$BaseDeDatos) or die
            ("Error al conectar con la base de datos".mysqli_error($CadenaDeConexion));

            return $CadenaDeConexion;
            
           mysqli_close($CadenaDeConexion);
        }
    }
?>