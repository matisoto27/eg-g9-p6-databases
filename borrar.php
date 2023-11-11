<?php
    require_once 'conexion.php';
    
    if ($_SERVER["REQUEST_METHOD"] == "GET") {
        if ($connection->connect_error) die("Error al Conectar con la Base de Datos");
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $query = "DELETE FROM ciudad WHERE id_ciudad = '$id'";
            echo "Hola";
            if (mysqli_query($connection, $query)) {
                echo "Ciudad eliminada";
            } else {
                echo "Error: " . mysqli_error($connection);
            }
            mysqli_close($connection);
        }
    }
?>