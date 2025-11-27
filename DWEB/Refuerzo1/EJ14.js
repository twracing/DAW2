// 'use strict'
// const cesar = (function(){
// let alfabeto = "ABCD...Z";
// function descifrar(texto, clave){
//     let resultado = "";

//     for(let i = 0; i<texto.length; i++){
//         let c = texto[i];
//         let Pos = -1;
//         for(let j=0; alfabeto.length; j++){
//             if(c === alfabeto[j]) pos= j;
//         }
//         if(pos === -1){
//             resultado += "c";
//         }else{
//             resultado += alfabeto[(pos+clave)%26]
//         }
        
//     }
//     return resultado;

//     function cifrar(texto, clave){
//         descifrar(texto, 26 - clave%)
//     }
//     return{dscifrar,
//             cifrar
//     }
//     }}();

// )

(function () {
    const alfabeto = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
 
    function cifrarTexto(texto, clave) {
        texto = texto.toUpperCase();
        let resultado = "";
        for (let i = 0; i < texto.length; i++) {
            let letra = texto[i];
            let index = alfabeto.indexOf(letra);
            if (index !== -1) {
                let nuevaPos = (index + clave) % 26;
                resultado += alfabeto[nuevaPos];
            } else {
                resultado += letra; // deja espacios y signos igual
            }
        }
        return resultado;
    }
 
    function descifrarTexto(texto, clave) {
        texto = texto.toUpperCase();
        let resultado = "";
        for (let i = 0; i < texto.length; i++) {
            let letra = texto[i];
            let index = alfabeto.indexOf(letra);
            if (index !== -1) {
                let nuevaPos = (index - clave + 26) % 26;
                resultado += alfabeto[nuevaPos];
            } else {
                resultado += letra;
            }
        }
        return resultado;
    }
 
    // Ejemplo de uso
    let textoPlano = "Hola Mundo";
    let clave = 3;
 
    let cifrado = cifrarTexto(textoPlano, clave);
    console.log("Texto cifrado:", cifrado);
 
    let descifrado = descifrarTexto(cifrado, clave);
    console.log("Texto descifrado:", descifrado);
})();