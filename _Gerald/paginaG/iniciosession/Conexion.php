<?php

    $host = "localhost";
    $User = "root";
    $pass = "";

    $db = "registrarse";

    $conexion = mysqli_connect($host, $User , $pass, $db);

    if (!$con) {
     echo "Conexion fallida";
    }