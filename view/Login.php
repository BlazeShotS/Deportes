<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/Login.css">
</head>

<body>

    <?php include '../partials/header.php'; ?> <!-- Incluye el header -->


    <main class="main-login">
        <div class="login-container">
            <?php if (!empty($mensaje)): ?>
                <div class="error-message">
                    <?= htmlspecialchars($mensaje) ?>
                </div>
            <?php endif; ?>

            <h2 class="login-title">Iniciar Sesión</h2>
            <form action="../enrutador/index.php?action=login" method="POST"> <!--Es un POST eso es lo que comparara en mi enrutador, cuando se procesa si sale con exito mi controlador redirecciona a donde quiero , si puse mal la contra o algo me saldra esta url y en mi enrutador puse que en Login.php se mostrara el mensaje -->
                <div class="form-group">
                    <label class="form-label">Email:</label>
                    <input type="email" name="email" class="form-input" required>
                </div>

                <div class="form-group">
                    <label class="form-label">Contraseña:</label>
                    <input type="password" name="password" class="form-input" required>
                </div>

                <button type="submit" class="form-button">Iniciar sesión</button>
            </form>
        </div>
    </main>

    <?php include '../partials/footer.php'; ?> <!-- Incluye el header -->

</body>

</html>