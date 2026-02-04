/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Classes/Main.java to edit this template
 */
package devopsunidad3actividad3;

import service.BibliotecaService;
import model.Usuario;
import model.Libro;
import model.Reserva;

/**
 *
 * @author José Francisco Márquez
 */
public class DevOpsUnidad3Actividad3 {

    public static void main(String[] args) {

        int puntuacion = 0;
        int total = 7;

        BibliotecaService bibliotecaService = new BibliotecaService();

        /* 1. validarUsuario(Usuario usuario) */
        try {
            Usuario usuario = new Usuario("test@email.com", "Usuario Test");
            boolean valido = bibliotecaService.validarUsuario(usuario);
            System.out.println("✔ validarUsuario(): " + valido);
            puntuacion++;
        } catch (Exception e) {
            System.out.println("✘ validarUsuario() falló: " + e.getMessage());
        }

        /* 2. isDisponible() debe devolver 0 */
        try {
            Libro libro = new Libro("El Quijote", "isbn");
            boolean disponible = libro.isDisponible();
            System.out.println("✔ isDisponible(): " + disponible);
            if (disponible) {
                puntuacion++;
            }
        } catch (Exception e) {
            System.out.println("✘ isDisponible() falló: " + e.getMessage());
        }

        /* 3. Comprobación de que setDisponible NO existe (vía reflexión) */
        boolean exists = false;

        /* a) ¿Existe como público? */
        try {
            Libro.class.getMethod("setDisponible", boolean.class);
            exists = true; // Si no lanzó NoSuchMethodException, existe
        } catch (NoSuchMethodException e) {
            // No existe como público; probamos como no público
        }

        /* b) ¿Existe como no público (private/protected/package)? */
        if (!exists) {
            try {
                Libro.class.getDeclaredMethod("setDisponible", boolean.class);
                exists = true; // Existe pero no es público
            } catch (NoSuchMethodException e) {
                // Tampoco existe como no público
            }
        }

        /* Reporte */
        if (exists) {
            System.out.println("✘ setDisponible() NO debería existir");
        } else {
            System.out.println("✔ setDisponible() eliminado correctamente");
            puntuacion++;
        }

        /* 4. incrementarReservas() */
        try {
            Libro libro = new Libro("ISBN", "Titulo");
            libro.incrementarReservas();
            System.out.println("✔ incrementarReservas() ejecutado");
            puntuacion++;
        } catch (Exception e) {
            System.out.println("✘ incrementarReservas() falló: " + e.getMessage());
        }

        /* 5. toString() muestra reservas activas (int) */
        try {
            Libro libro = new Libro("ISBN", "Titulo");
            libro.incrementarReservas();
            System.out.println("✔ toString(): " + libro.toString());
            puntuacion++;
        } catch (Exception e) {
            System.out.println("✘ toString() falló: " + e.getMessage());
        }

        /* 6. Crear objeto Reserva (antes Prestamo) */
        try {
            Usuario usuario = new Usuario("test@email.com", "Usuario Test");
            Libro libro = new Libro("ISBN", "Titulo");
            Reserva reserva = new Reserva(usuario, libro);
            System.out.println("✔ Reserva creada correctamente");
            puntuacion++;
        } catch (Exception e) {
            System.out.println("✘ Error al crear Reserva (¿sigue siendo Prestamo?): " + e.getMessage());
        }

        /* 7. Usuario(String email, String nombre) */
        try {
            Usuario usuario = new Usuario("correo@test.com", "Nombre Test");
            System.out.println("✔ Usuario creado: " + usuario);
            puntuacion++;
        } catch (Exception e) {
            System.out.println("✘ Constructor Usuario(email, nombre) falló: " + e.getMessage());
        }

        System.out.println("\nPUNTUACIÓN FINAL: " + puntuacion + " / " + total);
    }
}
