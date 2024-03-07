<?php
// Include the database connection file
include("config/conexion.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $cod_producto = $_POST["cod_producto"];
    $nom_producto = $_POST["nom_producto"];
    $precio = $_POST["precio"];
    $fecha_elab = $_POST["fecha_elab"];
    $fecha_cad = $_POST["fecha_cad"];
    $cantidad = $_POST["cantidad"];
    $categorias = $_POST["cod_categoria"];

    // SQL query to update data in the database
    $updateQuery = "UPDATE producto
                    SET nom_producto = '$nom_producto',
                        precio = '$precio',
                        fecha_elab = '$fecha_elab',
                        fecha_cad = '$fecha_cad',
                        cantidad = '$cantidad',
                        cod_categoria = '$categorias'
                    WHERE cod_producto = '$cod_producto'";

    // Check if the query was successful
    if ($conn->query($updateQuery) === TRUE) {
        echo "Producto actualizado correctamente.";
    } else {
        // Display more detailed error information
        echo "Error al actualizar el producto: " . $conn->error . "<br>";
        echo "Query: " . $updateQuery; // Display the actual query for debugging
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
