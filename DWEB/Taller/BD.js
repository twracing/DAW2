import datos from "./datos-taller.js";

export class BD {
    #vehiculos;
    #reparaciones;

    #siguienteVehiculoId;
    #siguienteReparacionId;

    constructor() {
        this.#vehiculos = Array.isArray(datos.vehiculos) ? JSON.parse(JSON.stringify(datos.vehiculos)) : [];
        this.#reparaciones = Array.isArray(datos.reparaciones) ? JSON.parse(JSON.stringify(datos.reparaciones)) : [];

        // calcular siguientes ids (si no hay elementos, tomar 1)
        const maxVeh = this.#vehiculos.length ? Math.max(...this.#vehiculos.map(v => v.vehiculoId)) : 0;
        const maxRep = this.#reparaciones.length ? Math.max(...this.#reparaciones.map(r => r.reparacionId)) : 0;

        this.#siguienteVehiculoId = maxVeh + 1;
        this.#siguienteReparacionId = maxRep + 1;
    }

    obtenerVehiculos() {
        return this.#vehiculos;
    }

    obtenerVehiculo(filtro, valor) {
        return this.#vehiculos.find(v => {
            if (filtro === "vehiculoId") return v.vehiculoId == valor;
            if (filtro === "matricula") return v.matricula == valor;
            if (filtro === "telefono") return v.propietario.telefono == valor;
        });
    }

    crearVehiculo(vehiculo) {
        vehiculo.vehiculoId = this.#siguienteVehiculoId++
        this.#vehiculos.push(vehiculo);
    }

    borrarVehiculo(vehiculoId) {
        this.#vehiculos = this.#vehiculos.filter(v => v.vehiculoId != vehiculoId);
        this.#reparaciones = this.#reparaciones.filter(r => r.vehiculoId != vehiculoId);
    }


    obtenerReparaciones(filtro = null, valor = null) {
        let r = [...this.#reparaciones];

        if (filtro === "fecha") {
            r = r.filter(rep => rep.fecha === valor);
        }
        if (filtro === "pagado") {
            r = r.filter(rep => rep.pagado === valor);
        }
        if (filtro === "terminado") {
            r = r.filter(rep => rep.terminado === valor);
        }
        if (filtro === "vehiculoId") {
            r = r.filter(rep => rep.vehiculoId == valor);
        }
        if (filtro === "presupuesto") {
            r = r.filter(rep => rep.presupuesto === valor);
        }

        return r.sort((a, b) => b.fecha.localeCompare(a.fecha));
    }

    obtenerReparacion(reparacionId) {
        return this.#reparaciones.find(r => r.reparacionId == reparacionId);
    }

    crearReparacion(vehiculoId, reparacion) {
        reparacion.reparacionId = this.#siguienteReparacionId++;
        reparacion.vehiculoId = vehiculoId;
        this.#reparaciones.push(reparacion);
    }

    borrarReparacion(reparacionId) {
        this.#reparaciones = this.#reparaciones.filter(r => r.reparacionId != reparacionId);
    }
    actualizarVehiculo(id, datosActualizados) {
        const i = this.#vehiculos.findIndex(v => v.vehiculoId == id);
        if (i >= 0) {
            this.#vehiculos[i] = {
                ...this.#vehiculos[i],
                ...datosActualizados,
                vehiculoId: id
            };
        }
    }

    actualizarReparacion(id, datosActualizados) {
        const i = this.#reparaciones.findIndex(r => r.reparacionId == id);
        if (i >= 0) {
            this.#reparaciones[i] = {
                ...this.#reparaciones[i],
                ...datosActualizados,
                reparacionId: id
            };
        }
    }

}