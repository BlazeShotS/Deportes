<?php
require_once __DIR__ . '/../ruta.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Header</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>estilo.css">

</head>

<body>

    <header>
        <div class="container nav">
            <div class="brand">
                <div>
                    <br>
                    <strong>MUNDO DEPORTES</strong>
                    <br>
                    <hr>
                    <div class="subtitle">😊</div>
                </div>
            </div>
            <nav>
                <ul>
                    <li><a href="<?= BASE_URL ?>index.php">Inicio</a></li>
                    <li><a href="#">Servicios</a></li>
                    <li><a href="<?= BASE_URL ?>view/Login.php">Login</a></li>
                    <li><a href="<?= BASE_URL ?>view/RegistroUsuario.php">Registrarse</a></li>
                    <li><a href="#">Contacto</a></li>
                    <li><a href="#">Quejas</a></li>
                </ul>
            </nav>
        </div>
    </header>

</body>

</html>