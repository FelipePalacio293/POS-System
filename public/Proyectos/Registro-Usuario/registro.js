const usuariosRegistrados = [];

// Función para agregar usuario
function agregarUsuario() {
    const nombre = document.getElementById( "nombre" ).value;
    const email = document.getElementById( "email" ).value;
    const contraseña = document.getElementById( "contraseña" ).value;
    const indiceUsuario = document.getElementById( "indiceUsuario" ).value;

    if( indiceUsuario ){
        // Actualizar un usuario existente
        usuariosRegistrados[ indiceUsuario ].nombre = nombre;
        usuariosRegistrados[ indiceUsuario ].email = email;
        usuariosRegistrados[ indiceUsuario ].contraseña = contraseña;
        document.getElementById( "botonRegistro" ).innerHTML = "Registrar";
        limpiarRegistro();
        mostrarUsuarios();
    } 
    else {
        // Agregar un nuevo usuario
        usuariosRegistrados.push( { nombre, email, contraseña } );
        limpiarRegistro();
        mostrarUsuarios();
    }
}

// Función para limpiar los campos del formulario
function limpiarRegistro() {
    document.getElementById( "nombre" ).value = "";
    document.getElementById( "email" ).value = "";
    document.getElementById( "contraseña" ).value = "";
    document.getElementById( "indiceUsuario" ).value = "";
}

// Función para mostrar los usuarios en una tabla
function mostrarUsuarios() {
    const tableBody = document.getElementById( "tableDeUsuarios" );
    let tableHtml = "";
    for( let i = 0; i < usuariosRegistrados.length; i++ ){
        tableHtml += "<tr>";
        tableHtml += "<td>" + usuariosRegistrados[ i ].nombre + "</td>";
        tableHtml += "<td>" + usuariosRegistrados[ i ].email + "</td>";
        tableHtml += "<td>" + usuariosRegistrados[ i ].contraseña + "</td>";
        tableHtml += "<td><button onclick='editarusuario(" + i + ")'>Editar</button> <button onclick='eliminarUsuario(" + i + ")'>Eliminar</button></td>";
        tableHtml += "</tr>";
    }
    tableBody.innerHTML = tableHtml;
}

// Función para editar un usuario
function editarusuario( indiceUsuario ) {
    document.getElementById( "nombre" ).value = usuariosRegistrados[ indiceUsuario ].nombre;
    document.getElementById( "email" ).value = usuariosRegistrados[ indiceUsuario ].email;
    document.getElementById( "contraseña" ).value = usuariosRegistrados[ indiceUsuario ].contraseña;
    document.getElementById( "botonRegistro" ).innerHTML = "Actualizar";
    document.getElementById( "indiceUsuario" ).value = indiceUsuario;
}


// Función para eliminar un usuario
function eliminarUsuario( indiceUsuario )  {
    usuariosRegistrados.splice( indiceUsuario, 1 );
    mostrarUsuarios();
}

function sendData(){
    console.log(usuariosRegistrados);
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: { valores: usuariosRegistrados},
        method: "POST",
        url: "/ventas/vender",
        beforesend: function(){
            alert("enviando");
        },
        success: function(resultado){
            alert('Venta Registrada Exitosamente!');
            console.log(resultado);
            window.location.href = "/ventas/venderes";
        },
        error: function(error){
            alert("Error");
        }
    });
}

// Obtener el formulario
const form = document.getElementById( "registroUsuario" );

// Agregar event listener para el submit del formulario
form.addEventListener( "submit", function ( event ) {
    // Evitar la acción predeterminada del formulario (recargar la página)
    event.preventDefault();

    // Llamar a la función agregarUsuario()
    agregarUsuario();
});