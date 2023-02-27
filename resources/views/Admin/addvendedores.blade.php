<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Registro de usuarios</title>
	<link rel="stylesheet" type="text/css" href="{{ asset('Proyectos/Registro-Usuario/estilos.css') }}">
</head>
<body>
	<div class="container">
		<h1>Registro de usuarios</h1>
		<form action="/admin/aniadir/vendedores" method="POST" id="registroUsuario" enctype="multipart/form-data">
            @csrf
			<label for="Cedula">Cedula:</label>
			<input type="text" id="id" name="id" required>
			<label for="IdEmpresa">Id Empresa:</label>
			<input type="text" id="IdEmpresa" name="IdEmpresa" required>
			<label for="Nombres">Nombres:</label>
			<input type="text" id="Nombres" name="Nombres" required>
            <label for="PrimerApellido">Primer Apellido:</label>
			<input type="text" id="PrimerApellido" name="PrimerApellido" required>
            <label for="SegundoApellido">Segundo Apellido:</label>
			<input type="text" id="SegundoApellido" name="SegundoApellido" required>
			<button type="submit" id="botonRegistro" value="enviar">Crear Vendedor</button>
		</form>
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>id empresa</th>
                    <th>Nombres</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tabla-body">
                @foreach($vendedores as $vendedor)
                    <tr>
                        <td>{{ $vendedor->id }}</td>
                        <td>{{ $vendedor->IdEmpresa }}</td>
                        <td>{{ $vendedor->Nombres }}</td>
                        <td>{{ $vendedor->PrimerApellido }}</td>
                        <td>{{ $vendedor->SegundoApellido }}</td>
                        <td>{{ $vendedor->FechaDeRegistro }}</td>
                        <td>Editar/Eliminar</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
	</div>
</body>
</html>