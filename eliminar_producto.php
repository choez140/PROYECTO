<?php
// Include the database connection file
include("config/conexion.php");

// Check if the product ID is provided in the URL
if(isset($_GET["id"]) && !empty($_GET["id"])) {
    // Sanitize the product ID to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET["id"]);

    // SQL query to delete the product with the provided ID
    $deleteQuery = "DELETE FROM producto WHERE cod_producto = '$id'";

    // Execute the delete query
    if ($conn->query($deleteQuery) === TRUE) {
        echo "Producto eliminado correctamente.";
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    // If no product ID is provided in the URL, display an error message
    echo "No se proporcionó ningún ID de producto para eliminar.";
}
?>


