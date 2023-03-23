const usuariosRegistrados = [];

// Función para agregar usuario
function agregarUsuario() {
    const nombre = document.getElementById( "nombre" ).value;
    const contraseña = document.getElementById( "contraseña" ).value;
    const indiceUsuario = document.getElementById( "indiceUsuario" ).value;
    var nombreItem = "error";
    var precioItem = "error";
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        url: "/get-item-data?codigoDeBarras=" + nombre,
        type: "GET",
        dataType: "json",
        success: function(data) {
            nombreItem = data.NombreProducto;
            precioItem = data.PrecioProducto;
            if(data.Cantidad >= contraseña){ 
                if( indiceUsuario ){
                    // Actualizar un usuario existente
                    usuariosRegistrados[ indiceUsuario ].nombre = nombre;
                    usuariosRegistrados[ indiceUsuario ].contraseña = contraseña;
                    usuariosRegistrados[ indiceUsuario ].precioItem = precioItem * contraseña;
                    usuariosRegistrados[ indiceUsuario ].nombreItem = nombreItem;
                    document.getElementById( "botonRegistro" ).innerHTML = "Registrar";
                    limpiarRegistro();
                    mostrarUsuarios();
                } 
                else {
                    // Agregar un nuevo usuario
                    usuariosRegistrados.push( { nombre, contraseña, precioItem, nombreItem } );
                    limpiarRegistro();
                    mostrarUsuarios();
                }
            }
            else{
                alert('No hay suficiente cantidad del producto! En stock hay ' + data.Cantidad);
            }
        }
    });    
}

// Función para limpiar los campos del formulario
function limpiarRegistro() {
    document.getElementById( "nombre" ).value = "";
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
        tableHtml += "<td>" + usuariosRegistrados[ i ].contraseña + "</td>";
        tableHtml += "<td>" + usuariosRegistrados[ i ].precioItem + "</td>";
        tableHtml += "<td>" + usuariosRegistrados[ i ].nombreItem + "</td>";
        tableHtml += "<td><button onclick='editarusuario(" + i + ")'>Editar</button> <button onclick='eliminarUsuario(" + i + ")'>Eliminar</button></td>";
        tableHtml += "</tr>";
    }
    tableBody.innerHTML = tableHtml;
}

// Función para editar un usuario
function editarusuario( indiceUsuario ) {
    document.getElementById( "nombre" ).value = usuariosRegistrados[ indiceUsuario ].nombre;
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
    const metodo = document.getElementById( "metodo" ).value;
    const CorreoCliente = document.getElementById( "CorreoCliente" ).value;
    console.log(metodo + CorreoCliente);
    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
        data: { valores: usuariosRegistrados, metodo: metodo, correoCliente: CorreoCliente},
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

$(function() {
    $("#nombre").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: "/search",
                dataType: "json",
                data: {
                    query: request.term
                },
                success: function(data) {
                    response($.map(data, function(item) {
                        return {
                            label: item.CodigoDeBarras,
                            value: item.CodigoDeBarras
                        }
                    }));
                }
            });
        },
        minLength: 1
    });
});
