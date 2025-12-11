<?php
/**
 * Clase Monedero
 * - Atributo privado: dinero (float)
 * - Atributo estático: numero_monederos (int)
 * - Constructor incrementa el contador
 * - Destructor decrementa el contador
 * - Métodos: meter($cantidad), sacar($cantidad), consultar()
 */
class Monedero {
    // Dinero disponible en este monedero (privado)
    private $dinero = 0.0;

    // Contador estático con el número de monederos existentes
    private static $numero_monederos = 0;

    /**
     * Constructor: inicializa con una cantidad (por defecto 0)
     * @param float|int $cantidad
     */
    public function __construct($cantidad = 0) {
        $this->dinero = floatval($cantidad);
        // Incrementar contador de monederos
        self::$numero_monederos++;
    }

    /**
     * Destructor: decrementa el contador de monederos
     */
    public function __destruct() {
        // Decrementar contador con control mínimo (no negativo)
        if (self::$numero_monederos > 0) {
            self::$numero_monederos--;
        }
    }

    /**
     * Meter dinero en el monedero
     * @param float|int $cantidad
     * @return void
     */
    public function meter($cantidad) {
        $c = floatval($cantidad);
        if ($c > 0) {
            $this->dinero += $c;
        }
    }

    /**
     * Sacar dinero del monedero. No permite saldo negativo.
     * @param float|int $cantidad
     * @return bool true si la operación tuvo éxito, false si fondos insuficientes o cantidad no válida
     */
    public function sacar($cantidad) {
        $c = floatval($cantidad);
        if ($c <= 0) return false;
        if ($c > $this->dinero) {
            // No se puede sacar más de lo disponible
            return false;
        }
        $this->dinero -= $c;
        return true;
    }

    /**
     * Consultar dinero disponible (única forma de conocer el saldo)
     * @return float
     */
    public function consultar() {
        return $this->dinero;
    }

    /**
     * Obtener número de monederos existentes (método estático)
     * @return int
     */
    public static function getNumeroMonederos() {
        return self::$numero_monederos;
    }
}

?>
