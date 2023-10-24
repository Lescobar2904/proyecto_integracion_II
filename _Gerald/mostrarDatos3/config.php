<?php

$conn = new mysqli("192.168.4.20", "lescobar", "21694313", "A2023_lescobar");

if ($conn->connect_error) {
    die('Error de conexion ' . $conn->connect_error);
}