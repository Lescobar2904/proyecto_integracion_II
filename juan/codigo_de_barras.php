<?php

$db = mysqli_connect('localhost', 'root','','escaner');

if (isset($_POST['escaner'])) {
    $Datetime = date("d-m-y  H:i:s");

    $barra = $_POST['escaner'];
    $barra = mysqli_real_escape_string($db, $barra);


    $consulta ="SELECT * FROM escaner WHERE codigo_barra = '$barra'";
    $consulta2 = mysqli_query($db, $consulta);
    $cuenta = mysqli_num_rows($consulta2);

    if ($cuenta > 0) {
        $error = "Data Dublicated";
    }else{
        $consulta_1 = "INSERT INTO item (codigo_barra, fecha) VALUES ('$barra', '$Datetime')";
        $consulta_exe = mysqli_query($db,$consulta_1);

    if(!$consulta_exe) {
        die(mysqli_error($db));
        }
    }
}

?>