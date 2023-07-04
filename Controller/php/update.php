<?php
// Obtener ID del registro a actualizar
$id = $_GET['id'];

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contad";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos actuales del registro
$sql = "SELECT * FROM peliculas_series WHERE id='$id'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

// Mostrar el formulario para actualizar el registro
echo "<h2>Actualizar Película o Serie</h2>";
echo "<form action='keep_update.php' method='POST'>";
echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
echo "<label for='titulo'>Título:</label>";
echo "<input type='text' id='titulo' name='titulo' value='" . $row['titulo'] . "' required><br>";
echo "<label for='genero'>Género:</label>";
echo "<input type='text' id='genero' name='genero' value='" . $row['genero'] . "' required><br>";
echo "<label for='anio'>Año:</label>";
echo "<input type='text' id='anio' name='anio' value='" . $row['anio'] . "' required><br>";
echo "<label for='sinopsis'>Sinopsis:</label>";
echo "<textarea id='sinopsis' name='sinopsis' required>" . $row['sinopsis'] . "</textarea><br>";
echo "<label for='duracion'>Duración (minutos):</label>";
echo "<input type='number' id='duracion' name='duracion' value='" . $row['duracion'] . "' required><br>";
echo "<label for='imagen'>URL de la imagen:</label>";
echo "<input type='text' id='imagen' name='imagen' value='" . $row['imagen'] . "' required><br>";
echo "<input type='submit' value='Guardar'>";
echo "</form>";

$conn->close();
?>
