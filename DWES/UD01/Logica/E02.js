'use strict'
let maximo = 0.0, minimo = 0.0;
let suma =0;
let media;
let total=0;
let num;
do{
   num = parseInt(prompt('Introduce un numero'));
total++;
if(num==0){
  break;
}
if(num>maximo){
  maximo = num;
  suma+=num;
}
if(numero<minimo){
  minimo = num;
  suma+=num;
}
 
}while(true);
 
media=suma/total;
alert('Maximo:' + maximo+'\n'+ 'minimo')
