<?php

$conn = new mysqli();

if ($conn->connect_error) {
    die('Error de conexion ' . $conn->connect_error);
}