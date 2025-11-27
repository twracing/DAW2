import { BD } from "./BD.js";
import { Vehiculo } from "./Vehiculo.js";
import { Propietario } from "./propietario.js";
import { Reparacion } from "./Reparacion.js";
import { Trabajo } from "./Trabajo.js";



export class GestionMecanica {
  #clienteBD;
  #contenedor;

  constructor() {
    this.#clienteBD = new BD();
    this.#contenedor = null;
  }

  iniciarApp(selector) {
    const el = document.querySelector(selector);
    if (!el) {
      alert("No se puede iniciar la aplicacion")
      return;
    }
    this.#contenedor = el;

    this.#contenedor.innerHTML = this.generaHTMLBase();

    this.mostrarInicio();

    this.activarEventosMenu();
  }
  generaHTMLBase() {
    return `
            <nav>
                <button data-vista="inicio">Inicio</button>
                <button data-vista="vehiculos">Listado vehículos</button>
                <button data-vista="no-terminadas">No terminadas</button>
                <button data-vista="no-pagadas">No pagadas</button>
                <button data-vista="presupuestos">Presupuestos</button>
            </nav>

            <section id="contenido"></section>
        `;
  }

  /* ---------------- VISTAS ---------------- */

  mostrarInicio() {
    const cont = document.querySelector("#contenido");
    cont.innerHTML = this.generarHTMLInicio();
    this.activarEventosInicio();
  }

  mostrarVehiculos() {
    const vehiculos = this.#clienteBD.obtenerVehiculos();
    const cont = document.querySelector("#contenido");
    cont.innerHTML = this.generarHTMLVehiculos(vehiculos);
    this.activarEventosListadoVehiculos();
  }

  mostrarVehiculo(vehiculoId = 0) {
    const v = vehiculoId ? this.#clienteBD.obtenerVehiculo("vehiculoId", vehiculoId) : null;
    const cont = document.querySelector("#contenido");
    cont.innerHTML = this.generarHTMLVehiculo(v);
    this.activarEventosFormularioVehiculo();
  }

  mostrarReparacionesVehiculo(vehiculoId) {
    // uso el filtro agregado en BD
    const reparaciones = this.#clienteBD.obtenerReparaciones("vehiculoId", vehiculoId);
    const cont = document.querySelector("#contenido");
    cont.innerHTML = this.generarHTMLReparacionesVehiculo(vehiculoId, reparaciones);
    this.activarEventosListadoReparacionesVehiculo(vehiculoId);
  }

  mostrarReparacion(reparacionId = 0, vehiculoId = 0) {
    const r = reparacionId ? this.#clienteBD.obtenerReparacion(reparacionId) : null;
    const cont = document.querySelector("#contenido");
    cont.innerHTML = this.generarHTMLReparacion(r, vehiculoId);
    this.activarEventosFormularioReparacion(r);
  }

  mostrarNoTerminadas() {
    const lista = this.#clienteBD.obtenerReparaciones("terminado", false);
    const cont = document.querySelector("#contenido");
    cont.innerHTML = this.generarHTMLReparaciones(lista);
    this.activarEventosListadoReparacionesGlobal();
  }

  mostrarNoPagadas() {
    const lista = this.#clienteBD.obtenerReparaciones("pagado", false);
    const cont = document.querySelector("#contenido");
    cont.innerHTML = this.generarHTMLReparaciones(lista);
    this.activarEventosListadoReparacionesGlobal();
  }

  mostrarPresupuestos() {
    const lista = this.#clienteBD.obtenerReparaciones("presupuesto", true);
    const cont = document.querySelector("#contenido");
    cont.innerHTML = this.generarHTMLReparaciones(lista);
    this.activarEventosListadoReparacionesGlobal();
  }

  /* ---------------- MENU ---------------- */

  activarEventosMenu() {
    document.querySelector("nav").addEventListener("click", e => {
      if (!e.target.dataset.vista) return;
      const v = e.target.dataset.vista;
      switch (v) {
        case "inicio": this.mostrarInicio(); break;
        case "vehiculos": this.mostrarVehiculos(); break;
        case "no-terminadas": this.mostrarNoTerminadas(); break;
        case "no-pagadas": this.mostrarNoPagadas(); break;
        case "presupuestos": this.mostrarPresupuestos(); break;
      }
    });
  }

