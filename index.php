<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Practica 6</title>
</head>

<body>
    <table border="1">
        <tr>
            <th>id</th>
            <th>ciudad</th>
            <th>pais</th>
            <th>habitantes</th>
            <th>superficie</th>
            <th>tieneMetro</th>
            <th>Acciones</th>
        </tr>

        <?php
        require_once 'conexion.php';

        $resultados_por_pagina = 5;

        if (!isset($_GET['pagina'])) {
            $pagina = 1;
        } else {
            $pagina = $_GET['pagina'];
        }


        $inicio = ($pagina - 1) * $resultados_por_pagina;


        $query = "SELECT * FROM ciudad LIMIT $inicio, $resultados_por_pagina";
        $result = $connection->query($query);

        if (!$result) {
            $result->close();
            $connection->close();
            die("Error en la consulta");
        } else {
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                echo "<tr>";
                echo "<td>" . $row['id_ciudad'] . "</td>";
                echo "<td>" . $row['nombre'] . "</td>";
                echo "<td>" . $row['pais'] . "</td>";
                echo "<td>" . $row['habitantes'] . "</td>";
                echo "<td>" . $row['superficie'] . "</td>";
                echo "<td>" . $row['tiene_metro'] . "</td>";
                echo '
                    <td>
                        <a href="editar.php?id=' . $row['id_ciudad'] . '">Editar</a>
                    </td>
                    <td>
                        <a href="borrar.php?id=' . $row['id_ciudad'] . '">Borrar</a>
                    </td>
                ';
                echo "</tr>";
            }

            $result->close();

            $query_paginacion = "SELECT COUNT(*) as total FROM ciudad";
            $result_paginacion = $connection->query($query_paginacion);
            $fila_paginacion = $result_paginacion->fetch_assoc();
            $total_filas = $fila_paginacion['total'];
            $total_paginas = ceil($total_filas / $resultados_por_pagina);

            echo "</table>";

            echo "<div>";
            for ($i = 1; $i <= $total_paginas; $i++) {
                echo "<a href='index.php?pagina=$i'>$i</a> ";
            }
            echo "</div>";
        }

        $connection->close();
        ?>
    <h2>Insertar Ciudad</h2>
    <form action="insertar.php" method="post">
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" required>

        <label for="pais">Pais:</label>
        <input type="text" name="pais" required>

        <label for="habitantes">Habitantes:</label>
        <input type="number" name="habitantes" required>

        <label for="superficie">Superficie:</label>
        <input type="number" name="superficie" required>

        <label for="tiene_metro">¿Tiene metro?</label>
        <input type="checkbox" name="tiene_metro">

        <input type="submit" value="Insertar">
    </form>
</body>

</html>