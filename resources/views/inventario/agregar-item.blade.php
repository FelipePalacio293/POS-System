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
		<form action="/inventario/agregar/item" method="POST" enctype="multipart/form-data">
            @csrf
			<label for="CodigoProducto">Codigo de Producto:</label>
			<input type="text" id="CodigoProducto" name="CodigoProducto" required>
			<label for="CodigoDeBarras">Codigo de Barras:</label>
			<input type="text" id="CodigoDeBarras" name="CodigoDeBarras" required>
			<label for="PrecioProducto">Precio del Producto:</label>
			<input type="text" id="PrecioProducto" name="PrecioProducto" required>
            <label for="NombreProducto">Nombre del Producto:</label>
			<input type="text" id="NombreProducto" name="NombreProducto" required>
            <label for="Cantidad">Cantidad:</label>
			<input type="text" id="Cantidad" name="Cantidad" required>
			<button type="submit" id="botonRegistro" value="enviar">Agregar Items</button>
		</form>
        <table>
            <thead>
                <tr>
                    <th>Item</th>
                    <th>Nombre</th>
                    <th>CodigoDeBarras</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->CodigoProducto }}</td>
                        <td>{{ $item->NombreProducto }}</td>
                        <td>{{ $item->CodigoDeBarras }}</td>
                        <td>{{ $item->PrecioProducto }}</td>
                        <td>{{ $item->Cantidad }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
	</div>
</body>
</html>