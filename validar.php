<?php
$clave=$_POST['Clave'];
$contraseña=$_POST['Contraseña'];
session_start();

$_SESSION['clave']=$clave;

$conn=mysqli_connect("localhost", "root", "datos_empleados");
$consulta="SELECT * FROM login WHERE clave='$clave' and contraseña='$contraseña'";
$resultado=mysql_query($conn,$consulta);
$filas=mysqli_stmt_num_rows($resultado);

if($filas)
{
    header("home.php");
}

else
{
?>
<?php
include("inicio_S.html")
?>

<h2 class="bad"> ERROR DE AUTENTIFICACION</h2>

<?php
}

mysqli_free_result($resultado);
mysqli_close($conn);
?>