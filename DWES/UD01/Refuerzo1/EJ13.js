function zelda(h){
    let resultado = [];
    let comienzo = '';
    for (let i = 0; i <= 3; i++) {
    comienzo += ' ';
    }
    let linea= '';
    for(let i=0; i<=h; i++){
       let linea= ''.concat(comienzo);
        for(let j=0; j<=h; j++){
            linea += '';
            }
            for(let k=0; i<2*h-1; k++){
                 linea += '';
            }
            resultado.push(lineal);
        }
    }


zelda(3);




















































// function logoZelda(n) {
//   const base = 2 * n - 1; // ancho máximo de un triángulo
//   let resultado = "";

//   // Triángulo superior
//   for (let i = 1; i <= n; i++) {
//     const espacios = " ".repeat(base - i);
//     const estrellas = "*".repeat(2 * i - 1);
//     resultado += espacios + estrellas + "\n";
//   }

//   // Dos triángulos inferiores
//   for (let i = 1; i <= n; i++) {
//     const espaciosIzq = " ".repeat(base - n - i + 1);
//     const estrellas = "*".repeat(2 * i - 1);
//     const espacioCentro = " ".repeat(2 * (n - i) + 1);
//     resultado += espaciosIzq + estrellas + espacioCentro + estrellas + "\n";
//   }

//   console.log(resultado);
// }

// // Ejemplo:
// logoZelda(3);
