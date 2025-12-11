'use strict'



function calcularFactorial(n) {
    if (n < 0) {
        return "El factorial no está definido para números negativos.";
    }
    if (n === 0 || n === 1) {
        return `${n}=1`;
    }

    let resultado = 1;
    let desarrollo = "";

    for (let i = n; i >= 1; i--) {
        resultado *= i;
        desarrollo += i;
        if (i > 1) {
            desarrollo += "x";
        }
    }

    return desarrollo + "=" + resultado;
}

let continuar = true;

while (continuar) {
    let entrada = prompt("Introduce un número para calcular su factorial:");
    let numero = parseInt(entrada);

    if (isNaN(numero)) {
        alert("Por favor, introduce un número válido.");
    } else {
        alert(calcularFactorial(numero));
    }

    let respuesta = prompt("¿Quieres calcular otro factorial? (s/n):");
    if (respuesta.toLowerCase() !== "s") {
        continuar = false;
    }
}

alert("¡Gracias por usar el programa!");
