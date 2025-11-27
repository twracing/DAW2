function expresionEquilibrada(expresion) {
    let pila = [];
    for (let i = 0; i < expresion.length; i++) {
        let c = expresion[i];
        if (c === "(" || c === "{" || c === "[") {
            pila.push(c);
        } else if (c === ")" || c === "}" || c === "]") {
            if (pila.length === 0) return false;
            let ultimo = pila.pop();
            if ((c === ")" && ultimo !== "(") ||
                (c === "}" && ultimo !== "{") ||
                (c === "]" && ultimo !== "[")) {
                return false;
            }
        }
    }
    return pila.length === 0;
}

