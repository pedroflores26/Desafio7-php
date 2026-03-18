<?php
class Carro {
    private string $modelo;
    private string $combustivel;
    private float $tanque;
    private float $consumo;
    private float $kmRodados;

    public function __construct($modelo, $combustivel, $tanque, $consumo, $kmRodados) {
        $this->modelo = $modelo;
        $this->combustivel = $combustivel;
        $this->tanque = $tanque;
        $this->consumo = $consumo;
        $this->kmRodados = $kmRodados;
    }

    public function calcularAutonomia() {
        return $this->tanque * $this->consumo;
    }

    public function getPrecoCombustivel() {
        // valores simulados
        if ($this->combustivel === 'gasolina') {
            return 5.80;
        } else {
            return 4.20; // etanol
        }
    }

    public function calcularCustoPorKm() {
        return $this->getPrecoCombustivel() / $this->consumo;
    }

    public function verificarRevisao() {
        if ($this->kmRodados >= 10000) {
            return "⚠️ Hora da revisão!";
        }
        return "✅ Revisão em dia";
    }

    public function exibirDados() {
        return "
        <ul>
            <li><strong>Modelo:</strong> {$this->modelo}</li>
            <li><strong>Combustível:</strong> {$this->combustivel}</li>
            <li><strong>Autonomia:</strong> " . number_format($this->calcularAutonomia(), 2, ',', '.') . " km</li>
            <li><strong>Custo por Km:</strong> R$ " . number_format($this->calcularCustoPorKm(), 2, ',', '.') . "</li>
            <li><strong>Km rodados:</strong> {$this->kmRodados} km</li>
            <li><strong>Status:</strong> {$this->verificarRevisao()}</li>
        </ul>
        ";
    }
}
?>