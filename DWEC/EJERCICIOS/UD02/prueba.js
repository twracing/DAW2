const $vehiculos = (function () {
 
  let data = [

    { vehiculoId: 1, matricula: "1234ABC", marca: "Seat", modelo: "Ibiza", kilometros: 72000, precio: 8500 },

    { vehiculoId: 2, matricula: "5678XYZ", marca: "Ford", modelo: "Focus", kilometros: 98000, precio: 9100 },

    { vehiculoId: 3, matricula: "1111BBB", marca: "Seat", modelo: "León", kilometros: 35000, precio: 14500 },

    { vehiculoId: 4, matricula: "2222CCC", marca: "Toyota", modelo: "Yaris", kilometros: 41000, precio: 12800 },

    { vehiculoId: 5, matricula: "3333DDD", marca: "Ford", modelo: "Fiesta", kilometros: 64000, precio: 7800 },

    { vehiculoId: 6, matricula: "4444EEE", marca: "Peugeot", modelo: "308", kilometros: 55000, precio: 10200 },

    { vehiculoId: 7, matricula: "5555FFF", marca: "Toyota", modelo: "Corolla", kilometros: 83000, precio: 11700 },

    { vehiculoId: 8, matricula: "6666GGG", marca: "Seat", modelo: "Ateca", kilometros: 29000, precio: 18900 },

    { vehiculoId: 9, matricula: "7777HHH", marca: "Ford", modelo: "Puma", kilometros: 46000, precio: 13200 },

    { vehiculoId: 10, matricula: "8888JJJ", marca: "Peugeot", modelo: "208", kilometros: 87000, precio: 9400 }

  ];
 
  // ---------- LISTAR ----------

  function listar() {

    for (let i = 0; i < data.length; i++) {

      console.log(data[i].vehiculoId + " - " + data[i].matricula + " - " + data[i].marca);

    }

  }
 
  // ---------- BUSCAR POR MATRICULA ----------

  function buscar(matricula) {

    for (let i = 0; i < data.length; i++) {

      if (data[i].matricula === matricula) return data[i];

    }

    return null;

  }
 
  // ---------- FILTRAR POR MARCA (sin filter) ----------

  function filtrarMarca(marca) {

    let resultado = [];

    for (let i = 0; i < data.length; i++) {

      if (data[i].marca === marca) {

        resultado[resultado.length] = data[i]; 

      }

    }

    return resultado;

  }
 
  // ---------- VEHÍCULO MÁS BARATO ----------

  function masBarato() {

    let min = data[0];

    for (let i = 1; i < data.length; i++) {

      if (data[i].precio < min.precio) min = data[i];

    }

    return min;

  }
 
  // ---------- MEDIA DE PRECIOS ----------

  function mediaPrecio() {

    let suma = 0;

    for (let i = 0; i < data.length; i++) suma += data[i].precio;

    return (suma / data.length).toFixed(2);

  }
 
  // ---------- ORDENAR POR KMS (Bubble Sort manual) ----------

  function ordenarKms() {

    let copia = JSON.parse(JSON.stringify(data));

    for (let i = 0; i < copia.length - 1; i++) {

      for (let j = 0; j < copia.length - 1; j++) {

        if (copia[j].kilometros > copia[j+1].kilometros) {

          let tmp = copia[j];

          copia[j] = copia[j+1];

          copia[j+1] = tmp;

        }

      }

    }

    return copia;

  }
 
  // ---------- EXPORTAR JSON ----------

  function exportar() {

    return JSON.stringify(data);

  }
 
  // ---------- IMPORTAR JSON con validación ----------

  function importar(cadena) {

    try {

      let arr = JSON.parse(cadena);

      if (!Array.isArray(arr)) return alert("No es un array JSON");

      data = arr;

      alert("Datos cargados");

    } catch (e) {

      alert("JSON inválido");

    }

  }
 
  return { listar, buscar, filtrarMarca, masBarato, mediaPrecio, ordenarKms, exportar, importar };
 
})();

 
function menu() {

  while (true) {

    let op = prompt(

      "1. Listar\n2. Buscar matricula\n3. Filtrar por marca\n4. Más barato\n5. Media precio\n6. Ordenar por km\n7. Exportar JSON\n8. Importar JSON\n0. Salir"

    );
 
    if (op === "1") $vehiculos.listar();

    else if (op === "2") console.log($vehiculos.buscar(prompt("Matrícula:")));

    else if (op === "3") console.log($vehiculos.filtrarMarca(prompt("Marca:")));

    else if (op === "4") console.log($vehiculos.masBarato());

    else if (op === "5") console.log("Media: " + $vehiculos.mediaPrecio());

    else if (op === "6") console.log($vehiculos.ordenarKms());

    else if (op === "7") alert($vehiculos.exportar());

    else if (op === "8") $vehiculos.importar(prompt("Pegue JSON:"));

    else if (op === "0") break;

    else alert("Opción no válida");

  }

}
 
menu();

 
const $taller = (function (){
  let data = [

    {
      id: 1,
      nombre: "afga",
    },
    {
      id: 2,
      nombre: "afga",
    },
  ];
})