<?php
// Archivo de conexión a la base de datos
require_once 'mostrar.php';

// Función para limpiar y validar los datos de entrada
function limpiarDato($dato) {
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

// Obtener el parámetro de consulta
$consulta = isset($_GET['consulta']) ? limpiarDato($_GET['consulta']) : '';

// Consulta a la base de datos utilizando una sentencia preparada
if (!empty($consulta)) {
    $sql = "SELECT * FROM registros WHERE nombre LIKE ?";
    $stmt = $conn->prepare($sql);
    $param = "%" . $consulta . "%";
    $stmt->bind_param("s", $param);
    $stmt->execute();
    $result = $stmt->get_result();
} else {
    // Consulta sin parámetros
    $sql = "SELECT * FROM registros";
    $result = $conn->query($sql);
}

// Mostrar los registros en una tabla HTML
?>

<!DOCTYPE html>
<html>
<head>
    <title>Consulta de Registros</title>
</head>
<body>
    <h1>Consulta de Registros</h1>

    <form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label for="consulta">Buscar:</label>
        <input type="text" name="consulta" id="consulta" value="<?php echo $consulta; ?>">
        <input type="submit" value="Buscar">
    </form>

    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Email</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['email']; ?></td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>

<?php
// Cerrar la conexión a la base de datos
$conn->close();
?>
