<?php

    $server = "localhost";
    $username = "root";
    $password = "1234";
    $database = "sysweb";
    
    
        $mysqli = new mysqli($server, $username, $password, $database);

        // Manejar errores de conexión
        if ($mysqli->connect_error) {
            die("Error de conexión: " . $mysqli->connect_error);
        }else {
            //echo "Conexión exitosa a la base de datos.";
        }

       
    


