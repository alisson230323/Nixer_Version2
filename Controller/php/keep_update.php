<?php
// Obtener datos del formulario
$id = $_POST['id'];
$titulo = $_POST['titulo'];
$genero = $_POST['genero'];
$anio = $_POST['anio'];
$sinopsis = $_POST['sinopsis'];
$duracion = $_POST['duracion'];
$imagen = $_POST['imagen'];

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "contad";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Actualizar el registro en la base de datos
$sql = "UPDATE peliculas_series SET titulo='$titulo', genero='$genero', anio='$anio', sinopsis='$sinopsis', duracion='$duracion', imagen='$imagen' WHERE id='$id'";

if ($conn->query($sql) === true) {
    $mensaje = "Registro actualizado correctamente." ;
} else {
    $mensaje = "Error al actualizar el registro" . $conn->error;
}
header("Location: contadmin.php?mensaje=" . urlencode($mensaje));
exit();

$conn->close();
?>