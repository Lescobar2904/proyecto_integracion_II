<?php

//Me conecto al motor de BD
include("conex.inc");


 $rut  = $_POST["Rut"];
 $opinion =  $_POST["text"];
 $consulta = "INSERT INTO TI_consultas(rut, consulta) VALUES('$rut', '$opinion')";
 $respuesta = mysqli_query($db,$consulta);

//Muestro un mensaje si todo estuvo bien.

if($respuesta){
echo "listo";
}
else {
echo "fallo";
}