  /* ---------------- GENERADORES HTML ---------------- */

  generarHTMLInicio() {
    return `
            <h2>Buscador de vehículos</h2>
            <form id="form-buscar">
                <input id="buscar" placeholder="Matrícula o teléfono">
                <button>Buscar</button>
            </form>
            <div id="resultado-busqueda"></div>
        `;
  }

  generarHTMLVehiculos(vehiculos = []) {
    const filas = vehiculos.map(v => `
            <li class="veh-fila" data-id="${v.vehiculoId}">
                <strong>${v.matricula}</strong> — ${v.marca} ${v.modelo} (${v.año}) — ${v.propietario?.telefono ?? ''}
                <div class="acciones">
                    <button data-action="ver" data-id="${v.vehiculoId}">Ver vehículo</button>
                    <button data-action="reparaciones" data-id="${v.vehiculoId}">Ver reparaciones</button>
                    <button data-action="borrar" data-id="${v.vehiculoId}">Borrar</button>
                </div>
            </li>
        `).join("");

    return `
            <section>
                <h2>Listado de vehículos</h2>
                <button id="nuevo-vehiculo">Crear nuevo vehículo</button>
                <ul id="listado-vehiculos">${filas}</ul>
            </section>
        `;
  }

  generarHTMLVehiculo(vehiculo = null) {
    const isNew = (vehiculo === null);

    const v = vehiculo || {
      vehiculoId: 0, matricula: "", marca: "", modelo: "", año: "", motor: "",
      propietario: { nombre: "", telefono: "", email: "" }
    };

    return `
            <section>
                <h2>${isNew ? "Crear vehículo" : "Editar vehículo"}</h2>
                <form id="form-vehiculo" data-id="${v.vehiculoId}">
                    <label>Matricula: <input name="matricula" value="${v.matricula || ""}" required></label>
                    <label>Marca: <input name="marca" value="${v.marca || ""}"></label>
                    <label>Modelo: <input name="modelo" value="${v.modelo || ""}"></label>
                    <label>Año: <input name="año" type="number" value="${v.año || ""}"></label>
                    <label>Motor: <input name="motor" value="${v.motor || ""}"></label>

                    <fieldset>
                        <legend>Propietario</legend>
                        <label>Nombre: <input name="prop_nombre" value="${v.propietario?.nombre || ""}"></label>
                        <label>Teléfono: <input name="prop_telefono" value="${v.propietario?.telefono || ""}"></label>
                        <label>Email: <input name="prop_email" value="${v.propietario?.email || ""}"></label>
                    </fieldset>

                    <button type="submit">${isNew ? "Crear" : "Guardar"}</button>
                </form>

                ${!isNew ? `<button id="ver-reparaciones" data-id="${v.vehiculoId}">Ver reparaciones</button>` : ""}
            </section>
        `;
  }

  generarHTMLReparacionesVehiculo(vehiculoId, reparaciones = []) {
    const veh = this.#clienteBD.obtenerVehiculo("vehiculoId", vehiculoId);

    const lista = reparaciones.map(r => `
            <li>
                <strong>${r.fecha}</strong> — ${r.descripcion} — ${this._calcularTotalReparacion(r)} €
                <div class="acciones">
                    <button data-action="ver" data-id="${r.reparacionId}">Ver</button>
                    <button data-action="borrar" data-id="${r.reparacionId}">Borrar</button>
                </div>
            </li>
        `).join("");

    return `
            <section>
                <h2>Reparaciones de ${veh?.matricula ?? "—"} — ${veh?.propietario?.telefono ?? ""}</h2>
                <button id="ver-vehiculo" data-id="${veh?.vehiculoId ?? ""}">Ver vehículo</button>
                <button id="nuevo-reparacion" data-id="${veh?.vehiculoId ?? ""}">Crear reparación</button>
                <ul id="lista-reparaciones">${lista}</ul>
            </section>
        `;
  }

