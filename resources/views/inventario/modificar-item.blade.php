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
		<form action="/inventario/actualizar/item" method="POST" enctype="multipart/form-data">
            @csrf
			<label for="CodigoProducto">Codigo de Producto:</label>
			<input type="text" id="CodigoProducto" name="CodigoProducto" value="{{ $items->CodigoProducto }}" required>
			<label for="CodigoDeBarras">Codigo de Barras:</label>
			<input type="text" id="CodigoDeBarras" name="CodigoDeBarras" value="{{ $items->CodigoDeBarras }}" required>
			<label for="PrecioProducto">Precio del Producto:</label>
			<input type="text" id="PrecioProducto" name="PrecioProducto" value="{{ $items->PrecioProducto }}" required>
            <label for="NombreProducto">Nombre del Producto:</label>
			<input type="text" id="NombreProducto" name="NombreProducto" value="{{ $items->NombreProducto }}" required>
			<label for="Cantidad">Cantidad:</label>
			<input type="text" id="Cantidad" name="Cantidad" value="{{ $items->Cantidad }}" required>
			<button type="submit" id="botonRegistro" value="enviar">Agregar Items</button>
		</form>
	</div>
</body>
</html>