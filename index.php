<?php
require_once __DIR__ . '/ruta.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>Página de inicio - Simple</title>
  <link rel="stylesheet" href="<?= BASE_URL ?>estilo.css"> <!--estilo.css-->
</head>
<body>
  
  <?php include __DIR__ . '/partials/header.php'; ?>  <!-- Incluye el header -->


  <main class="container">
    <!-- HERO PRINCIPAL -->
    <section class="hero">
      <div class="hero-inner">
        <h1>¡Eleva tu rendimiento con estilo!</h1>
        <p class="lead">Descubre la mejor ropa deportiva para entrenar, correr o simplemente sentirte cómodo cada día.</p>
        <div class="actions">
          <a class="btn btn-primary" href="#">Comprar ahora</a>
          <a class="btn btn-outline" href="#">Explorar colección</a>
        </div>

        <!-- TARJETAS DE CATEGORÍAS -->
        <div class="cards">
          <div class="card">
            <h3>Para Ellas</h3>
            <p>Leggings, tops y conjuntos diseñados para moverte con libertad y estilo.</p>
          </div>
          <div class="card">
            <h3>Para Ellos</h3>
            <p>Pantalones, camisetas y sudaderas con tecnología transpirable y ajuste perfecto.</p>
          </div>
          <div class="card">
            <h3>Accesorios</h3>
            <p>Gorras, mochilas, guantes y más para acompañarte en cada entrenamiento.</p>
          </div>
        </div>
      </div>
    </section>

    <!-- SECCIÓN INSPIRACIONAL -->
    <section class="usage">
      <h2>Motívate cada día</h2>
      <p class="lead">En <strong>Tendaly Sport</strong> creemos que el deporte es más que un hábito: es una forma de vida. Viste cómodo, luce bien y rinde al máximo. 💪</p>
      <p><a href="#" class="btn btn-primary">Descubre más</a></p>
    </section>
  </main>


  <?php include __DIR__ . '/partials/footer.php'; ?> <!-- Incluye el header -->

</body>
</html>
