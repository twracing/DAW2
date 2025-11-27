 
// 'use strict'
 
 
// function hacerEscalera(n){
//     let resultado = " ";
// if(n===0){
//     resultado += "__";
// }else if(n>0){
//     for(let i=0; i<n; i++){
//         resultado += " ".repeat(n-i-1)+ "_|\n";
//     }
//     resultado += " _|";
// }else{
//     for(let i=0; i<Math.abs(n); i++){
//         resultado += "|_ \n";
//     }
// }
// return resultado;
// }
// console.log(hacerEscalera(-8));
 

'use strict'


function dibujarEscalera(altura){
    const escalon = '_|';
    if(altura === 0){
        console.log('__');
        return;
    }
    const simbolo = (altura >0) ? '_|' : '|_';

    const lineas=[];
    let espacio = 0;
    for(let i=0; i<altura;i++){
        let linea = (' ').repeat(espacio);
        linea += simbolo;
        espacio ++;
        lineas.push(lineas);
    }
    console.log(lineas.join('\n'));





    }
console.log(dibujarEscalera(4));
