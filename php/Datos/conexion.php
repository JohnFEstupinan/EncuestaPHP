<?php
        /*
            Es el archivo que contien la configuracion de la Conexion
        */
        include ('config.php');
        /*
        Variable $Servidor -> Contiene el servidor alojando la Base de Datos
        Variable $Usuario -> Contiene el usuario de la Base de Datos
        Variable $Contrasena -> Contiene la contraseña de la Base de Datos
        Variable $BaseDeDatos -> Contiene el nombre  de la Base de Datos
        Funcion ConectarABD -> Funcion que realiza la conexion a la BD
        */
        function ConectarABD(){
                $Servidor = Servidor;
                $Usuario = Usuario;
                $Contrasena = Contrasena;
                $BaseDeDatos= BaseDeDatos;

                $CadenaDeConexion = @mysqli_connect($Servidor,$Usuario,$Contrasena)
                or die ("Error al conectar con la base de datos".@mysqli_error($CadenaDeConexion));

                @mysqli_select_db($CadenaDeConexion,$BaseDeDatos) 
                or die ("Error al seleccionar la Base de Datos: ".@mysqli_error($CadenaDeConexion));

                return $CadenaDeConexion;         
        }
            
    @mysqli_close($CadenaDeConexion);
?>