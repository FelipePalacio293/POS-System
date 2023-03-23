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
				<label for="usuario">Email</label>
				<input type="text" id="usuario" name="email" value = "{{old('email')}}">
                <span class = 'text-danger' >@error('email') {{$message}} @enderror</span>
				<label for="contraseña">Contraseña</label>
				<input type="password" id="contraseña" name="password" value = "{{old('password ')}}">
                <span class = 'text-danger' >@error('password') {{$message}} @enderror</span>
				<label for="one_time_password" class="col-md-4 col-form-label text-md-right">{{ __('One Time Password') }}</label>

				
				<input id="one_time_password" type="text" class="form-control @error('one_time_password') is-invalid @enderror" name="one_time_password" required autocomplete="one_time_password">

				@error('one_time_password')
					<span class="invalid-feedback" role="alert">
						<strong>{{ $message }}</strong>
					</span>
				@enderror
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