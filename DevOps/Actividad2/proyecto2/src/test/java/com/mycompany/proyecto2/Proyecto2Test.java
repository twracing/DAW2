package com.mycompany.proyecto2;

import org.junit.Test;
import static org.junit.Assert.*;
import java.util.ArrayList;

public class Proyecto2Test {

    @Test
    public void listaInicialContieneFutbolistas() {
        ArrayList<String> futbolistas = new ArrayList<>();
        futbolistas.add("Lionel Messi");
        futbolistas.add("Cristiano Ronaldo");
        futbolistas.add("Kylian Mbappé");
        futbolistas.add("Erling Haaland");
        futbolistas.add("Kevin De Bruyne");

        assertEquals(5, futbolistas.size());
        assertTrue(futbolistas.contains("Lionel Messi"));
        assertTrue(futbolistas.contains("Cristiano Ronaldo"));
    }

    @Test
    public void sePuedeAgregarFutbolista() {
        ArrayList<String> futbolistas = new ArrayList<>();
        futbolistas.add("Lionel Messi");

        futbolistas.add("Neymar Jr");
        assertTrue(futbolistas.contains("Neymar Jr"));
        assertEquals(2, futbolistas.size());
    }

    @Test
    public void sePuedeBorrarFutbolista() {
        ArrayList<String> futbolistas = new ArrayList<>();
        futbolistas.add("Lionel Messi");
        futbolistas.add("Cristiano Ronaldo");

        futbolistas.remove("Cristiano Ronaldo");
        assertFalse(futbolistas.contains("Cristiano Ronaldo"));
        assertEquals(1, futbolistas.size());
    }
}
