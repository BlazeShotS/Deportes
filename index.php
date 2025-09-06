<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Página de inicio - Simple</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
  
  <?php include 'partials/header.php'; ?> <!-- Incluye el header -->


  <main class="container">
    <section class="hero">
      <div class="hero-inner">
        <h1>Bienvenido a tu página principal</h1>
        <p class="lead">Plantilla limpia y responsive creada con HTML y CSS puro.</p>
        <div class="actions">
          <a class="btn btn-primary" href="#">Comenzar</a>
          <a class="btn btn-outline" href="#">Ver más</a>
        </div>

        <div class="cards">
          <div class="card">
            <h3>Diseño responsivo</h3>
            <p>Se adapta a móviles, tabletas y escritorio.</p>
          </div>
          <div class="card">
            <h3>Fácil de editar</h3>
            <p>Modifica textos, colores y estructura rápidamente.</p>
          </div>
          <div class="card">
            <h3>Ligera y rápida</h3>
            <p>Sin librerías adicionales: carga rápida y buena base para ampliar.</p>
          </div>
        </div>
      </div>
    </section>

    <section class="usage">
      <h2>¿Cómo usarla?</h2>
      <p class="lead">Copia este archivo como <code>index.html</code> y ábrelo en tu navegador. Los estilos están en <code>assets/css/style.css</code>.</p>
    </section>
  </main>

  <?php include 'partials/footer.php'; ?> <!-- Incluye el header -->

</body>
</html>
