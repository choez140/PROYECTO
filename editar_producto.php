<?php
// Include the database connection file
include("config/conexion.php");

// Obtener el ID del producto a editar desde la URL
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    $id = mysqli_real_escape_string($conn, $_GET["id"]);

    // Obtener datos del producto de la base de datos
    $selectQuery = "SELECT * FROM producto WHERE cod_producto = '$id'";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $cod_producto = $row["cod_producto"];
        $nom_producto = $row["nom_producto"];
        $precio = $row["precio"];
        $fecha_elab = $row["fecha_elab"];
        $fecha_cad = $row["fecha_cad"];
        $cantidad = $row["cantidad"];
        $cod_categoria = $row["cod_categoria"];
    } else {
        echo "No se encontró ningún producto con el ID proporcionado.";
        exit(); // Termina el script si no se encuentra el producto
    }
} else {
    echo "No se proporcionó ningún ID de producto para editar.";
    exit(); // Termina el script si no se proporciona el ID
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edición de Producto</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center my-4">Edición de Producto</h2>
        <form action="actualizar_producto.php" method="POST">
            <input type="hidden" name="cod_producto" value="<?php echo $cod_producto; ?>">
            <div class="form-group">
                <label for="nom_producto">Nombre de Producto:</label>
                <input type="text" class="form-control" name="nom_producto" value="<?php echo $nom_producto; ?>" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio:</label>
                <input type="text" class="form-control" name="precio" value="<?php echo $precio; ?>" required>
            </div>
            <div class="form-group">
                <label for="fecha_elab">Fecha de Elaboración:</label>
                <input type="date" class="form-control" name="fecha_elab" value="<?php echo $fecha_elab; ?>" required>
            </div>
            <div class="form-group">
                <label for="fecha_cad">Fecha de Caducidad:</label>
                <input type="date" class="form-control" name="fecha_cad" value="<?php echo $fecha_cad; ?>" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad:</label>
                <input type="number" class="form-control" name="cantidad" value="<?php echo $cantidad; ?>" required>
            </div>
            <div class="form-group">
                <label for="cod_categoria">Código de Categoría:</label>
                <input type="text" class="form-control" name="cod_categoria" value="<?php echo $cod_categoria; ?>" required>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">Actualizar Producto</button>
            </div>
        </form>
    </div>
</body>
</html>
