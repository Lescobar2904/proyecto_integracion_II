<?php

//Me conecto al motor de BD que corre en localhost, con el usuario root (sin password), y selecciono la BD del proyecto
$bd = mysqli_connect("localhost","root", "","iniciosesion");

$respuesta = mysqli_query($bd, "CALL mostrar_todo");
while ($fila=mysqli_fetch_object($respuesta)){
    echo"$fila->id $fila->nombre $fila->apellido $fila->contraseña <br>";
}
  
?>