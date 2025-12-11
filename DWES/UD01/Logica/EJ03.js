'use strict'

function dibujarRectangulo(altura, ancho) {
    let rectanguloAlto = new Array(altura);
    let rectanguloAncho = new Array(ancho);
    for (let i = 0; i < altura; i++) {
        let linea = '';
        for (let j = 0; j < ancho; j++) {
            if (i === 0 || i === ancho - 1 || j === 0 || j === altura - 1) {
                linea += '*';
            } else {
                linea += ' ';
            }

            if (j === ancho - 1) {
                rectanguloAlto[i] = linea;
            }
        }
        return rectanguloAlto;

    }

}