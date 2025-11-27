const morse = {
    "A": ".-", "B": "-...", "C": "-.-.", "D": "-..", "E": ".",
    "F": "..-.", "G": "--.", "H": "....", "I": "..", "J": ".---",
    "K": "-.-", "L": ".-..", "M": "--", "N": "-.", "O": "---",
    "P": ".--.", "Q": "--.-", "R": ".-.", "S": "...", "T": "-",
    "U": "..-", "V": "...-", "W": ".--", "X": "-..-", "Y": "-.--",
    "Z": "--..",
    "1": ".----", "2": "..---", "3": "...--", "4": "....-", "5": ".....",
    "6": "-....", "7": "--...", "8": "---..", "9": "----.", "0": "-----"
};

function morseCode(texto) {
    let esMorse = texto.includes(".") || texto.includes("-");
    let resultado = "";

    if (esMorse) {
        // Morse a texto
        let palabras = texto.split("  "); // dos espacios = palabra
        for (let i = 0; i < palabras.length; i++) {
            let letras = palabras[i].split(" ");
            for (let j = 0; j < letras.length; j++) {
                for (let clave in morse) {
                    if (morse[clave] === letras[j]) {
                        resultado += clave;
                    }
                }
            }
            resultado += " ";
        }
    } else {
        // Texto a morse
        texto = texto.toUpperCase();
        for (let i = 0; i < texto.length; i++) {
            if (texto[i] === " ") {
                resultado += "  ";
            } else {
                resultado += morse[texto[i]] + " ";
            }
        }
    }
    return resultado.trim();
}

