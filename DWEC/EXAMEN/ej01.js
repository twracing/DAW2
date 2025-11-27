function inicializarJuego(){
    let intentos = 3;
    let ganado = false;
    let secreto = Math.floor(Math.random()*10)+1;
    return function(numero){
        if(ganado==true){
            return 'Ya ha ganado';
        }
        if(intentos ==0){
        return 'Quemaste intentos';
    }
    if(isNaN(numero)==true){
        return 'Numeros'
    }
    --intentos;
    if(numero==secreto){
        ganado = true; return 'Has ganado'
    }
    if(numero<secreto){
        return 'por debajo';
    }
    return 'por arriba';
    }

    let probarNumero = inicializarJuego();
    probarNumero(7);
    
}