<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h2>Iniciar Sesión</h2>
    <form action="../enrutador/index.php?action=login" method="post">
        <label>Email:</label><br>
        <input type="email" name="email" required><br>
        <label>Contraseña:</label><br>
        <input type="password" name="password" required><br><br>
        <input type="submit" value="Iniciar Sesion">
        
    </form>

</body>
</html>