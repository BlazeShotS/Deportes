<?php
session_start();

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
            <div class="alerta">
                <?= htmlspecialchars($mensaje) ?>
            </div>
        <?php endif; ?>

        <form class="form-categoria" action="../enrutador/index.php?action=categorias" method="POST">
            <div class="form-group">
                <label for="nombre_categoria">Nombre de la categoría:</label>
                <input type="text" id="nombre_categoria" name="nombre_categoria" required>
            </div>
            <button type="submit" class="btn">Guardar</button>
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
                    <?php foreach ($categorias as $cat): ?> <!--esa $categorias viene de mi enrutador -->
                        <tr>
                            <td><?= htmlspecialchars($cat->getId()) ?></td>
                            <td><?= htmlspecialchars($cat->getNombreCategoria()) ?></td>
                            <td>Editar | Eliminar</td>
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


    <?php include '../partials/footer.php'; ?> <!-- Incluye el footer -->


</body>

</html>