<?php
    require_once 'conexion.php';
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $pais = $_POST['pais'];
        $habitantes = $_POST['habitantes'];
        $superficie = $_POST['superficie'];
        $tiene_metro = isset($_POST['tiene_metro'])? 1 : 0;
        $query = "UPDATE ciudad SET nombre='$nombre', pais='$pais', habitantes='$habitantes', superficie='$superficie', tiene_metro='$tiene_metro' WHERE id_ciudad='$id'";
        
        if (mysqli_query($connection, $query)) {
            echo "Ciudad modificada correctamente";
        } else {
            echo "Error: " . mysqli_error($connection);
        }

        mysqli_close($connection);
    }
?>