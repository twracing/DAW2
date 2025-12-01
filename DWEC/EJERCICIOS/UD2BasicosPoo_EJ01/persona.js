const personaLiteral = {
    nombre: "Ana",
    nacimiento: new Date(1995, 3, 10),
    hobbies: ["leer", "viajar", "pintar"],

    get edad() {
        const hoy = new Date();
        let edad = hoy.getFullYear() - this.nacimiento.getFullYear();
        const m = hoy.getMonth() - this.nacimiento.getMonth();
        if (m < 0 || (m === 0 && hoy.getDate() < this.nacimiento.getDate())) {
            edad--;
        }
        return edad;
    },
    saludar() {
        return `Hola, me llamo ${this.nombre} y me gusta ${this.hobbies.join(", ")}`;
    }
};

console.log(personaLiteral.saludar());
console.log("Edad:", personaLiteral.edad);

function PersonaFn(nombre, nacimiento, hobbies){
    this.nombre = nombre;
    this.nacimiento = nacimiento;
    this.hobbies = hobbies;


    Object.definePropperty(this, "edad", {
        get: function(){
            const hoy = new Date();
            let edad = hoy.getFullYear() - this.nacimiento.getFullYear();
            const m = hoy.getMonth() - this.nacimiento.getMonth();
            if(m < 0 || (m === 0 && hoy.getDate() < this.nacimientogetDate())){
                edad --;
            }
            return edad;
        }
    });
}
PersonaFn.prototype.saludar = function(){
    return `Hola, me llamo ${this.nombre} y me gusta ${this.hobbies.join(", ")}`;
}

const persona2 = new PersonaFn("Luis", new Date(1990, 11, 25), ["correr", "música"]);

console.log(persona2.saludar());
console.log("Edad", persona2.edad);