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
		<form action="" method="POST" enctype="multipart/form-data">
            @csrf
			<label for="Cedula">Cedula:</label>
			<input type="text" id="id" name="id" value="{{ $vendedor->id }}" required>
			<label for="IdEmpresa">Id Empresa:</label>
			<input type="text" id="IdEmpresa" name="IdEmpresa" value="{{ $vendedor->IdEmpresa }}" required>
			<label for="Nombres">Nombres:</label>
			<input type="text" id="Nombres" name="Nombres" value="{{ $vendedor->Nombres }}" required>
            <label for="PrimerApellido">Primer Apellido:</label>
			<input type="text" id="PrimerApellido" name="PrimerApellido" value="{{ $vendedor->PrimerApellido }}" required>
            <label for="SegundoApellido">Segundo Apellido:</label>
			<input type="text" id="SegundoApellido" name="SegundoApellido" value="{{ $vendedor->SegundoApellido }}" required>
			<button type="submit" id="botonRegistro" value="enviar">Crear Vendedor</button>
		</form>
	</div>
</body>
</html>