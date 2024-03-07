<?php
// Include the database connection file
include("config/conexion.php");

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $cod_producto = $_POST["cod_producto"];
    $nom_producto = $_POST["nom_producto"]; // Corregido el nombre del campo
    $precio = $_POST["precio"];
    $fecha_elab = $_POST["fecha_elab"];
    $fecha_cad = $_POST["fecha_cad"];
    $cantidad = $_POST["cantidad"];
    $categorias = $_POST["cod_categoria"]; 

    // SQL query to insert data into the database
    $insertQuery = "INSERT INTO producto (cod_producto, nom_producto, precio, fecha_elab, fecha_cad, cantidad, cod_categoria)
                    VALUES ('$cod_producto', '$nom_producto', '$precio', '$fecha_elab', '$fecha_cad', '$cantidad', '$categorias')";

    // Check if the query was successful
    if ($conn->query($insertQuery) === TRUE) {
        echo "Producto ingresado correctamente.";
    } else {
        // Display more detailed error information
        echo "Error al ingresar el producto: " . $conn->error . "<br>";
        echo "Query: " . $insertQuery; // Display the actual query for debugging
    }

    // Retrieve all data from the 'producto' table
    $selectQuery = "SELECT * FROM producto";
    $result = $conn->query($selectQuery);

    // Display the data in a table
    if ($result->num_rows > 0) {
        echo "<table border='1'>
                <tr>
                    <th>Cod_producto</th>
                    <th>nom_producto</th>
                    <th>Precio</th>
                    <th>Fecha_elab</th>
                    <th>Fecha_cad</th>
                    <th>Cantidad</th>
                    <th>Cod_categoria</th>
                </tr>";

        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>".$row["cod_producto"]."</td>
                    <td>".$row["nom_producto"]."</td>
                    <td>".$row["precio"]."</td>
                    <td>".$row["fecha_elab"]."</td>
                    <td>".$row["fecha_cad"]."</td>
                    <td>".$row["cantidad"]."</td>
                    <td>".$row["cod_categoria"]."</td>
                </tr>";
        }

        echo "</table>";
    } else {
        echo "No hay datos en la tabla.";
    }

    // Close the database connection
    mysqli_close($conn);
}
?>
