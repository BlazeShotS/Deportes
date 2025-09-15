<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria</title>
    <link rel="stylesheet" href="/SITIOWEB/assets/css/Categoria.css">
</head>
<body>


    <div class="contenedor-form">
        <h1>Gestión de Categorías</h1>

        <!-- Formulario -->
        <form class="form-categoria">
            <div class="form-group">
                <label for="nombre_categoria">Nombre de la categoría:</label>
                <input type="text" id="nombre_categoria" name="nombre_categoria" required>
            </div>
            <button type="submit" class="btn">Guardar</button>
        </form>
    </div>

    <!-- Tabla de categorías -->
    <div class="contenedor-tabla">
        <h2>Listado de Categorías</h2>
        <table class="tabla-categorias">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre Categoría</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Deportiva</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Casual</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Formal</td>
                </tr>
            </tbody>
        </table>
    </div>


    
</body>
</html>