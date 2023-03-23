<!DOCTYPE html>
<html>
<head>
	<title>Crear Cuenta</title>
	<link rel="stylesheet" type="text/css" href="{{asset('Proyectos/Register/estilos.css')}}">
</head>
<body>
	<div class="container">
		<div class="register">
			<h1>Termine su Registro</h1>
			<form action = "{{ '/usuario/registro/' . $user->id }}" method = "post">
                @csrf
				<label for="Nombre">Nombre:</label>
				<input type="text" id="Nombres" name="Nombres">
				<label for="email">Primer Apellido:</label>
				<input type="text" id="PrimerApellido" name="PrimerApellido" >
				<label for="SegundoApellido">Segundo Apellido:</label>
				<input type="text" id="SegundoApellido" name="SegundoApellido">
				<input type="submit" value="Ingresar">
			</form>
		</div>
	</div>
</body>
</html>