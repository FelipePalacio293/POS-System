<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Registrar Venta</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('Proyectos/Registro-Usuario/estilos.css') }}">
</head>
<body>
	<div class="container">
		<h1>Registrar Venta</h1>
		<form id="registroUsuario">
			<label for="name">Codigo de Barras:</label>
			<input type="text" id="nombre" name="query" required>
			<label for="text">Cantidad:</label>
			<input type="text" id="contraseña" required>
			<button type="submit" id="botonRegistro">Registrar</button>
			<input type="hidden" id="indiceUsuario">
		</form>
		
		<table>
			<thead>
				<tr>
					<th>Codigo de Barras</th>
					<th>Cantidad</th>
					<th>Precio Total</th>
					<th>Nombre</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody id="tableDeUsuarios">
			</tbody>
		</table>
		<label for="text">Correo Cliente:</label>
		<input type="email" id="CorreoCliente">
		<label for="text">Metodo de pago:</label>
		<select name="metododepago" id="metodo">
			<option value="1">Efectivo</option>
			<option value="2">Tarjeta</option>
		</select>
		<button type="submit" id="botonRegistro" onclick="sendData();">Registrar</button>
	</div>
	
	<script src="{{ asset('Proyectos/Registro-Usuario/registro.js') }}"></script>
</body>
</html>