  generarHTMLReparaciones(reparaciones = []) {
    const filas = reparaciones.map(r => `
            <li>
                <strong>${r.fecha}</strong> — ${r.descripcion} (Vehículo: ${r.vehiculoId}) — ${this._calcularTotalReparacion(r)} €
                <div class="acciones">
                    <button data-action="ver" data-id="${r.reparacionId}">Ver</button>
                    <button data-action="borrar" data-id="${r.reparacionId}">Borrar</button>
                </div>
            </li>
        `).join("");

    return `
            <section>
                <h2>Listado de reparaciones</h2>
                <ul id="listado-reparaciones">${filas}</ul>
            </section>
        `;
  }

  generarHTMLReparacion(reparacion = null, vehiculoId = 0) {
    const isNew = (reparacion === null);
    const r = reparacion || {
      reparacionId: 0, vehiculoId, descripcion: "", fecha: "", kilometros: 0,
      presupuesto: false, aprobada: false, pagado: false, terminado: false, trabajos: []
    };

    const trabajosHtml = (r.trabajos || []).map((t, i) => `
            <li data-index="${i}">
                ${t.concepto} — ${t.cantidad} x ${t.precioUnitario} = ${t.totalTrabajo ?? (t.precioUnitario * t.cantidad)} €
                <button data-action="borrar-trabajo" data-index="${i}">Borrar</button>
            </li>
        `).join("");

    return `
            <section>
                <h2>${isNew ? "Crear reparación" : "Editar reparación"}</h2>
                <form id="form-reparacion" data-id="${r.reparacionId}" data-veh="${r.vehiculoId}">
                    <label>Fecha: <input name="fecha" type="date" value="${r.fecha || ""}"></label>
                    <label>Descripción: <input name="descripcion" value="${r.descripcion || ""}"></label>
                    <label>Kilómetros: <input name="kilometros" type="number" value="${r.kilometros || 0}"></label>

                    <label>Presupuesto: <input name="presupuesto" type="checkbox" ${r.presupuesto ? "checked" : ""}></label>
                    <label>Aprobada: <input name="aprobada" type="checkbox" ${r.aprobada ? "checked" : ""}></label>
                    <label>Pagado: <input name="pagado" type="checkbox" ${r.pagado ? "checked" : ""}></label>
                    <label>Terminado: <input name="terminado" type="checkbox" ${r.terminado ? "checked" : ""}></label>

                    <fieldset>
                        <legend>Añadir trabajo</legend>
                        <input name="trab_concepto" placeholder="Concepto">
                        <input name="trab_precio" placeholder="Precio" type="number" step="0.01">
                        <input name="trab_cantidad" placeholder="Cantidad" type="number" value="1">
                        <button id="añadir-trabajo" type="button">Añadir trabajo</button>
                    </fieldset>

                    <ul id="lista-trabajos">${trabajosHtml}</ul>

                    <div>
                        <strong>Total reparación:</strong> <span id="total-reparacion">${this._calcularTotalReparacion(r)}</span> €
                    </div>

                    <button type="submit">${isNew ? "Crear reparación" : "Guardar"}</button>
                </form>
            </section>
        `;
  }

  /* ---------------- UTIL ---------------- */

  _calcularTotalReparacion(rep) {
    if (!rep || !Array.isArray(rep.trabajos)) return 0;
    return rep.trabajos.reduce((s, t) => s + Number(t.totalTrabajo ?? (t.precioUnitario * t.cantidad)), 0);
  }

  /* ---------------- ACTIVADORES/CONTROLADORES ---------------- */

  // INICIO: buscador
  activarEventosInicio() {
    const form = document.querySelector("#form-buscar");
    form.addEventListener("submit", e => {
      e.preventDefault();
      const val = document.querySelector("#buscar").value.trim();
      if (!val) {
        document.querySelector("#resultado-busqueda").innerHTML = "<p>Introduce matrícula o teléfono.</p>";
        return;
      }
      // buscar por matricula o teléfono
      const byMat = this.#clienteBD.obtenerVehiculo("matricula", val);
      const byTel = this.#clienteBD.obtenerVehiculo("telefono", val);
      const results = [];
      if (byMat) results.push(byMat);
      if (byTel && !results.find(r => r.vehiculoId == byTel.vehiculoId)) results.push(byTel);

      if (!results.length) {
        document.querySelector("#resultado-busqueda").innerHTML = "<p>No hay resultados.</p>";
      } else {
        document.querySelector("#resultado-busqueda").innerHTML = this.generarHTMLVehiculos(results);
        this.activarEventosListadoVehiculos();
      }
    });
  }

