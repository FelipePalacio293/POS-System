<!DOCTYPE html>
<html>
<head>
	<title>Crear Cuenta</title>
	<link rel="stylesheet" type="text/css" href="{{asset('Proyectos/Register/estilos.css')}}">
</head>
<body>
	<div class="container">
		<div class="register">
			<h1>Crear Cuenta</h1>
			<form action = "{{route('register-user')}}" method = "post">
                @if(Session::has('Registrado'))
                <div class="alert alert-success">{{Session::get('Registrado')}}</div>
                @endif
                @if(Session::has('No registrado'))
                <div class="alert alert-danger">{{Session::get('No registrado')}}</div>
                @endif
                @csrf
				<label for="usuario">Usuario</label>
				<input type="text" id="usuario" name="name" value = "{{old('name')}}">
                <span class = 'text-danger' >@error('name') {{$message}} @enderror</span>
				<label for="email">Email:</label>
				<input type="email" id="email" name="email" value = "{{old('email')}}" >
                <span class = 'text-danger' >@error('email') {{$message}} @enderror</span>
				<label for="contraseña">Contraseña</label>
				<input type="password" id="contraseña" name="password" value = "{{old('password')}}">
                <span class = 'text-danger' >@error('password') {{$message}} @enderror</span>
			<div class="links">
				<input type="checkbox" id="terminos-condiciones" name="terminos-condiciones " required>
				<a href="#">Acepto los terminos y condiciones.</a>
			</div>
				<input type="submit" value="Ingresar">
			</form>
		</div>
	</div>
</body>
</html>