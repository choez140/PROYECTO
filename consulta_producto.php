<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Productos</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <style>
        th {
            background-color: #007bff;
            color: #fff;
        }
    </style>
</head>
<body>
    <div class="container"> 
        <div class="row">
            <div class="col">
                <table class="table table-bordered table-hover" id="tabla_datos">
                    <tread>
                    <tr>
                        <th>Código de Producto</th>
                        <th>Nombre de Producto</th>
                        <th>Precio</th>
                        <th>Fecha de Elaboración</th>
                        <th>Fecha de Caducidad</th>
                        <th>Cantidad</th>
                        <th>Cod_Categoría</th>
                        <th>eliminar</th>
                        <th>editar</th>
                    </tr>
                    </tread>
                    <?php
                    include("config/conexion.php");
                    $consulta = "SELECT * FROM producto";
                    $resultado = $conn->query($consulta);
                    if ($resultado->num_rows > 0) {
                        while ($row = $resultado->fetch_assoc()) {
                            $cod_producto = $row["cod_producto"];
                            $nom_producto = $row["nom_producto"]; // Asegúrate de que esta columna existe en tu base de datos
                            $precio = $row["precio"];
                            $fecha_elab = $row["fecha_elab"];
                            $fecha_cad = $row["fecha_cad"];
                            $cantidad = $row["cantidad"];
                            $cod_categoria = $row["cod_categoria"]; // Asegúrate de que esta columna existe en tu base de datos
                    
                            echo '<tr>
                                    <td>'.$cod_producto.'</td>
                                    <td>'.$nom_producto.'</td>
                                    <td>'.$precio.'</td>
                                    <td>'.$fecha_elab.'</td>
                                    <td>'.$fecha_cad.'</td>
                                    <td>'.$cantidad.'</td>
                                    <td>'.$cod_categoria.'</td>
                                    <td>
                                        <a href="eliminar_producto.php?id='.$cod_producto.'">Eliminar</a>
                                    </td>
                                    <td>
                                        <a href="editar_producto.php?id='.$cod_producto.'">Editar</a>
                                    </td>
                                  </tr>';
                        }
                    } else {
                        echo "<tr><td colspan='8'>No hay productos disponibles</td></tr>";
                    }   
                    mysqli_close($conn);
                    ?>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
