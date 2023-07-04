<?php

/*
// Obtener datos del formulario
$titulo = $_POST['titulo'];
$genero = $_POST['genero'];
$anio = $_POST['anio'];
$sinopsis = $_POST['sinopsis'];
$duracion = $_POST['duracion'];

// Obtener información del archivo de imagen
$imagenNombre = $_FILES['imagen']['name'];
$imagenTipo = $_FILES['imagen']['type'];
$imagenTamano = $_FILES['imagen']['size'];
$imagenTmp = $_FILES['imagen']['tmp_name'];

// Verificar que se haya seleccionado un archivo de imagen
if (!empty($imagenNombre)) {
    // Directorio de destino para guardar la imagen
    $directorioDestino = "C:/xampp/htdocs/NIXER/imagenes/";

    // Generar un nombre único para la imagen
    $imagenNombreUnico = uniqid() . "_" . $imagenNombre;

    // Ruta completa del archivo de imagen en el directorio de destino
    $rutaImagen = $directorioDestino . $imagenNombreUnico;

    // Mover el archivo de imagen al directorio de destino
    if (move_uploaded_file($imagenTmp, $rutaImagen)) {
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "contad";

        $conn = new mysqli($servername, $username, $password, $dbname);

        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Insertar los datos en la base de datos
        $sql = "INSERT INTO peliculas_series (titulo, genero, anio, sinopsis, duracion, imagen) VALUES ('$titulo', '$genero', '$anio', '$sinopsis', '$duracion', '$rutaImagen')";

        if ($conn->query($sql) === true) {
            echo "Película o serie agregada correctamente.";
        } else {
            echo "Error al agregar película o serie: " . $conn->error;
        }

        $conn->close();
    } else {
        echo "Error al subir la imagen.";
    }
} else {
    echo "Debes seleccionar una imagen.";
}*/

// Obtener datos del formulario
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

// Insertar los datos en la base de datos
$sql = "INSERT INTO peliculas_series (titulo, genero, anio, sinopsis, duracion, imagen) VALUES ('$titulo', '$genero', '$anio', '$sinopsis', '$duracion', '$imagen')";

if ($conn->query($sql) === true) {
    $mensaje = "Película o serie agregada correctamente." ;
} else {
    $mensaje = "Error al agregar película o serie: " . $conn->error;
}
header("Location: contadmin.php?mensaje=" . urlencode($mensaje));
exit();

$conn->close();

?>
