<?php
// Conectar a la base de datos (ajusta los valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sub";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si la columna 'description' existe en la tabla 'problemas'
    $checkColumnQuery = "SHOW COLUMNS FROM problemas LIKE 'description'";
    $result = $conn->query($checkColumnQuery);

    if ($result->num_rows == 0) {
        // La columna 'description' no existe, agregarla a la tabla 'problemas'
        $alterTableQuery = "ALTER TABLE problemas ADD COLUMN description VARCHAR(255)";
        if ($conn->query($alterTableQuery) === TRUE) {
            echo "Se agregó la columna 'description' a la tabla 'problemas'.";
        } else {
            echo "Error al agregar la columna 'description': " . $conn->error;
        }
    } else {
        // Obtener los datos del formulario
        $email = $_POST['email'] ?? '';
        $description = $_POST['description'] ?? '';
        $fecha = date('Y-m-d H:i:s');

        // Insertar los datos en la base de datos
        $sql = "INSERT INTO problemas (email, description) VALUES ('$email', '$description')";

        if ($conn->query($sql) === TRUE) {
            echo "Problema registrado correctamente";
        } else {
            echo "Error al registrar el problema: " . $conn->error;
        }
    }
}

$conn->close();
?>


