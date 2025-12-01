<script>
const DOMInspector = (function() {
  function recorrerNodo(nodo) {
    return {
      etiqueta: nodo.tagName.toLowerCase(),
      texto: nodo.textContent.trim(),
      tieneId: !!nodo.id,
      listClass: Array.from(nodo.classList),
      listData: { ...nodo.dataset },
      listHijos: Array.from(nodo.children).map(recorrerNodo)
    };
  }

  function obtenerEstructuraJSON() {
    return recorrerNodo(document.body);
  }

  function imprimirEstructura(selector) {
    const nodo = document.querySelector(selector);
    if (!nodo) {
      console.log("Nodo no encontrado para el selector:", selector);
      return;
    }

    const camino = [];
    let actual = nodo;

    while (actual) {
      const etiqueta = actual.tagName ? actual.tagName.toLowerCase() : "document";
      const id = actual.id || "noid";
      const clases = actual.classList && actual.classList.length > 0
        ? Array.from(actual.classList).join(",")
        : "noclass";
      const texto = (actual.textContent && actual.textContent.trim()) || "notext";

      camino.unshift(`${etiqueta}-${id}-${clases}-${texto}`);
      actual = actual.parentNode;
    }

    console.log(camino.join(" -> "));
  }

  return {
    obtenerEstructuraJSON,
    imprimirEstructura
  };
})();
</script>