  // LISTADO VEHÍCULOS: ver, reparaciones, borrar, nuevo
  activarEventosListadoVehiculos() {
    // Nuevo vehículo
    const btnNuevo = document.querySelector("#nuevo-vehiculo");
    if (btnNuevo) btnNuevo.addEventListener("click", () => this.mostrarVehiculo(0));

    // Delegación en listado
    const lista = document.querySelector("#listado-vehiculos");
    if (!lista) return;
    lista.addEventListener("click", e => {
      const action = e.target.dataset.action;
      const id = e.target.dataset.id;
      if (!action || !id) return;

      if (action === "ver") {
        this.mostrarVehiculo(Number(id));
      } else if (action === "reparaciones") {
        this.mostrarReparacionesVehiculo(Number(id));
      } else if (action === "borrar") {
        if (confirm("¿Borrar vehículo? Se borrarán también sus reparaciones.")) {
          this.#clienteBD.borrarVehiculo(Number(id));
          this.mostrarVehiculos();
        }
      }
    });
  }

  // FORMULARIO VEHÍCULO (crear / editar)
  activarEventosFormularioVehiculo() {
    const form = document.querySelector("#form-vehiculo");
    if (!form) return;

    form.addEventListener("submit", e => {
      e.preventDefault();
      const id = Number(form.dataset.id || 0);
      const fd = new FormData(form);

      const veh = {
        // vehiculoId will be assigned in BD if new
        matricula: fd.get("matricula"),
        marca: fd.get("marca"),
        modelo: fd.get("modelo"),
        año: fd.get("año"),
        motor: fd.get("motor"),
        propietario: {
          nombre: fd.get("prop_nombre"),
          telefono: fd.get("prop_telefono"),
          email: fd.get("prop_email")
        }
      };

      if (id === 0) {
        this.#clienteBD.crearVehiculo(veh);
        this.mostrarVehiculos();
      } else {
        // actualización simple via BD method added
        this.#clienteBD.actualizarVehiculo(id, { ...veh });
        this.mostrarVehiculos();
      }
    });

    // si estamos editando, el botón ver-reparaciones
    const btnVerReps = document.querySelector("#ver-reparaciones");
    if (btnVerReps) btnVerReps.addEventListener("click", e => {
      const id = Number(e.target.dataset.id);
      this.mostrarReparacionesVehiculo(id);
    });
  }

  // LISTADO REPARACIONES por vehículo
  activarEventosListadoReparacionesVehiculo(vehiculoId) {
    const btnVerVeh = document.querySelector("#ver-vehiculo");
    if (btnVerVeh) btnVerVeh.addEventListener("click", e => {
      const id = Number(e.target.dataset.id);
      this.mostrarVehiculo(id);
    });

    const btnNuevo = document.querySelector("#nuevo-reparacion");
    if (btnNuevo) btnNuevo.addEventListener("click", e => {
      const id = Number(e.target.dataset.id);
      this.mostrarReparacion(0, id);
    });

    const lista = document.querySelector("#lista-reparaciones");
    if (!lista) return;
    lista.addEventListener("click", e => {
      const action = e.target.dataset.action;
      const id = e.target.dataset.id;
      if (!action || !id) return;
      if (action === "ver") {
        this.mostrarReparacion(Number(id));
      } else if (action === "borrar") {
        if (confirm("¿Borrar reparación?")) {
          this.#clienteBD.borrarReparacion(Number(id));
          this.mostrarReparacionesVehiculo(vehiculoId);
        }
      }
    });
  }

  // LISTADO REPARACIONES general (no terminadas / no pagadas / presupuestos)
  activarEventosListadoReparacionesGlobal() {
    const lista = document.querySelector("#listado-reparaciones");
    if (!lista) return;
    lista.addEventListener("click", e => {
      const action = e.target.dataset.action;
      const id = e.target.dataset.id;
      if (!action || !id) return;
      if (action === "ver") {
        this.mostrarReparacion(Number(id));
      } else if (action === "borrar") {
        if (confirm("¿Borrar reparación?")) {
          this.#clienteBD.borrarReparacion(Number(id));
          // recargar la vista actual: intento deducir según encabezado
          const textoH2 = document.querySelector("#contenido h2")?.innerText || "";
          if (textoH2.includes("No terminadas")) this.mostrarNoTerminadas();
          else if (textoH2.includes("No pagadas")) this.mostrarNoPagadas();
          else if (textoH2.includes("Presupuestos")) this.mostrarPresupuestos();
          else this.mostrarNoTerminadas(); // fallback
        }
      }
    });
  }

