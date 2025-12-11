"use strict";
function acertarNumero() {
    let numeroSecreto = Math.floor(Math.random() * 100) + 1;
    let intentos = 5;
    let haGanado = false;
 
    for (let i = 1; i <= intentos; i++) {
        let entrada = prompt("Intento " + i + " de " + intentos + ". Introduce un número entre 1 y 100:");
        let numero = parseInt(entrada);
 
        if (isNaN(numero) || numero < 1 || numero > 100) {
            alert("Por favor, introduce un número válido entre 1 y 100.");
            i--; // No cuenta como intento
            continue;
        }
 
        if (numero === numeroSecreto) {
            alert("¡Has acertado! El número secreto era " + numeroSecreto + ".");
            haGanado = true;
            break;
        } else if (numero < numeroSecreto) {
            alert("El número secreto es mayor.");
        } else {
            alert("El número secreto es menor.");
        }
    }
 
    if (!haGanado) {
        alert("Has perdido. El número secreto era " + numeroSecreto + ".");
    }
}
 
// Código auxiliar para probar la aplicación
document.addEventListener("DOMContentLoaded", function () {
    acertarNumero();
});