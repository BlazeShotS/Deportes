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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>
    <link rel="stylesheet" href="/SITIOWEB/assets/css/Panel.css">
</head>

<body>

    <header class="header-panel">
        <h1>Bienvenido al Panel</h1>
        <div class="user-menu">
            <span class="user-name">
                <?php echo $nombre . " " . $apellido; ?> (<?php echo $rol; ?>)
            </span>
            <br>
            <button class="dropdown-btn">▼</button>
            <div class="dropdown-content">
                <a href="/SITIOWEB/index.php">Cerrar sesión</a>
            </div>
        </div>
    </header>


    <main class="contenedor-cards">
        <div class="card usuarios">
            <h2>Usuarios</h2>
            <p>Aquí podrás ver y gestionar a los usuarios registrados.</p>
            <button class="btn">Ver más</button>
        </div>

        <div class="card ropa-deportiva">
            <h2>Ropa Deportiva</h2>
            <p>Registra ropas deportivas.</p>
            <button class="btn">Explorar</button>
        </div>

        <div class="card ropa-deportiva">
            <h2>Categoria</h2>
            <p>Agrega categorias de ropas deportivas.</p>
            <a href="/SITIOWEB/adminView/Categoria.php" class="btn">Explorar</a>
        </div>

        <div class="card quejas-reclamos">
            <h2>Quejas y Reclamos</h2>
            <p>En esta sección puedes dejar tus quejas o reclamos.</p>
            <button class="btn">Ver</button>
        </div>
    </main>

    <?php include '../partials/footer.php'; ?> <!-- Incluye el header -->

    <script>
        document.querySelector(".dropdown-btn").addEventListener("click", function() {
            document.querySelector(".dropdown-content").classList.toggle("show");
        });

        // Cierra el menú si haces clic fuera
        window.addEventListener("click", function(e) {
            if (!e.target.matches('.dropdown-btn')) {
                document.querySelector(".dropdown-content").classList.remove("show");
            }
        });
    </script>


</body>

</html>