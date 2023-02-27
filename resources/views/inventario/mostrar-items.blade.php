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
                    <th>Item</th>
                    <th>Nombre</th>
                    <th>CodigoDeBarras</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tabla-body">
                @foreach($items as $item)
                    <tr>
                        <td>{{ $item->CodigoProducto }}</td>
                        <td>{{ $item->NombreProducto }}</td>
                        <td>{{ $item->CodigoDeBarras }}</td>
                        <td>{{ $item->PrecioProducto }}</td>
                        <td>{{ $item->Cantidad }}</td>
                        <td>
                            <form action="{{ url('/inventario/eliminar/item/' .  $item->CodigoProducto) }}" method="post">
                                @csrf
                                <input type="submit" onclick="return confirm('Desea borrar el usuario?')" value="Borrar">
                            </form>
                            <a href="{{ url('inventario/actualizar/item/' .  $item->CodigoProducto) }}">Actualizar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>