<?php
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);

    if (isset($input['codigoBarras'])) {
        $codigoBarras = $input['codigoBarras'];

        $mysqli = new mysqli('db.inf.uct.cl', 'lescobar', '21694313', 'A2023_lescobar');

        if ($mysqli->connect_error) {
            echo json_encode(['error' => 'Error al conectar a la base de datos']);
            exit();
        }

        $codigoBarras = $mysqli->real_escape_string($codigoBarras);

        $query = "SELECT * FROM TI_asistencias WHERE codigo_barra = '$codigoBarras'";
        $result = $mysqli->query($query);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $id = $row['id'];
            $diasAsistidos = $row['dias_asistidos'] + 1;

            $updateQuery = "UPDATE TI_asistencias SET dias_asistidos = $diasAsistidos WHERE id = $id";

            if ($mysqli->query($updateQuery) === TRUE) {
                echo json_encode(['message' => 'Días asistidos actualizados']);
            } else {
                echo json_encode(['error' => 'Error al actualizar días asistidos']);
            }
        } else {
            $insertQuery = "INSERT INTO TI_asistencias (rut, Fecha, codigo_barra, dias_asistidos) VALUES (123456, NOW(), '$codigoBarras', 1)";

            if ($mysqli->query($insertQuery) === TRUE) {
                echo json_encode(['message' => 'Código de barras guardado con éxito']);
            } else {
                echo json_encode(['error' => 'Error al guardar el código de barras']);
            }
        }

        $mysqli->close();
    } else {
        echo json_encode(['error' => 'No se proporcionó un código de barras válido']);
    }
} else {
    echo json_encode(['error' => 'Método no permitido']);
}
?>




