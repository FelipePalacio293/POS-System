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
		<form action="/inventario/agregar/items" method="POST" enctype="multipart/form-data">
            @csrf
			<label for="archivo">Archivo:</label>
			<input type="file" id="archivo" name="archivo" required>
            <br>
			<button type="submit" id="botonRegistro" value="enviar">Agregar Items</button>
		</form>
        
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Nombre</th>
                    <th>CodigoDeBarras</th>
                    <th>Precio</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->CodigoProducto }}</td>
                        <td>{{ $item->NombreProducto }}</td>
                        <td>{{ $item->CodigoDeBarras }}</td>
                        <td>{{ $item->PrecioProducto }}</td>
                        <td>Eliminar/ <a href="'/inventario/actualizar/item/' . {{ $item->CodigoProducto }}">Actualizar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
	</div>
</body>
</html>