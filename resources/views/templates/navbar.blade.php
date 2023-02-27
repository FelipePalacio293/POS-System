<head>
  <meta charset="UTF-8">
  <title>Nombre</title>
  <link rel="stylesheet" href="{{ asset('Proyectos/Principal/estilos.css') }}">
  <script src="{{ asset('Proyectos/Principal/principal.js') }}"></script>
</head>
<body>
  <img src="{{ asset('Imgs/supermercado.png') }}">
  <header>
    <h1>Nombre</h1>
  </header>
  <nav>
    <ul>
      <li><a href=""><img src="{{ asset('Imgs/inventario-disponible.png') }}" alt="Inventario">Inventario</a></li>
      <li><a href=""><img src="{{ asset('Imgs/ventas.png') }}" alt="Ventas">Ventas</a></li>
      <li><a href=""><img src="{{ asset('Imgs/registro.png') }}" alt="Registro de usuarios">Registrar Usuario</a></li>
      <li><a href=""><img src="{{ asset('Imgs/usuario.png') }}" alt="Mi cuenta">Mi cuenta</a></li>
    </ul>
  </nav>
</body>