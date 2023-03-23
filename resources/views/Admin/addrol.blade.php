<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Usuarios</title>
    <link rel="stylesheet" href="{{ asset('Proyectos/Ventas/estilos.css') }}">
</head>
<body>
    @include('templates.navbar') 
    <h1>Mostrar Usuarios</h1>
    <div class="contenedor">
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Roles</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody id="tabla-body">
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>
                            @foreach( $user->roles as $rol )
                                {{ $rol->rolName->Nombre . ',' }}
                            @endforeach
                        </td>   
                        <td>
                            <form action="{{ url('/admin/user/delete/' . $user->id ) }}" method="post">
                                @csrf
                                <input type="submit" onclick="return confirm('Desea borrar el usuario?')" value="Borrar">
                            </form>
                            <a href="{{ url('/admin/user/update/' . $user->id ) }}">Actualizar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</body>
</html>