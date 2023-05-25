<?php

$conexion = mysqli_connect('localhost', 'root', '', 'proyecto') or die(mysql_error($mysqli));

insertar($conexion);

function insertar($conexion){

    $Doc = $_POST['Doc'];
    $PrimerN = $_POST['PrimerN'];
    $SegundoN = $_POST['SegundoN'];
    $PrimerA = $_POST['PrimerA'];
    $SegundoA= $_POST['SegundoA'];
    $Programa = $_POST['Programa'];
    $Correo = $_POST['Correo'];
    $Fecha = $_POST['Fecha'];
    $Celular = $_POST['Celular'];
    $Genero = $_POST['Genero'];
    $Contra = $_POST['Contra'];
    $Catego = $_POST['Catego'];

    $consulta = "INSERT INTO login (Documento,PrimerN,SegundoN,PrimerA,SegundoA,Programa,Correo,Fecha,Celular,Genero,Contra,Categoria)
     VALUES ('$Doc', '$PrimerN','$SegundoN','$PrimerA','$SegundoA','$Programa','$Correo','$Fecha','$Celular','$Genero',
     '$Contra','$Catego')";

    mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
    $filas = mysqli_affected_rows($conexion);

if ($filas > 0) {
    mysqli_close($conexion);
    header("location:index.html");
    echo "<h2 class='bien'>Datos guardados correctamente</h2>";

} else {
    mysqli_close($conexion);
    include("crear.html");
    echo "<h2 class='mal'>Contraseña incorrecta</h2>";
}
}


?>

