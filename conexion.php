<?php

$conexion = mysqli_connect('localhost', 'root', '', 'proyecto') or die(mysql_error($mysqli));

$correo = $_POST['Correo'];
$contra = $_POST['Contra'];
session_start();

$_SESSION['Correo'] = $correo;

$consulta = "SELECT * FROM login WHERE Correo = ? AND Contra = ?";
$statement = mysqli_prepare($conexion, $consulta);
mysqli_stmt_bind_param($statement, "ss", $correo, $contra);
mysqli_stmt_execute($statement);

$resultado = mysqli_stmt_get_result($statement);
$filas = mysqli_num_rows($resultado);

if ($filas) {
    header("location: Modificacion.html");
} else {
    include("index.html");
?>

<h2 class="mal">Contraseña incorrecta</h2>

<?php
}
mysqli_stmt_close($statement);
mysqli_close($conexion);
?>
