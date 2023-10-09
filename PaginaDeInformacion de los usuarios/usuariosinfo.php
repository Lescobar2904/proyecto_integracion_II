<?php 
   

        $conexion = new mysqli("mysql:host=localhost;port=3306;dbname=usuariosinfo","root","21198394-9")
        
        if (!$conexion) {
            die("La conexión a la base de datos falló: " . mysqli_connect_error());
        }
        
        // Consulta SQL
        $sql = "SELECT * FROM tu_tabla";
        $resultado = mysqli_query($conexion, $sql);
        
        // Cierra la conexión
        mysqli_close($conexion);
        ?>
         
        
        