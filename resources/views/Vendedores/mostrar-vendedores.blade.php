<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Items</title>
    <link rel="stylesheet" href="{{ asset('Proyectos/Ventas/estilos.css') }}">
</head>
<body>
    @include('templates.navbar') 
    <h1>Items</h1>
    <div class="contenedor">
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
                        <td>
                            <form action="{{ url('/vendedor/eliminar/' .  $vendedor->id) }}" method="post">
                            @csrf
                            <input type="submit" onclick="return confirm('Desea borrar el usuario?')" value="Borrar">
                            </form>|<a href="{{ url('/vendedor/actualizar/' .  $vendedor->id) }}">Actualizar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>