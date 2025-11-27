'use stric'

function encontrarPerdidos(...numeros){
    let resultados = [];
    let minimo = 0;
    let maximo = 0;

    if(numeros.length = 0){
        return [];
    }
    minimo = numeros[0];
    maximo = numeros[0];
    for (let i = 1; i < numeros.length; i++) {
        if(numeros[i]<minimo){
            minimo = numeros[i];
            if(numeros[i]>maximo){
                maximo = numeros[i];
            }
        }
        
    }
    for (let i = minimo; i < maximo; i++) {
        let encontrado = false;
        for(let j = maximo; j< numeros.length; j++){        
            if(numeros[j]===i){
                encontrado = true;
                break;
            }
            if(!encontrado){
                resultados[resultado.length] = i;
            }
        }
        return resultado;
    }
}
console.log(encontrarPerdidos(5));