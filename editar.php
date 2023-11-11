<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar</title>
</head>
<body>
<form action="cambiar.php" method="post">
        <?php
            echo '
                <input type="hidden" name="id" value="' . $_GET['id'] . '"> 
            ';
            if ($_SERVER["REQUEST_METHOD"] == "GET") {
                require_once 'conexion.php';
                $id = $_GET['id'];
                if ($connection->connect_error) die("Error al Conectar con la Base de Datos");
                $query = "SELECT * FROM ciudad WHERE id_ciudad = $id";
                $result = $connection->query($query);
                if (!$result) {
                    $result->close();
                    $connection->close();
                    die("Fatal Error");
                }
                else {
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $rows = $result->num_rows;
                    for ($i = 0; $i < $rows; ++$i) {
        echo '
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" value=" ' . $row['nombre'] . ' "required> ';
        
        echo '
        <label for="pais">Pais:</label>
        <input type="text" name="pais" value=" ' . $row['pais'] . ' "required> ';

        echo '
        <label for="habitantes">Habitantes:</label>
        <input type="text" name="habitantes" value=" ' . $row['habitantes'] . ' "required> ';

        echo '
        <label for="superficie">Superficie:</label>
        <input type="text" name="superficie" value=" ' . $row['superficie'] . ' "required> ';
        
        echo '
        <label for="tiene_metro">¿Tiene metro?</label>
        <input type="checkbox" name="tiene_metro" value=" ' . $row['tiene_metro'] . ' "> ';
        
        echo '
        <input type="submit" value="Insertar">';
                    }
                }
            }
        ?>
    </form>
</body>
</html>