function calcularAspa(tamanno){
    if(tamanno <= 0 || tamanno % 2 === 0){
        return[];
    }
    let resultado = [];
    for(let i = 0; i<tamanno; ++i){
        let fila = []; resultado.push(fila);
        for(let j = 0; j<tamanno; ++j){
            if(i == j || i+j-1 == tamanno){
                fila.push('X');
            }else{
                fila[fila.length]= ' ';
            }
        }
    }
    return resultado;
}