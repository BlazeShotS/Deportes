<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../assets/css/Login.css">
</head>

<body>

    <div class="login-container">
        <?php if (!empty($mensaje)): ?>
            <div class="error-message">
                <?= htmlspecialchars($mensaje) ?>
            </div>
        <?php endif; ?>

        <h2 class="login-title">Iniciar Sesión</h2>
        <form action="../enrutador/index.php?action=login" method="POST"> <!--Es un POST eso es lo que comparara en mi enrutador-->
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

</body>

</html>