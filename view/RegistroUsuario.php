<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Registro de Usuario</title>
    <link rel="stylesheet" href="../assets/css/RegistroUsuario.css"> <!-- Enlace al CSS externo -->
</head>
<body>
    <div class="form-container">
        <h2 class="form-title">Registrar Usuario</h2>
        <form method="POST" action="../enrutador/index.php?action=registrar" class="formulario">
            <input type="text" name="nombre" placeholder="Nombre" required class="form-input"><br>
            <input type="text" name="apellido" placeholder="Apellido" required class="form-input"><br>
            <input type="number" name="edad" placeholder="Edad" required class="form-input"><br>
            <input type="email" name="email" placeholder="Email" required class="form-input"><br>
            <input type="password" name="password" placeholder="Contraseña" required class="form-input"><br>
            <button type="submit" class="form-button">Registrar</button>
        </form>
    </div>
</body>
</html>
