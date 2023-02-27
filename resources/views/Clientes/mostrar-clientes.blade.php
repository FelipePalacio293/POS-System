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
                    <th>Nombres</th>
                    <th>Primer Apellido</th>
                    <th>Segundo Apellido</th>
                    <th>Numero de Puntos</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tabla-body">
                @foreach($clientes as $cliente)
                    <tr>
                        <td>{{ $cliente->id }}</td>
                        <td>{{ $cliente->Nombres }}</td>
                        <td>{{ $cliente->PrimerApellido }}</td>
                        <td>{{ $cliente->SegundoApellido }}</td>
                        <td>{{ $cliente->NumeroDePuntos }}</td>
                        <td>{{ $cliente->FechaDeRegistro }}</td>
                        <td>Editar/Eliminar</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>