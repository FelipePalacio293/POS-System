<!DOCTYPE html>
<html>
<head>
	<title>Iniciar Sesion</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('Proyectos/Login/estilos.css') }}">
</head>
<body>
	<div class="container">
		<div class="login">
			<h1>Iniciar Sesión</h1>
			<form>
				<label for="usuario">Usuario</label>
				<input type="text" id="usuario" name="usuario" required>
				<label for="contraseña">Contraseña</label>
				<input type="password" id="contraseña" name="contraseña" required>
				<input type="submit" value="Ingresar">
			</form>
			<div class="links">
				<a href="#">Olvidaste tu contraseña?</a>
				<a href="#">Crear una cuenta</a>
			</div>
		</div>
	</div>
</body>
</html>