<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel Admin</title>
    <link rel="stylesheet" href="/SITIOWEB/assets/css/Panel.css">
</head>
<body>

    <?php include '../partials/header.php'; ?> <!-- Incluye el header -->

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
            <button class="btn">Explorar</button>
        </div>

        <div class="card quejas-reclamos">
            <h2>Quejas y Reclamos</h2>
            <p>En esta sección puedes dejar tus quejas o reclamos.</p>
            <button class="btn">Enviar</button>
        </div>
    </main>

    <?php include '../partials/footer.php'; ?> <!-- Incluye el header -->

</body>
</html>