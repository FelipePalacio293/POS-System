<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro de usuarios</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('Proyectos/Registro-Usuario/estilos.css') }}">
</head>
<body>
    @include('templates.navbar') 
    <div class="container">
        <h1>Registro de usuarios</h1>
        <p>El codigo de doble factor para Google Authenticator es {{ $qrCode }}</p>
    </div>
</body>
</html>