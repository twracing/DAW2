console.log("Inicio");
function esperaActiva(segundos) {
  console.log(`Inicio de espera activa: ${new Date().toLocaleTimeString()}`);
  const start = Date.now();
  while (Date.now() - start < segundos * 1000) {
    // Espera activa
  }
  console.log(`Fin de espera activa: ${new Date().toLocaleTimeString()}`);
}
console.log("Programamos un mensaje para dentro de 2 segundos");
setTimeout(() => {
  console.log("Mensaje temporizado a los 2 segundos");
}, 2000);
console.log("Iniciamos un proceso largo");
esperaActiva(5);
console.log("Fin");
