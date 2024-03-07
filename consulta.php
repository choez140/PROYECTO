<?php
include("config/conexion.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>consulta productos</title>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
<link rel="stylesheet" href="css/bootstrap.css"/>
    <script src="js/jquery-3.7.1.js"></script>
</head>
<div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <a href="ingreso.html" class="btn btn-primary mt-3 mb-3">Agregar Nuevo Producto</a>
            </div> 
        </div>
    </div>
   
<body>
    <table id="tabla_datos" class="table table-bordered table-hover ">
        <thead>
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
        </thead>
        <?php
        include("config/conexion.php");
        $consulta = "SELECT * FROM producto";

        if ($resultado = $conn->query($consulta)) {
            echo "<tbody>";
            while ($filas = $resultado->fetch_assoc()) {
                $cod_producto = $filas["cod_producto"];
                $nom_producto = $filas["nom_producto"];
                $precio = $filas["precio"];
                $fecha_elab = $filas["fecha_elab"];
                $fecha_cad = $filas["fecha_cad"];
                $cantidad = $filas["cantidad"];
                $cod_categoria = $filas["cod_categoria"];
                
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
            echo "</tbody>";
        } else {
            echo "<tr><td colspan='8'>No hay productos disponibles</td></tr>";
        }
        mysqli_close($conn);
        ?>
    </table>
    <script>
        $(document).ready(function () {
            $('#tabla_datos').DataTable();
        });
    </script>
       <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
</body>
</html>
