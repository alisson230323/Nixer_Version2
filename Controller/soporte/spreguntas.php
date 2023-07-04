<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador - Problemas reportados</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="supadmin.css">
</head>


<body style="padding: 0;
margin:0" >

<h1>Problemas reportados por los usuarios</h1>
    <header class="bar-lat">
        
        <img src="/img/logo 1.png" alt=""> 
        <nav>
     <a href="">  <i class='bx bx-line-chart bx-md' ></i><li >Analisis</li></a> 
      <a href=""> <i class='bx bx-category-alt bx-md' ></i><li >Categoria </li></a>
      <a href=""><i class='bx bx-slideshow bx-md'></i><li>Peliculas</li></a>
      <a href=""><i class='bx bxs-caret-right-circle bx-md'></i><li>Series</li></a>
      <a href=""><i class='bx bxs-user-account bx-md' style='color:#ffffff'></i><li>Usuarios</li></a>
      <a href=""> <i class='bx bx-calendar-week bx-rotate-90 bx-md' ></i><li >Reservas </li></a>
      <a href=""> <i class='bx bx-crown bx-md'></i><li >Planes</li></a>
      <a href=""><i class='bx bx-money-withdraw bx-md'></i><li>Pagos</li></a>
      <a href=""> <i class='bx bx-cog bx-md' ></i><li >Soporte</li></a>
      <a href=""> <i class='bx bx-user-circle bx-md' ></i><li >Perfil</li></a>
     
    </nav>
    </header>

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

    // Eliminar un registro
    if (isset($_GET['delete_id'])) {
        $id = $_GET['delete_id'];
        $sql = "DELETE FROM problemas WHERE id = $id";
        $resultado = $conn->query($sql);

        if ($resultado) {
            echo "<p>Registro eliminado exitosamente.</p>";
        } else {
            echo "<p>Error al eliminar el registro: " . $conn->error . "</p>";
        }
    }

    // Obtener los problemas reportados por los usuarios
    $sql = "SELECT id, email, description FROM problemas";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Mostrar los problemas en una tabla
        echo "<table>";
        echo "<tr><th>Email</th><th>Descripción</th><th>Acciones</th></tr>";
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['description'] . "</td>";
            echo "<td><button class='delete-btn' onclick='confirmDelete(" . $row['id'] . ")'>Eliminar</button></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>No se han reportado problemas.</p>";
    }

    $conn->close();
    ?>

    <script>
        function confirmDelete(id) {
            if (confirm("¿Estás seguro de que quieres eliminar este registro?")) {
                window.location.href = "admin.php?delete_id=" + id;
            }
        }
    </script>
</body>
</html>
