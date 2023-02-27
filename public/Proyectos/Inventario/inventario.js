const inventario = [
  { id: 1, nombre: "Producto 1", referencia: "REF1", stock: 5, precio: 10.000 },
  { id: 2, nombre: "Producto 2", referencia: "REF2", stock: 10, precio: 7.800 },
  { id: 3, nombre: "Producto 3", referencia: "REF3", stock: 2, precio: 1500 },
  { id: 4, nombre: "Producto 4", referencia: "REF4", stock: 8, precio: 2000 },
  { id: 5, nombre: "Producto 5", referencia: "REF5", stock: 15, precio: 5.500 },
];

const tablaBody = document.querySelector("#tabla-body");

for ( let producto of inventario ) {
  const fila = document.createElement( "tr" );
  fila.innerHTML = `
      <td>${producto.id}</td>
      <td>${producto.nombre}</td>
      <td>${producto.referencia}</td>
      <td>${producto.stock}</td>
      <td>$${producto.precio}</td>
  `;
  tablaBody.appendChild( fila );
}