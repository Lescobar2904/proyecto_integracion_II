<?php

$conn = new mysqli("db.inf.uct.cl", "lescobar", "21694313", "A2023_lescobar");

if ($conn->connect_error) {
    die('Error de conexion ' . $conn->connect_error);
}