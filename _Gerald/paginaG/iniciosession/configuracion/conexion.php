<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "registrarse";

    $conexion = new mysqli($host, $user, $pass, $db);

    if (!$conexion) {
        echo "Conexion fallida";
    }
?>

