<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro de usuarios</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('Proyectos/Registro-Usuario/estilos.css') }}">
</head>
<body>
    @include('templates.navbar') 
    <div class="container">
        <h1>Registro de usuarios</h1>
        <form action="{{ url('/admin/update/user/' . $user->id ) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="CodigoProducto">Nombre:</label>
            <input type="text" id="CodigoProducto" name="name" value="{{ $user->name }}" required>
            <label for="CodigoDeBarras">Email:</label>
            <input type="text" id="CodigoDeBarras" name="email" value="{{ $user->email }}" required>
            <label for="PrecioProducto">Nuevo rol:</label>
            <select name="rol" id="rol">
                <option value="1">Admin</option>
                <option value="2">Vendedor</option>
                <option value="3">Usuario</option>
            </select>
            <button type="submit" id="botonRegistro" value="enviar">Agregar Items</button>
        </form>
    </div>
</body>
</html>