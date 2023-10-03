<?php
//Este programa PHP debe guardarse con el nombre:  acualizaPobla.php

//Me conecto al motor de BD que corre en localhost, con el usuario root (sin password), y selecciono la BD del proyecto
 $bd = mysqli_connect("localhost","root", "","base de datos");

 $nom  = $_GET["nom"];
 $corr =  $_GET["Mail"];
 $num =  $_GET["Numero"];
 $opinion =  $_GET["text"];
 $consulta = "INSERT INTO opiniones(nombre,correo,numero telefono,opinion) VALUES(nom, Mail, numero, opinion);"
 $respuesta = mysqli_query($bd,$consulta);


//Muestro un mensaje si todo estuvo bien.


if($respuesta)
   echo "El nuevo vendedor fue creado correctamente <br>";
else
   echo "Ocurrió un error";

?>