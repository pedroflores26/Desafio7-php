<?php
class Viagem {
    private string $origem;
    private string $destino;
    private float $distancia;
    private float $tempo;
    private float $consumo;
    private float $precoCombustivel;

    public function __construct($origem, $destino, $distancia, $tempo, $consumo, $precoCombustivel) {
        $this->origem = $origem;
        $this->destino = $destino;
        $this->distancia = $distancia;
        $this->tempo = $tempo;
        $this->consumo = $consumo;
        $this->precoCombustivel = $precoCombustivel;
    }

    public function calcularVelocidadeMedia() {
        return $this->distancia / $this->tempo;
    }

    public function calcularConsumoTotal() {
        return $this->distancia / $this->consumo;
    }

    public function calcularCustoViagem() {
        return $this->calcularConsumoTotal() * $this->precoCombustivel;
    }

    public function exibirResumo() {
        return "
        <ul>
            <li><strong>Origem:</strong> {$this->origem}</li>
            <li><strong>Destino:</strong> {$this->destino}</li>
            <li><strong>Distância:</strong> {$this->distancia} km</li>
            <li><strong>Tempo:</strong> {$this->tempo} horas</li>
            <li><strong>Velocidade Média:</strong> " . number_format($this->calcularVelocidadeMedia(), 2, ',', '.') . " km/h</li>
            <li><strong>Consumo estimado:</strong> " . number_format($this->calcularConsumoTotal(), 2, ',', '.') . " litros</li>
            <li><strong>Custo da viagem:</strong> R$ " . number_format($this->calcularCustoViagem(), 2, ',', '.') . "</li>
        </ul>
        ";
    }
}
?>