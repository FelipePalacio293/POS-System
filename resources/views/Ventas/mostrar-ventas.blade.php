<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Ventas</title>
    <link rel="stylesheet" href="{{ asset('Proyectos/Ventas/estilos.css') }}">
</head>
<body>
    @include('templates.navbar') 
    <h1>Ventas</h1>
    <div class="contenedor">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>Numero de Productos</th>
                    <th>Total Items</th>
                    <th>Total Parcial</th>
                    <th>IVA</th>
                    <th>Total Descuento</th>
                    <th>Total Venta</th>
                    <th>Fecha de Venta</th>
                    <th>Id Vendedor</th>
                    <th>Id Cliente</th>
                    <th>Observaciones</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tabla-body">
                @foreach($ventas as $venta)
                    <tr>
                        <td>{{ $venta->id }}</td>
                        <td>{{ $venta->NumeroProductos }}</td>
                        <td>{{ $venta->TotalItems }}</td>
                        <td>{{ $venta->TotalParcial }}</td>
                        <td>{{ $venta->iva }}</td>
                        <td>{{ $venta->TotalDescuento }}</td>
                        <td>{{ $venta->TotalVenta }}</td>
                        <td>{{ $venta->FechaDeVenta }}</td>
                        <td>{{ $venta->IdVendedor }}</td>
                        <td>{{ $venta->IdCliente }}</td>
                        <td>{{ $venta->Observaciones }}</td>
                        <td>Editar/Eliminar</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>