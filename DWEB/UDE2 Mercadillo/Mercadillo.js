
const inventario = [];
inventario ["boligrafo"] = {
    cantidad: 4,
    precio: 1.5,
    categoria:"escolar"
}



function agregarProducto(nombre, cantidad, precio, categoria) {
   if (inventario[nombre]) {
      alert("El producto " + nombre + " ya existe");
      return;
   }
   inventario[nombre] = {
      cantidad: Number(cantidad),
      precio: Number(precio),
      categoria: (categoria)
   }
}
 

function eliminarProducto(nombre) {
   if (!inventario[nombre]) {
      alert("No existe ese producto");
      return;
   }
   delete inventario[nombre];
}

function buscarProducto(nombre) {
   return inventario[nombre] || null;
}
 

function actualizarInventario(nombre, cantidad) {
  if (!inventario[nombre]) {
            alert("El producto '" + nombre + "' no existe.");
            return;
        }
        inventario[nombre].cantidad += Number(cantidad);
 
        if (inventario[nombre].cantidad <= 0) {
            inventario[nombre].cantidad = 0;
            alert("¡Stock agotado! Se necesita reposición de '" + nombre + "'.");
        }
 
}
 

function ordenarProductosPorPrecio() {
 return Object.entries(inventario)
    .filter(([nombre, datos]) => typeof datos === "object")
    .sort((a, b) => a[1].precio - b[1].precio)
    .map(([nombre, datos]) => ({
        nombre,
        cantidad: datos.cantidad,
        precio: datos.precio,
        categoria: datos.categoria
    }));
    }
 

function imprimirInventario() {
   return Object.entries(inventario)
      .filter(([nombre, datos]) => typeof datos === "object")
      .map(([nombre, datos]) => ({
         nombre,
         categoria: datos.categoria,
         cantidad: datos.cantidad,
         precio: datos.precio,
         total: (datos.cantidad * datos.precio).toFixed(2)
      }));
}
 

function filtrarProductosPorCategoria(categoria) {
   return Object.entries(inventario)
      .filter(([nombre, datos]) => datos.categoria === categoria)
      .map(([nombre, datos]) => ({
         nombre,
         cantidad: datos.cantidad,
         precio: datos.precio
      }));
    }
