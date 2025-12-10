/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 */

package com.mycompany.proyecto2;

import java.util.ArrayList;
import java.util.Scanner;

/**
 *
 * @author usuario
 */
public class Proyecto2 {

    public static void main(String[] args) {
        ArrayList<String> futbolistas = new ArrayList<>();
        futbolistas.add("Lionel Messi");
        futbolistas.add("Cristiano Ronaldo");
        futbolistas.add("Kylian Mbappé");
        futbolistas.add("Erling Haaland");
        futbolistas.add("Kevin De Bruyne");

        Scanner sc = new Scanner(System.in);
        String opcion;

        do {
            System.out.println("\n1) Listar futbolistas\n2) Añadir futbolista\n3) Borrar futbolista\n0) Salir");
            System.out.print("Opción: ");
            opcion = sc.nextLine();

            switch (opcion) {
                case "1":
                    System.out.println("Listado:");
                    for (String f : futbolistas) {
                        System.out.println("- " + f);
                    }
                    break;
                case "2":
                    System.out.print("Nombre a añadir: ");
                    String nuevo = sc.nextLine();
                    futbolistas.add(nuevo);
                    break;
                case "3":
                    System.out.print("Nombre a borrar: ");
                    String borrar = sc.nextLine();
                    futbolistas.remove(borrar);
                    break;
                case "0":
                    System.out.println("Adiós!");
                    break;
                default:
                    System.out.println("Opción inválida.");
            }
        } while (!opcion.equals("0"));
    }
}