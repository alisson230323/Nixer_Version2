<?php
// Obtener ID del registro a eliminar
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

// Eliminar el registro de la base de datos
$sql = "DELETE FROM peliculas_series WHERE id='$id'";

if ($conn->query($sql) === true) {
    $mensaje = "Se elimino el registro correctamente." ;
} else {
    $mensaje = "Error al eliminar el registro. " . $conn->error;
}
header("Location: contadmin.php?mensaje=" . urlencode($mensaje));
exit();

$conn->close();
?>
