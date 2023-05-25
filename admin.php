<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="admin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@200&family=Work+Sans:ital,wght@1,100&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <style>
        table.dataTable thead {
            background-color:#4a63a3;
            color:aliceblue;
        }
    </style>
</head>
<body>       
    <div class="fondo"></div>
    <div class="container-fluid">
        <div class="login">
            <div class="textl">Admin panel</div>
            <div class="first">
                <form method="POST">
                    <div class="1">
                        <button type="submit" name="Todo"> Mostrar los registros de la tabla</button>
                    </div>
                    <div class="2">
                        <button type="submit" name="Ali"> Mostrar los registros de Ingeniería de Alimentos </button>
                    </div>
                    <div class="3">
                    <button type="submit" name="Amb"> Mostrar los registros de Ingeniería de Ambiental </button>
                     </div>
                    <div class="4">
                    <button type="submit" name="Sof"> Mostrar los registros de Ingeniería de Software </button>
                    </div>
                    <div class="5">
                    <button type="submit" name="Ele"> Mostrar los registros de Ingeniería de Eléctrica </button>
                    </div>
                    <div class="6">
                    <button type="submit" name="ADMS"> Mostrar los registros de Administración de la Seguridad y Salud en el Trabajo </button>
                    </div>
                    <div class="7"> 
                    <button type="submit" name="Est"> Mostrar los registros de estudiante</button>
                    </div>
                    <div class="8">
                    <button type="submit" name="Doc"> Mostrar los registros de docente</button>
                    </div>
                    <div class="9">
                    <button type="submit" name="Dir"> Mostrar los registros de director</button>
                    </div>
                    <div class="10">
                    <button type="submit" name="Adm"> Mostrar los registros de administrativo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-white">
        <div class="row">
            <div class="col">
                <table id="tabla_usuarios" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>Documento</th>
                            <th>Primer Nombre</th>
                            <th>Segundo Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Programa</th>
                            <th>Correo</th>
                            <th>Fecha</th>
                            <th>Celular</th>
                            <th>Genero</th>
                            <th>Contraseña</th>
                            <th>Categoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php


                        // Realiza la conexión a la base de datos
            $conexion = mysqli_connect('localhost', 'root', '', 'proyecto') or die(mysqli_error($conexion));

                        //Diferenciar de botones
                        if (isset($_POST['Todo'])) {
                            mostrar($conexion);
                        } elseif (isset($_POST['Ali'])) {
                            mostrarA($conexion);
                        }
                        if (isset($_POST['Amb'])) {
                            mostrarAm($conexion);
                        } elseif (isset($_POST['Sof'])) {
                            mostrarS($conexion);

                        }if (isset($_POST['Ele'])) {
                            mostrarE($conexion);
                        } elseif (isset($_POST['ADMS'])) {
                            mostrarADMS($conexion);

                        }if (isset($_POST['Est'])) {
                            mostrarEs($conexion);
                        } elseif (isset($_POST['Doc'])) {
                            mostrarDoc($conexion);

                        }if (isset($_POST['Dir'])) {
                            mostrarDir($conexion);
                        } elseif (isset($_POST['Adm'])) {
                            mostrarAdm($conexion);
                        }

                        //Función para mostrar todos los registros
                        function mostrar($conexion) {
                            $consulta = "SELECT * FROM login";
                            $resultado = mysqli_query($conexion, $consulta);

                            if ($resultado) {
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    echo "<tr>";
                                    echo "<td>".$fila['Documento']."</td>";
                                    echo "<td>".$fila['PrimerN']."</td>";
                                    echo "<td>".$fila['SegundoN']."</td>";
                                    echo "<td>".$fila['PrimerA']."</td>";
                                    echo "<td>".$fila['SegundoA']."</td>";
                                    echo "<td>".$fila['Programa']."</td>";
                                    echo "<td>".$fila['Correo']."</td>";
                                    echo "<td>".$fila['Fecha']."</td>";
                                    echo "<td>".$fila['Celular']."</td>";
                                    echo "<td>".$fila['Genero']."</td>";
                                    echo "<td>".$fila['Contra']."</td>";
                                    echo "<td>".$fila['Categoria']."</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Error en la consulta: " . mysqli_error($conexion);
                            }

                            mysqli_close($conexion);
                        }
                        // Función para mostrar los registros de alimentos
                        function mostrarA($conexion) {
                            $consulta = "SELECT * FROM login WHERE Programa = 'Ing de Alimentos'";
                            $resultado = mysqli_query($conexion, $consulta);

                            if ($resultado) {
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    echo "<tr>";
                                    echo "<td>".$fila['Documento']."</td>";
                                    echo "<td>".$fila['PrimerN']."</td>";
                                    echo "<td>".$fila['SegundoN']."</td>";
                                    echo "<td>".$fila['PrimerA']."</td>";
                                    echo "<td>".$fila['SegundoA']."</td>";
                                    echo "<td>".$fila['Programa']."</td>";
                                    echo "<td>".$fila['Correo']."</td>";
                                    echo "<td>".$fila['Fecha']."</td>";
                                    echo "<td>".$fila['Celular']."</td>";
                                    echo "<td>".$fila['Genero']."</td>";
                                    echo "<td>".$fila['Contra']."</td>";
                                    echo "<td>".$fila['Categoria']."</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Error en la consulta: " . mysqli_error($conexion);
                            }

                            mysqli_close($conexion);
                        }

                        // Función para mostrar los registros de ambiental
                        function mostrarAm($conexion) {
                            $consulta = "SELECT * FROM login WHERE Programa = 'Ing Ambiental'";
                            $resultado = mysqli_query($conexion, $consulta);

                            if ($resultado) {
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    echo "<tr>";
                                    echo "<td>".$fila['Documento']."</td>";
                                    echo "<td>".$fila['PrimerN']."</td>";
                                    echo "<td>".$fila['SegundoN']."</td>";
                                    echo "<td>".$fila['PrimerA']."</td>";
                                    echo "<td>".$fila['SegundoA']."</td>";
                                    echo "<td>".$fila['Programa']."</td>";
                                    echo "<td>".$fila['Correo']."</td>";
                                    echo "<td>".$fila['Fecha']."</td>";
                                    echo "<td>".$fila['Celular']."</td>";
                                    echo "<td>".$fila['Genero']."</td>";
                                    echo "<td>".$fila['Contra']."</td>";
                                    echo "<td>".$fila['Categoria']."</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Error en la consulta: " . mysqli_error($conexion);
                            }

                            mysqli_close($conexion);
                        }

                        // Función para mostrar los registros de software
                        function mostrarS($conexion) {
                            $consulta = "SELECT * FROM login WHERE Programa = 'Ing de Software'";
                            $resultado = mysqli_query($conexion, $consulta);

                            if ($resultado) {
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    echo "<tr>";
                                    echo "<td>".$fila['Documento']."</td>";
                                    echo "<td>".$fila['PrimerN']."</td>";
                                    echo "<td>".$fila['SegundoN']."</td>";
                                    echo "<td>".$fila['PrimerA']."</td>";
                                    echo "<td>".$fila['SegundoA']."</td>";
                                    echo "<td>".$fila['Programa']."</td>";
                                    echo "<td>".$fila['Correo']."</td>";
                                    echo "<td>".$fila['Fecha']."</td>";
                                    echo "<td>".$fila['Celular']."</td>";
                                    echo "<td>".$fila['Genero']."</td>";
                                    echo "<td>".$fila['Contra']."</td>";
                                    echo "<td>".$fila['Categoria']."</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Error en la consulta: " . mysqli_error($conexion);
                            }

                            mysqli_close($conexion);
                        }

                        // Función para mostrar los registros de electrica
                        function mostrarE($conexion) {
                            $consulta = "SELECT * FROM login WHERE Programa = 'Ing Eléctrica'";
                            $resultado = mysqli_query($conexion, $consulta);

                            if ($resultado) {
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    echo "<tr>";
                                    echo "<td>".$fila['Documento']."</td>";
                                    echo "<td>".$fila['PrimerN']."</td>";
                                    echo "<td>".$fila['SegundoN']."</td>";
                                    echo "<td>".$fila['PrimerA']."</td>";
                                    echo "<td>".$fila['SegundoA']."</td>";
                                    echo "<td>".$fila['Programa']."</td>";
                                    echo "<td>".$fila['Correo']."</td>";
                                    echo "<td>".$fila['Fecha']."</td>";
                                    echo "<td>".$fila['Celular']."</td>";
                                    echo "<td>".$fila['Genero']."</td>";
                                    echo "<td>".$fila['Contra']."</td>";
                                    echo "<td>".$fila['Categoria']."</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Error en la consulta: " . mysqli_error($conexion);
                            }

                            mysqli_close($conexion);
                        }

                        // Función para mostrar los registros de ADMS
                        function mostrarADMS($conexion) {
                            $consulta = "SELECT * FROM login WHERE Programa = 'Administración de la Seguridad y Salud en el Trabajo'";
                            $resultado = mysqli_query($conexion, $consulta);

                            if ($resultado) {
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    echo "<tr>";
                                    echo "<td>".$fila['Documento']."</td>";
                                    echo "<td>".$fila['PrimerN']."</td>";
                                    echo "<td>".$fila['SegundoN']."</td>";
                                    echo "<td>".$fila['PrimerA']."</td>";
                                    echo "<td>".$fila['SegundoA']."</td>";
                                    echo "<td>".$fila['Programa']."</td>";
                                    echo "<td>".$fila['Correo']."</td>";
                                    echo "<td>".$fila['Fecha']."</td>";
                                    echo "<td>".$fila['Celular']."</td>";
                                    echo "<td>".$fila['Genero']."</td>";
                                    echo "<td>".$fila['Contra']."</td>";
                                    echo "<td>".$fila['Categoria']."</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Error en la consulta: " . mysqli_error($conexion);
                            }

                            mysqli_close($conexion);
                        }

                        // Función para mostrar los registros de estudiantes
                        function mostrarEs($conexion) {
                            $consulta = "SELECT * FROM login WHERE Categoria = 'Estudiante'";
                            $resultado = mysqli_query($conexion, $consulta);

                            if ($resultado) {
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    echo "<tr>";
                                    echo "<td>".$fila['Documento']."</td>";
                                    echo "<td>".$fila['PrimerN']."</td>";
                                    echo "<td>".$fila['SegundoN']."</td>";
                                    echo "<td>".$fila['PrimerA']."</td>";
                                    echo "<td>".$fila['SegundoA']."</td>";
                                    echo "<td>".$fila['Programa']."</td>";
                                    echo "<td>".$fila['Correo']."</td>";
                                    echo "<td>".$fila['Fecha']."</td>";
                                    echo "<td>".$fila['Celular']."</td>";
                                    echo "<td>".$fila['Genero']."</td>";
                                    echo "<td>".$fila['Contra']."</td>";
                                    echo "<td>".$fila['Categoria']."</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Error en la consulta: " . mysqli_error($conexion);
                            }

                            mysqli_close($conexion);
                        }
                        
                        // Función para mostrar los registros de docente
                        function mostrarDoc($conexion) {
                            $consulta = "SELECT * FROM login WHERE Categoria = 'Docente'";
                            $resultado = mysqli_query($conexion, $consulta);

                            if ($resultado) {
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    echo "<tr>";
                                    echo "<td>".$fila['Documento']."</td>";
                                    echo "<td>".$fila['PrimerN']."</td>";
                                    echo "<td>".$fila['SegundoN']."</td>";
                                    echo "<td>".$fila['PrimerA']."</td>";
                                    echo "<td>".$fila['SegundoA']."</td>";
                                    echo "<td>".$fila['Programa']."</td>";
                                    echo "<td>".$fila['Correo']."</td>";
                                    echo "<td>".$fila['Fecha']."</td>";
                                    echo "<td>".$fila['Celular']."</td>";
                                    echo "<td>".$fila['Genero']."</td>";
                                    echo "<td>".$fila['Contra']."</td>";
                                    echo "<td>".$fila['Categoria']."</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Error en la consulta: " . mysqli_error($conexion);
                            }

                            mysqli_close($conexion);
                        }

                        // Función para mostrar los registros de Director de P
                        function mostrarDir($conexion) {
                            $consulta = "SELECT * FROM login WHERE Categoria = 'Director de Programa'";
                            $resultado = mysqli_query($conexion, $consulta);

                            if ($resultado) {
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    echo "<tr>";
                                    echo "<td>".$fila['Documento']."</td>";
                                    echo "<td>".$fila['PrimerN']."</td>";
                                    echo "<td>".$fila['SegundoN']."</td>";
                                    echo "<td>".$fila['PrimerA']."</td>";
                                    echo "<td>".$fila['SegundoA']."</td>";
                                    echo "<td>".$fila['Programa']."</td>";
                                    echo "<td>".$fila['Correo']."</td>";
                                    echo "<td>".$fila['Fecha']."</td>";
                                    echo "<td>".$fila['Celular']."</td>";
                                    echo "<td>".$fila['Genero']."</td>";
                                    echo "<td>".$fila['Contra']."</td>";
                                    echo "<td>".$fila['Categoria']."</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Error en la consulta: " . mysqli_error($conexion);
                            }

                            mysqli_close($conexion);
                        }
                        
                        // Función para mostrar los registros de admin
                        function mostrarAdm($conexion) {
                            $consulta = "SELECT * FROM login WHERE Categoria = 'Administrativo'";
                            $resultado = mysqli_query($conexion, $consulta);

                            if ($resultado) {
                                while ($fila = mysqli_fetch_array($resultado)) {
                                    echo "<tr>";
                                    echo "<td>".$fila['Documento']."</td>";
                                    echo "<td>".$fila['PrimerN']."</td>";
                                    echo "<td>".$fila['SegundoN']."</td>";
                                    echo "<td>".$fila['PrimerA']."</td>";
                                    echo "<td>".$fila['SegundoA']."</td>";
                                    echo "<td>".$fila['Programa']."</td>";
                                    echo "<td>".$fila['Correo']."</td>";
                                    echo "<td>".$fila['Fecha']."</td>";
                                    echo "<td>".$fila['Celular']."</td>";
                                    echo "<td>".$fila['Genero']."</td>";
                                    echo "<td>".$fila['Contra']."</td>";
                                    echo "<td>".$fila['Categoria']."</td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "Error en la consulta: " . mysqli_error($conexion);
                            }

                            mysqli_close($conexion);
                        }
                        
                        
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
