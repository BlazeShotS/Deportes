<?php

// Si no hay sesión iniciada, redirige al login
if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.php");
    exit;
}

// Recuperar datos de sesión
$nombre = $_SESSION['usuario_nombre'] ?? '';
$apellido = $_SESSION['usuario_apellido'] ?? '';
$rol = $_SESSION['usuario_rol'] ?? '';

//Para el manejo de errores
$mensaje = $mensaje ?? "";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
    <link rel="stylesheet" href="/SITIOWEB/assets/css/Categoria.css">
</head>

<body>

    <!--Nombre de usuario, como nombre , apellido y rol-->
    <header class="header-panel">
        <h1>Bienvenido a categorias</h1>
        <div class="user-menu">
            <span class="user-name">
                <?php echo $nombre . " " . $apellido; ?> (<?php echo $rol; ?>)
            </span>
            <br>
            <a href="/SITIOWEB/adminView/Panel.php" style="color: white;">Volver</a>

        </div>
    </header>


    <div class="contenedor-form">
        <h1>Gestión de Categorías</h1>

        <!-- Mostrar mensaje de error o éxito -->
        <?php if (!empty($mensaje)): ?>
            <div id="alerta" class="alerta <?= (strpos($mensaje, 'correctamente') !== false) ? 'exito' : 'error' ?>">
                <?= htmlspecialchars($mensaje) ?>
            </div>
        <?php endif; ?>

        <!--Si $categoriaEditar tiene valor es editar , sino crear-->
        <form class="form-categoria" action="../enrutador/index.php?action=categorias&sub=<?= isset($categoriaEditar) ? "editar" : "crear" ?>" method="POST"> <!--Cuando se presiona el boton GUARDAR , pasa esto , si existe el objeto $categoriaEditar que seleccione desde la tabla significa que esta editando , si no existe por ende se esta creando-->

            <?php if (isset($categoriaEditar)): ?>
                <input type="hidden" name="id" value="<?= htmlspecialchars($categoriaEditar->getId()) ?>">
            <?php endif; ?>

            <div class="form-group">
                <label for="nombre_categoria">Nombre de la categoría:</label>
                <input type="text" id="nombre_categoria" name="nombre_categoria" value="<?= isset($categoriaEditar) ? htmlspecialchars($categoriaEditar->getNombreCategoria()) : '' ?>" required> <!--El value permite evaluar si es editar para que se llene el campo o este vacio si se va crear-->
            </div>
            <button type="submit" class="btn">Guardar</button>
            
            <!--Boton para cancelar si no se kiere editar-->
            
            <?php if (isset($categoriaEditar)): ?>
            <a href="../enrutador/index.php?action=categorias&sub=listar" class="btn-cancelar">Cancelar</a>
            <?php endif; ?>

        </form>
    </div>

    <!-- Tabla de categorías -->
    <div class="contenedor-tabla">
        <h2>Listado de Categorías</h2>
        <table class="tabla-categorias">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Categoría</th>
                    <th>Accion</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($categorias)): ?>
                    <?php foreach ($categorias as $cat): ?> <!--esa $categorias viene de mi enrutador , $categorias es el array de mi objeto categoria y $cat es el objeto individual, cuando le doy $cat->getId, estoy diciendo que de ese objeto el id se muestra -->
                        <tr>
                            <td><?= htmlspecialchars($cat->getId()) ?></td>
                            <td><?= htmlspecialchars($cat->getNombreCategoria()) ?></td>
                            <td>
                                <a href="../enrutador/index.php?action=categorias&sub=editar&id= <?= $cat->getId() ?>">Editar</a> | <!--editar&id , ese id , es el que se envia al enrutador-->
                                <a href="../enrutador/index.php?action=categorias&sub=eliminar&id= <?= $cat->getId() ?>" onclick="return confirm('¿Seguro que deseas eliminar esta categoría?');">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3">No hay categorías registradas.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!--Para que el mensaje desaparezca en 3 segundos-->
    <script>
        setTimeout(() => {
            const alerta = document.getElementById("alerta");
            if (alerta) {
                alerta.style.opacity = "0";
                setTimeout(() => alerta.remove(), 1000); // se elimina del DOM después de la animación
            }
        }, 3000);
    </script>


    <?php include '../partials/footer.php'; ?> <!-- Incluye el footer -->


</body>

</html>