<?php
    require_once 'conexion.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nombre = $_POST['nombre'];
        $pais = $_POST['pais'];
        $habitantes = $_POST['habitantes'];
        $superficie = $_POST['superficie'];
        $tiene_metro = isset($_POST['tiene_metro'])? 1 : 0;

        $query = "INSERT INTO ciudad (nombre, pais, habitantes, superficie, tiene_metro) VALUES ('$nombre', '$pais', '$habitantes', '$superficie', '$tiene_metro')";
        
        if (mysqli_query($connection, $query)) {
            echo "Ciudad agregada correctamente";
        } else {
            echo "Error al insertar el registro: " . mysqli_error($connection);
        }
        
        mysqli_close($connection);
    }
?>