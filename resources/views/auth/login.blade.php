<!DOCTYPE html>
<html>
<head>
	<title>Iniciar Sesion</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('Proyectos/Login/estilos.css') }}
">
</head>
<body>
	<div class="container">
		<div class="login">
			<img src="{{ asset('Imgs/supermercado2.png') }}" width="150px">
			<h1>Iniciar Sesión</h1>
			<form action = "{{route('login-user')}}" method = 'post'>
                @if(Session::has('Ingresado'))
                	<div class="alert alert-success">{{ Session::get('Ingresado') }}</div>
                @endif
                @if(Session::has('No ingresado'))
                	<div class="alert alert-danger">{{ Session::get('No ingresado') }}</div>
                @endif
                @csrf
				<label for="usuario">Usuario</label>
				<input type="text" id="usuario" name="name" value = "{{old('name')}}">
                <span class = 'text-danger' >@error('name') {{$message}} @enderror</span>
				<label for="contraseña">Contraseña</label>
				<input type="password" id="contraseña" name="password" value = "{{old('password ')}}">
                <span class = 'text-danger' >@error('password') {{$message}} @enderror</span>
				<input type="submit" value="Ingresar">
			</form>
			<div class="links">
				<a href="#">¿Olvidaste tu contraseña?</a>
				<a href="#">Crear una cuenta</a>
			</div>
		</div>
	</div>
</body>
</html>