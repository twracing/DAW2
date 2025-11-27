function juegoMates() {
  let operador = "";
  let resultado = 0;
  let pregAcertadas = [];
  let pregFalladas = [];
  for (let i = 0; i < 4; i++) {
    let aleatorio1 = Math.floor(Math.random() * 10) + 1;
    let aleatorio2 = Math.floor(Math.random() * 10) + 1;
    let aleOperador = Math.floor(Math.random() * 4) + 1;

    switch (aleOperador) {
      case 1:
        operador = "+";
        resultado = aleatorio1 + aleatorio2;
        break;
      case 2:
        operador = "-";
        resultado = aleatorio1 - aleatorio2;
        break;
      case 3:
        operador = "*";
        resultado = aleatorio1 * aleatorio2;
        break;
      case 4:
        operador = "/";
        resultado = aleatorio1 * aleatorio2;
        break;
      default:
        operador = "+";
        resultado = aleatorio1 + aleatorio2;
    }
    let pregunta = `la operacion es la siguiente: ${aleatorio1}${operador}${aleatorio2}`;
    alert(pregunta);

    let tryJugador = parseInt(prompt("Resultado?"));
    if (tryJugador === resultado) {
      pregAcertadas = [...pregAcertadas, pregunta];
    }
    if (tryJugador !== resultado) {
      pregFalladas = [...pregFalladas, pregunta];
    }
  }
  console.log(pregAcertadas);
  console.log(pregFalladas);
}

function seguirJugando(){
  let jugar=true
  do{
    prompt('1-Seguir Jugando ')
  }while(seguir);
  juegoMates();
}