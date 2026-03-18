<?php
class CalculadoraGeometrica {
    private string $figura;
    private float $valor1;
    private float $valor2;

    public function __construct($figura, $valor1, $valor2 = 0) {
        $this->figura = $figura;
        $this->valor1 = $valor1;
        $this->valor2 = $valor2;
    }

    public function calcularArea() {
        switch ($this->figura) {
            case 'quadrado':
                return $this->valor1 * $this->valor1;

            case 'retangulo':
                return $this->valor1 * $this->valor2;

            case 'circulo':
                return pi() * pow($this->valor1, 2);

            default:
                return 0;
        }
    }

    public function getNomeFigura() {
        switch ($this->figura) {
            case 'quadrado':
                return "Quadrado";
            case 'retangulo':
                return "Retângulo";
            case 'circulo':
                return "Círculo";
            default:
                return "Desconhecida";
        }
    }

    public function exibirResultado() {
        return "
        <ul>
            <li><strong>Figura:</strong> " . $this->getNomeFigura() . "</li>
            <li><strong>Área:</strong> " . number_format($this->calcularArea(), 2, ',', '.') . "</li>
        </ul>
        ";
    }
}
?>