<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h2>Iniciar Sesión</h2>
    <form action="../enrutador/index.php?action=login" method="POST"> <!--Es un POST, eso es lo comparara en mi enrutador-->
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>
        <button type="submit" class="form-button">Iniciar sesion</button>
    </form>

</body>
</html>