  // FORMULARIO REPARACIÓN (crear / editar) + gestión trabajos
  activarEventosFormularioReparacion(reparacion = null) {
    const form = document.querySelector("#form-reparacion");
    if (!form) return;

    // manejar array de trabajos temporalmente usando dataset en el UL
    const ulTrabajos = document.querySelector("#lista-trabajos");
    // inicializamos trabajos desde la reparacion si existe
    let trabajos = reparacion ? (reparacion.trabajos || []).map(t => ({ ...t })) : [];

    const actualizarListaTrabajos = () => {
      ulTrabajos.innerHTML = trabajos.map((t, i) => `
                <li data-index="${i}">
                    ${t.concepto} — ${t.cantidad} x ${t.precioUnitario} = ${t.totalTrabajo} €
                    <button data-action="borrar-trabajo" data-index="${i}">Borrar</button>
                </li>
            `).join("");
      const total = trabajos.reduce((s, t) => s + Number(t.totalTrabajo), 0);
      const spanTotal = document.querySelector("#total-reparacion");
      if (spanTotal) spanTotal.innerText = total;
    };

    actualizarListaTrabajos();

    // Añadir trabajo
    const btnAnadir = document.querySelector("#añadir-trabajo");
    if (btnAnadir) {
      btnAnadir.addEventListener("click", () => {
        const concepto = form.querySelector("[name=trab_concepto]").value.trim();
        const precio = parseFloat(form.querySelector("[name=trab_precio]").value) || 0;
        const cantidad = parseInt(form.querySelector("[name=trab_cantidad]").value) || 1;
        if (!concepto) {
          alert("Introduce un concepto para el trabajo.");
          return;
        }
        const t = {
          concepto,
          precioUnitario: precio,
          cantidad,
          totalTrabajo: precio * cantidad
        };
        trabajos.push(t);
        // limpiar inputs
        form.querySelector("[name=trab_concepto]").value = "";
        form.querySelector("[name=trab_precio]").value = "";
        form.querySelector("[name=trab_cantidad]").value = "1";
        actualizarListaTrabajos();
      });
    }

    // Borrar trabajo (delegación)
    ulTrabajos.addEventListener("click", e => {
      if (e.target.dataset.action === "borrar-trabajo") {
        const idx = Number(e.target.dataset.index);
        trabajos.splice(idx, 1);
        actualizarListaTrabajos();
      }
    });

    // Submit reparación (crear o guardar)
    form.addEventListener("submit", e => {
      e.preventDefault();
      const id = Number(form.dataset.id || 0);
      const vehId = Number(form.dataset.veh || 0);
      const fd = new FormData(form);

      const rep = {
        descripcion: fd.get("descripcion") || "",
        fecha: fd.get("fecha") || new Date().toISOString().slice(0, 10),
        kilometros: Number(fd.get("kilometros") || 0),
        presupuesto: fd.get("presupuesto") === "on",
        aprobada: fd.get("aprobada") === "on",
        pagado: fd.get("pagado") === "on",
        terminado: fd.get("terminado") === "on",
        trabajos: trabajos.map(t => ({
          concepto: t.concepto,
          precioUnitario: Number(t.precioUnitario),
          cantidad: Number(t.cantidad),
          totalTrabajo: Number(t.totalTrabajo)
        }))
      };

      if (id === 0) {
        // crear
        this.#clienteBD.crearReparacion(vehId, rep);
        this.mostrarReparacionesVehiculo(vehId);
      } else {
        // actualizar via BD helper
        rep.vehiculoId = vehId;
        this.#clienteBD.actualizarReparacion(id, { ...rep, reparacionId: id });
        // volver al listado del vehículo
        this.mostrarReparacion(id); // o mostrarReparacionesVehiculo(vehId);
      }
    });
  }
}

