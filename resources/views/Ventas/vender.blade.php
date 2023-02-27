<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>REGISTRO de usuarios</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('Proyectos/Registro-Usuario/estilos.css') }}">
</head>
<body>
	<div class="container">
		<h1>REGISTRO de usuarios</h1>
		<form id="registroUsuario">
			<label for="name">Codigo de Barras:</label>
			<input type="text" id="nombre" required>
			<label for="email">Codigo de Producto:</label>
			<input type="text" id="email" required>
			<label for="text">Cantidad:</label>
			<input type="text" id="contraseña" required>
			<button type="submit" id="botonRegistro">Registrar</button>
			<input type="hidden" id="indiceUsuario">
		</form>
		
		<table>
			<thead>
				<tr>
					<th>Codigo de Barras</th>
					<th>Codigo de Producto</th>
					<th>Cantidad</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody id="tableDeUsuarios">
			</tbody>
		</table>
		<button type="submit" id="botonRegistro" onclick="sendData();">Registrar</button>
	</div>
	
	<script src="{{ asset('Proyectos/Registro-Usuario/registro.js') }}"></script>
</body>
</html>