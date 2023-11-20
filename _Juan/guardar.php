<?php
header('Content-Type: application/json; charset=utf-8');
header('Cache-Control: no-store, no-cache, must-revalidate, max-age=0');
header('X-Content-Type-Options: nosniff');
header('Server: pillan.inf.uct.cl');

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
            $rut1 = $row['rut'];
            $diasAsistidos = intval($row['dias_asistidos']) + 1;

            $updateQuery = "UPDATE TI_asistencias SET dias_asistidos = '$diasAsistidos' WHERE id = '$id'";

            if ($mysqli->query($updateQuery) === TRUE) {
                echo json_encode(['message' => "El rut $rut1 ha iniciado un nuevo dia de trabajo"]);
            } else {
                echo json_encode(['error' => 'Error al actualizar dias asistidos']);
            }
        } else {

            $confirmaQuery = "SELECT rut FROM TI_trabajador WHERE codigobarra = '$codigoBarras'";

            $result = $mysqli->query($confirmaQuery);

            if ($result && $result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $rut = $row['rut'];

                $insertQuery = "INSERT INTO TI_asistencias (rut, Fecha, codigo_barra, dias_asistidos) VALUES ('$rut', NOW(), '$codigoBarras', '1')";

                if ($mysqli->query($insertQuery) === TRUE) {
                    echo json_encode(['message' => "El rut $rut ha iniciado su primer día de trabajo"]);
                } else {
                    echo json_encode(['error' => 'Error al completar la peticion']);
                }
            } else {
                echo json_encode(['error' => 'No existe el trabajador en la base de datos']);
            }

        }

        $mysqli->close();
    } else {
        echo json_encode(['error' => 'No se proporciono un codigo de barras valido']);
    }
} else {
    echo json_encode(['error' => 'Metodo no permitido']);
}
?>
